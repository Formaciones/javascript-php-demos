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

        // Colección para el Resultado
        $result = [
            'http_status_code' => null,
            'http_status_desc' => null,
            'headers' => null,
            'body' => null,
            'error' => null
        ];

        // Cuando se produce un error en la llamada HTTP
        if ($response === false) $result['error'] = curl_error($ch);
        else {
            // Cuando NO se produce un error en la llamada HTTP
            $response_headers_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $response_headers = substr($response, 0, $response_headers_size);
            $response_body = substr($response, $response_headers_size);
            
            $result['headers'] = $response_headers;
            $result['body'] = $response_body;

            $result['http_status_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            // HTTP/1.1 200 OK
            $firstLine = strtok($response_headers, "\r\n");
            if ($firstLine && preg_match('#HTTP/[^ ]+\s+\d+\s+(.+)#', $firstLine, $m)) {
                $result['http_status_desc'] = $m[1];
            }
        }

        // Cerrar el canal de comunicación 
        curl_close($ch);

        return $result;
    }
?>