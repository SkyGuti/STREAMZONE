<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña - StreamZone</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="contenedor">

        <h1>StreamZone</h1>
        <h2>Cambiar contraseña</h2>

        <p class="descripcion">
            Ingresa tu contraseña actual y luego la nueva contraseña.
        </p>

        <form action="guardar_password.php" method="POST">

            <div class="grupo">
                <label for="clave_actual">Contraseña actual</label>
                <input type="password" id="clave_actual" name="clave_actual" required>
            </div>

            <div class="grupo">
                <label for="clave_nueva">Nueva contraseña</label>
                <input type="password" id="clave_nueva" name="clave_nueva" required>
            </div>

            <div class="grupo">
                <label for="confirmar_clave">Confirmar nueva contraseña</label>
                <input type="password" id="confirmar_clave" name="confirmar_clave" required>
            </div>

            <button type="submit">Actualizar contraseña</button>

            <p class="enlace">
                <a href="mi_cuenta.php">Volver a mi cuenta</a>
            </p>

        </form>

    </div>

</body>
</html>