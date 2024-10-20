<?php

use Illuminate\Support\Facades\Route; // Importa la clase Route para definir las rutas de la aplicación
use App\Http\Controllers\MarvelComicsController; // Importa el controlador MarvelComicsController para manejar las solicitudes relacionadas con cómics

// Ruta para la página de inicio
Route::get('/', function () {
    return view('welcome'); // Devuelve la vista 'welcome' cuando se accede a la ruta raíz
});

// Ruta para la sección de cómics
Route::get('/comics', [MarvelComicsController::class, 'getComics'])->name('comics.index'); // Define una ruta GET para '/comics' que llama al método 'getComics' del controlador MarvelComicsController
