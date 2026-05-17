<?php

// Importar archivo de conexión
include("conexion.php");

// Validar que los datos lleguen desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cedula = trim($_POST['cedula']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $clave = $_POST['clave'];

    // Validar campos vacíos
    if (empty($cedula) || empty($nombre) || empty($correo) || empty($clave)) {
        echo "<p style='text-align:center; color:red;'>Todos los campos son obligatorios.</p>";
        echo "<p style='text-align:center;'><a href='registrar_usuario.html'>Volver</a></p>";
        exit;
    }

    // Validar formato de correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='text-align:center; color:red;'>El correo no tiene un formato válido.</p>";
        echo "<p style='text-align:center;'><a href='registrar_usuario.html'>Volver</a></p>";
        exit;
    }

    // Cifrar la contraseña antes de guardarla
    $clave_segura = password_hash($clave, PASSWORD_DEFAULT);

    // Verificar si el correo o la cédula ya existen
    $verificar = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ? OR cedula = ?");
    $verificar->bind_param("ss", $correo, $cedula);
    $verificar->execute();
    $verificar->store_result();

    if ($verificar->num_rows > 0) {
        echo "<p style='text-align:center; color:red;'>El correo o la cédula ya están registrados.</p>";
        echo "<p style='text-align:center;'><a href='registrar_usuario.html'>Volver</a></p>";
    } else {

        // Insertar nuevo usuario
        $stmt = $conexion->prepare("INSERT INTO usuarios (cedula, nombre, correo, clave) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $cedula, $nombre, $correo, $clave_segura);

        if ($stmt->execute()) {
            echo "<p style='text-align:center; color:green;'>Usuario registrado correctamente.</p>";
            echo "<p style='text-align:center;'><a href='login.php'>Ir al inicio de sesión</a></p>";
        } else {
            echo "<p style='text-align:center; color:red;'>Error al registrar el usuario.</p>";
            echo "<p style='text-align:center;'><a href='registrar_usuario.html'>Volver</a></p>";
        }

        $stmt->close();
    }

    $verificar->close();
}

$conexion->close();

?>