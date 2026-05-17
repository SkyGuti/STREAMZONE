<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_SESSION['id'];
    $clave_actual = $_POST['clave_actual'];
    $clave_nueva = $_POST['clave_nueva'];
    $confirmar_clave = $_POST['confirmar_clave'];

    // Validar campos vacíos
    if (empty($clave_actual) || empty($clave_nueva) || empty($confirmar_clave)) {
        echo "<p style='text-align:center; color:red;'>Todos los campos son obligatorios.</p>";
        echo "<p style='text-align:center;'><a href='cambiar_password.php'>Volver</a></p>";
        exit;
    }

    // Verificar que la nueva contraseña coincida
    if ($clave_nueva != $confirmar_clave) {
        echo "<p style='text-align:center; color:red;'>Las contraseñas nuevas no coinciden.</p>";
        echo "<p style='text-align:center;'><a href='cambiar_password.php'>Volver</a></p>";
        exit;
    }

    // Buscar la contraseña actual guardada en la base de datos
    $stmt = $conexion->prepare("SELECT clave FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {

        $usuario = $resultado->fetch_assoc();

        // Verificar contraseña actual
        if (password_verify($clave_actual, $usuario['clave'])) {

            // Cifrar nueva contraseña
            $clave_segura = password_hash($clave_nueva, PASSWORD_DEFAULT);

            // Actualizar contraseña
            $actualizar = $conexion->prepare("UPDATE usuarios SET clave = ? WHERE id = ?");
            $actualizar->bind_param("si", $clave_segura, $id);

            if ($actualizar->execute()) {
                echo "<p style='text-align:center; color:green;'>Contraseña actualizada correctamente.</p>";
                echo "<p style='text-align:center;'><a href='mi_cuenta.php'>Volver a mi cuenta</a></p>";
            } else {
                echo "<p style='text-align:center; color:red;'>Error al actualizar la contraseña.</p>";
                echo "<p style='text-align:center;'><a href='cambiar_password.php'>Volver</a></p>";
            }

            $actualizar->close();

        } else {
            echo "<p style='text-align:center; color:red;'>La contraseña actual es incorrecta.</p>";
            echo "<p style='text-align:center;'><a href='cambiar_password.php'>Volver</a></p>";
        }

    } else {
        echo "<p style='text-align:center; color:red;'>Usuario no encontrado.</p>";
        echo "<p style='text-align:center;'><a href='login.php'>Volver al login</a></p>";
    }

    $stmt->close();
}

$conexion->close();

?>