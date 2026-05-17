<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_SESSION['id'];
    $cedula = trim($_POST['cedula']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);

    if (empty($cedula) || empty($nombre) || empty($correo)) {
        echo "<p style='text-align:center; color:red;'>Todos los campos son obligatorios.</p>";
        echo "<p style='text-align:center;'><a href='mi_cuenta.php'>Volver</a></p>";
        exit;
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='text-align:center; color:red;'>El correo no tiene un formato válido.</p>";
        echo "<p style='text-align:center;'><a href='mi_cuenta.php'>Volver</a></p>";
        exit;
    }

    // Verificar que el correo o cédula no estén usados por otro usuario
    $verificar = $conexion->prepare("SELECT id FROM usuarios WHERE (correo = ? OR cedula = ?) AND id != ?");
    $verificar->bind_param("ssi", $correo, $cedula, $id);
    $verificar->execute();
    $verificar->store_result();

    if ($verificar->num_rows > 0) {
        echo "<p style='text-align:center; color:red;'>El correo o la cédula ya pertenecen a otro usuario.</p>";
        echo "<p style='text-align:center;'><a href='mi_cuenta.php'>Volver</a></p>";
    } else {

        $stmt = $conexion->prepare("UPDATE usuarios SET cedula = ?, nombre = ?, correo = ? WHERE id = ?");
        $stmt->bind_param("sssi", $cedula, $nombre, $correo, $id);

        if ($stmt->execute()) {

            // Actualizar también los datos de la sesión
            $_SESSION['cedula'] = $cedula;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['correo'] = $correo;

            echo "<p style='text-align:center; color:green;'>Datos actualizados correctamente.</p>";
            echo "<p style='text-align:center;'><a href='mi_cuenta.php'>Volver a mi cuenta</a></p>";

        } else {
            echo "<p style='text-align:center; color:red;'>Error al actualizar los datos.</p>";
            echo "<p style='text-align:center;'><a href='mi_cuenta.php'>Volver</a></p>";
        }

        $stmt->close();
    }

    $verificar->close();
}

$conexion->close();

?>