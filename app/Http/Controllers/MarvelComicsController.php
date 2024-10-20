<?php

namespace App\Http\Controllers; // Define el espacio de nombres para el controlador

use Illuminate\Http\Request; // Importa la clase Request de Laravel
use GuzzleHttp\Client; // Importa la clase Client de Guzzle para hacer solicitudes HTTP

// Define la clase MarvelComicsController que extiende de la clase base Controller
class MarvelComicsController extends Controller
{
    // Método para obtener los cómics y personajes de la API de Marvel
    public function getComics()
    {
        // Crea una nueva instancia del cliente HTTP de Guzzle
        $client = new Client();
        
        // Obtiene las claves de la API de tu archivo .env
        $publicKey = env('MARVEL_PUBLIC_KEY'); // Clave pública de la API
        $privateKey = env('MARVEL_PRIVATE_KEY'); // Clave privada de la API
        // Define la URL base de la API, usando un valor por defecto si no está configurado
        $baseUrl = env('MARVEL_BASE_URL') ?: 'https://gateway.marvel.com/v1/public'; 
        $ts = time(); // Genera un timestamp actual para la autenticación
        // Genera un hash MD5 que combina el timestamp, la clave privada y la clave pública
        $hash = md5($ts . $privateKey . $publicKey); 
        
        // Hacer la petición a la API de Marvel para obtener los cómics
        $response = $client->get("{$baseUrl}/comics", [
            'query' => [ // Pasar parámetros a la consulta
                'apikey' => $publicKey, // Clave pública para la API
                'ts' => $ts, // Timestamp para la autenticación
                'hash' => $hash, // Hash para la autenticación
                'limit' => 50, // Limitar la cantidad de resultados que queremos (hasta 50)
            ]
        ]);

        // Obtener los datos de la respuesta en formato JSON y convertirlos a un array asociativo
        $comics = json_decode($response->getBody()->getContents(), true);

        // Hacer la petición a la API de Marvel para obtener los personajes
        $responseCharacters = $client->get("{$baseUrl}/characters", [
            'query' => [
                'apikey' => $publicKey, // Clave pública para la API
                'ts' => $ts, // Reutilizar el mismo timestamp
                'hash' => $hash, // Reutilizar el mismo hash
            ]
        ]);
        
        // Obtener los datos de los personajes en formato JSON y convertirlos a un array asociativo
        $characters = json_decode($responseCharacters->getBody()->getContents(), true);

        // Pasar los datos de los cómics y personajes a la vista 'marvel.comics'
        // Utiliza la función compact() para enviar los datos a la vista
        return view('marvel.comics', compact('comics', 'characters'));
    }
}
