<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel Comics</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/img/marvel.svg" alt="Marvel Comics" height="30" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Comics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Characters</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Imagen de fondo -->
    <div class="img-background"></div>

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1 class="mb-4 text-white">Explore Marvel Comics</h1>

        <!-- Sección de Cómics -->
        <div class="row">
            @if (!empty($comics['data']['results']))
                @foreach ($comics['data']['results'] as $comic)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card" data-bs-toggle="modal" data-bs-target="#comicModal{{ $comic['id'] }}">
                            <img src="{{ $comic['thumbnail']['path'] }}.{{ $comic['thumbnail']['extension'] }}" alt="{{ $comic['title'] }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comic['title'] }}</h5>
                                <p class="card-text">{{ Str::limit($comic['description'], 100) }}</p>
                            </div>
                        </div>

                        <!-- Modal para detalles del cómic -->
                        <div class="modal fade" id="comicModal{{ $comic['id'] }}" tabindex="-1" aria-labelledby="comicModalLabel{{ $comic['id'] }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="comicModalLabel{{ $comic['id'] }}">{{ $comic['title'] }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $comic['thumbnail']['path'] }}.{{ $comic['thumbnail']['extension'] }}" alt="{{ $comic['title'] }}">
                                        <p>{{ $comic['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-white">No comics found.</p>
            @endif
        </div>

        <!-- Sección de Personajes -->
        <h1 class="mb-4 text-white">Explore Marvel Characters</h1>

        <div class="row">
            @if (!empty($characters['data']['results']))
                @foreach ($characters['data']['results'] as $character)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card" data-bs-toggle="modal" data-bs-target="#characterModal{{ $character['id'] }}">
                            <img src="{{ $character['thumbnail']['path'] }}.{{ $character['thumbnail']['extension'] }}" alt="{{ $character['name'] }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $character['name'] }}</h5>
                                <p class="card-text">{{ Str::limit($character['description'], 100) }}</p>
                            </div>
                        </div>

                        <!-- Modal para detalles del personaje -->
                        <div class="modal fade" id="characterModal{{ $character['id'] }}" tabindex="-1" aria-labelledby="characterModalLabel{{ $character['id'] }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="characterModalLabel{{ $character['id'] }}">{{ $character['name'] }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ $character['thumbnail']['path'] }}.{{ $character['thumbnail']['extension'] }}" alt="{{ $character['name'] }}">
                                        <p>{{ $character['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-white">No characters found.</p>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Marvel Comics API. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

