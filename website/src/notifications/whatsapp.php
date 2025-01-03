<?php
namespace App\Notifications;

class whatsapp {

    public function sendMessage($link) {
        $token = "EAAWmWbD6Aa8BOZBK2gDRdtpGkigI5h0aHnHdD3OpeRYucw5T9qKZAWvMk44Oe0ZAK5ywYcXKZB8eOMao7jquhAkG1VHhiZBdZCejdqdkLFkfCpdalbHDDUwvje5ZCRi83ZA3AAWeOC0jG0LtbZB4pQ0YnljfTA9YrcdlC68sZC1cNUWk4G7vcZAYYLHEtTnjoYYAS6OnsiYjpYiNXyzEGu4oaEZD";
        $telefono = "526644155238";
        $urlEndpoint = "https://graph.facebook.com/v21.0/545327648664192/messages";

        $mensaje = json_encode([
            "messaging_product" => "whatsapp",
            "to" => $telefono,
            "type" => "template",
            "template" => [
                "name" => "page_inactive_notification",
                "language" => ["code" => "en"], 
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $link]
                        ]
                    ]
                ]
            ]
        ]);
        
        $header = [
            "Authorization: Bearer $token",
            "Content-Type: application/json"
        ];
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $urlEndpoint);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $response = json_decode(curl_exec($curl), true);
        
        var_dump($response);

        curl_close($curl);
        
        if (isset($response['error']['code']) && $response['error']['code'] === 190) {
            error_log("El token ha expirado. Renovando...");

            $newToken = $this->renewToken(); 

            if ($newToken) {
                $this->sendMessageWithNewToken($link, $newToken);
            } else {
                error_log("Error al renovar el token.");
            }
        }
    }

    private function sendMessageWithNewToken($link, $newToken) {
        $telefono = "526644155238";
        $urlEndpoint = "https://graph.facebook.com/v21.0/545327648664192/messages";

        $mensaje = json_encode([
            "messaging_product" => "whatsapp",
            "to" => $telefono,
            "type" => "template",
            "template" => [
                "name" => "page_inactive_notification",
                "language" => ["code" => "en"], 
                "components" => [
                    [
                        "type" => "body",
                        "parameters" => [
                            ["type" => "text", "text" => $link]
                        ]
                    ]
                ]
            ]
        ]);

        $header = [
            "Authorization: Bearer $newToken",
            "Content-Type: application/json"
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $urlEndpoint);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($curl), true);
        
        var_dump($response);

        curl_close($curl);
    }

    private function renewToken() {
        $appId = "1590279035027887"; 
        $appSecret = "8b469bee4d2c78417c206167de9cdee3"; 
        $shortLivedToken = "EAAWmWbD6Aa8BOZBK2gDRdtpGkigI5h0aHnHdD3OpeRYucw5T9qKZAWvMk44Oe0ZAK5ywYcXKZB8eOMao7jquhAkG1VHhiZBdZCejdqdkLFkfCpdalbHDDUwvje5ZCRi83ZA3AAWeOC0jG0LtbZB4pQ0YnljfTA9YrcdlC68sZC1cNUWk4G7vcZAYYLHEtTnjoYYAS6OnsiYjpYiNXyzEGu4oaEZD"; // Tu token de acceso de corta duración

        $url = "https://graph.facebook.com/v21.0/oauth/access_token?"
               . "grant_type=fb_exchange_token&"
               . "client_id={$appId}&"
               . "client_secret={$appSecret}&"
               . "fb_exchange_token={$shortLivedToken}";
    
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);
    
        var_dump($response);
    
        if (isset($response['access_token'])) {
            file_put_contents('/path/to/token.txt', $response['access_token']);
            return $response['access_token'];
        }
    
        return false;
    }
}
