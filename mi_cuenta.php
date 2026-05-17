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
    <title>Mi cuenta - StreamZone</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="contenedor-inicio">

        <h1>StreamZone</h1>
        <h2>Mi cuenta</h2>

        <p class="descripcion">
            En esta sección puedes revisar y actualizar tus datos personales.
        </p>

        <form action="actualizar_perfil.php" method="POST">

            <div class="grupo">
                <label for="cedula">Cédula</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo htmlspecialchars($_SESSION['cedula']); ?>" required>
            </div>

            <div class="grupo">
                <label for="nombre">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($_SESSION['nombre']); ?>" required>
            </div>

            <div class="grupo">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($_SESSION['correo']); ?>" required>
            </div>

            <button type="submit">Guardar cambios</button>

        </form>

        <div class="opciones">
            <a href="cambiar_password.php">Cambiar contraseña</a>
            <a href="inicio.php">Volver al inicio</a>
        </div>

    </div>

</body>
</html>