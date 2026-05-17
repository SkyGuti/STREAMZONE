<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StreamZone</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="contenedor">
        <h1>StreamZone</h1>
        <h2>Iniciar Sesión</h2>

        <p class="descripcion">
            Ingresa con tu correo y contraseña.
        </p>

        <form action="validar_login.php" method="POST">

            <div class="grupo">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required>
            </div>

            <div class="grupo">
                <label for="clave">Contraseña</label>
                <input type="password" id="clave" name="clave" required>
            </div>

            <button type="submit">Ingresar</button>

            <p class="enlace">
                ¿No tienes cuenta? <a href="registrar_usuario.html">Registrarse</a>
            </p>

        </form>
    </div>

</body>
</html> 