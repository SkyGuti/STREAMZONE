<?php

// Datos de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "streamzone_db";

// Crear conexión con MySQL
$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

// Verificar si existe error de conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos.");
}

?>