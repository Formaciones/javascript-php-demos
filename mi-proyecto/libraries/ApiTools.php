<?php 
    function call_api($url, $method = 'GET', $headers = [], $body = null) {
        // Inicializamos el canal de comunicación HTTP
        $ch = curl_init();

        // Establecemos las cabeceras por defecto o globales a toda la aplicación
        $defaultHeaders = [
            'Content-Type: application/json', 
            'Accept: application/json',
            'apikey: 1234567890.'
        ];

        // Unimos cabeceras globales con cabeceras especificas de una página o llamada
        $allHeaders = array_merge($defaultHeaders, $headers);

        // Establecemos opciones del cURL
        curl_setopt($ch, CURLOPT_URL, $url );                       // URL del endpoint
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);             // Retorna Texto como un string
        curl_setopt($ch, CURLOPT_HEADER, true);                     // Incluir las cabeceras de la respuesta
        curl_setopt($ch, CURLOPT_HTTPHEADER, $allHeaders);          // Incluir las cabeceras en la petición
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);                      // Tiempo máximo de espera para la respuesta
        
        // Establecemos el método de las comunicación HTTP
        if(strtoupper($method) == 'GET') curl_setopt($ch, CURLOPT_HTTPGET, true);
        elseif (strtoupper($method) == 'POST') curl_setopt($ch, CURLOPT_POST, true);                       
        elseif (in_array($method, ['PUT', 'DELETE'])) curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        
        // Establecemos el contenido del Body
        if($body != null && strtoupper($method) != 'GET') curl_setopt($ch, CURLOPT_POSTFIELDS, $body); 
       
        // Ejecutamos o enviamos la petición y capturamos la respuesta
        $response = curl_exec($ch);
    }
?>