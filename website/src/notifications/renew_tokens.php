<?php

public function renewToken() {
    $appId = "1590279035027887"; // Reemplázalo con tu App ID de Meta
    $appSecret = "8b469bee4d2c78417c206167de9cdee3"; // Reemplázalo con tu App Secret de Meta
    $shortLivedToken = "EAAWmWbD6Aa8BOZCNes5ZADD1Pa0hSHocr1zRZBAewNZBtAoal7Ek0V8hul33wZCQTZAhG5ctMmddbZCcMEuLeGZBMDR5IblnwTnxpsjUiHZBrZBV47cZBJaGj70mYIRhs6I1j4cpk5CEia74IjV5UIzsc00uDm1Vyt89YORjXskldZC19I6aoVbapD2syUUODZAKOPtRr8kmmpGu2fSzpISOBdKYZD"; // Tu token de acceso de corta duración que obtuviste previamente

    // Construye la URL para renovar el token
    $url = "https://graph.facebook.com/v21.0/545327648664192/messages"
         . "grant_type=fb_exchange_token&"
         . "client_id={$appId}&"
         . "client_secret={$appSecret}&"
         . "fb_exchange_token={$shortLivedToken}";

    // Inicializa cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);  // La URL a la que se hace la solicitud
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Para recibir la respuesta como string

    // Ejecuta la solicitud cURL y guarda la respuesta
    $response = json_decode(curl_exec($curl), true);
    curl_close($curl);

    // Verifica si la respuesta contiene un nuevo token
    if (isset($response['access_token'])) {
        // Almacena el nuevo token (por ejemplo, en un archivo o base de datos)
        file_put_contents('/path/to/token.txt', $response['access_token']);
        return $response['access_token']; // Retorna el nuevo token
    }

    return false;  // Si no se pudo renovar el token
}
