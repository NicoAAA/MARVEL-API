<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel Comics - Bienvenida</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

</head>
<body>

    <!-- Video de fondo -->
    <video autoplay muted loop class="video-background">
        <source src="{{ asset('img/marvel.mp4') }}" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>

    <!-- Capa oscura encima del video -->
    <div class="overlay"></div>

    <!-- Contenido centrado -->
    <div class="comic-container">
        <a href="/comics" class="comic-btn">
            <img src="{{ asset('img/marvel.svg') }}" alt="Marvel Logo">
        </a>
    </div>

    <!-- Bootstrap JS (Opcional si necesitas funcionalidades JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

