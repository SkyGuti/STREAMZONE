<?php

// Iniciar sesión
session_start();

// Importar conexión
include("conexion.php");

// Validar que los datos lleguen por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST['correo']);
    $clave = $_POST['clave'];

    // Validar campos vacíos
    if (empty($correo) || empty($clave)) {
        echo "<p style='text-align:center; color:red;'>Debe ingresar correo y contraseña.</p>";
        echo "<p style='text-align:center;'><a href='login.php'>Volver</a></p>";
        exit;
    }

    // Buscar usuario por correo
    $stmt = $conexion->prepare("SELECT id, cedula, nombre, correo, clave FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {

        $usuario = $resultado->fetch_assoc();

        // Verificar la contraseña ingresada con la contraseña cifrada
        if (password_verify($clave, $usuario['clave'])) {

            // Guardar datos en la sesión
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['cedula'] = $usuario['cedula'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];

            // Redirigir al inicio privado
            header("Location: inicio.php");
            exit;

        } else {
            echo "<p style='text-align:center; color:red;'>Contraseña incorrecta.</p>";
            echo "<p style='text-align:center;'><a href='login.php'>Intentar nuevamente</a></p>";
        }

    } else {
        echo "<p style='text-align:center; color:red;'>El correo no está registrado.</p>";
        echo "<p style='text-align:center;'><a href='login.php'>Volver</a></p>";
    }

    $stmt->close();
}

$conexion->close();

?>