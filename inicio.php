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
    <title>Inicio - StreamZone</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="barra-simple">
        <h2>StreamZone</h2>

        <div>
            <a href="mi_cuenta.php">Mi cuenta</a>
            <a href="logout.php" class="salir">Cerrar sesión</a>
        </div>
    </div>

    <div class="pagina">

        <div class="bienvenida-stream">
            <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h2>
            <p>Explora el contenido disponible en la plataforma StreamZone.</p>
        </div>

        <h2 class="titulo">Categorías de contenido</h2>

        <div class="categorias">

            <div class="categoria">
                <h3>Acción</h3>
                <p>Películas con aventura, riesgo y emoción.</p>
            </div>

            <div class="categoria">
                <h3>Comedia</h3>
                <p>Contenido ligero para pasar un buen momento.</p>
            </div>

            <div class="categoria">
                <h3>Drama</h3>
                <p>Historias con personajes y situaciones intensas.</p>
            </div>

            <div class="categoria">
                <h3>Documentales</h3>
                <p>Contenido educativo y temas de interés general.</p>
            </div>

        </div>

        <h2 class="titulo">Últimos estrenos</h2>

        <div class="lista-estrenos">
            <p><strong>Zona de Acción:</strong> una selección de películas llenas de aventura.</p>
            <p><strong>Historias Familiares:</strong> contenido para disfrutar en casa.</p>
            <p><strong>Documentales Educativos:</strong> temas interesantes para aprender.</p>
        </div>

    </div>

</body>
</html>