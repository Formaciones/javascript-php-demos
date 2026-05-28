<?php
    header('Content-Type: application/json; charset=UTF-8');

    $method = $_SERVER['REQUEST_METHOD'];
    $n1 = null;
    $n2 = null;

    $response = [
        'n1' => '',
        'n2' => '',
        'suma' => '',
        'error' => ''
    ];

    if($method == 'GET') {
        // Leer los datos de los parámetros de la URL
        $n1 = $_GET['n1'] ?? null;
        $n2 = $_GET['n2'] ?? null;
    } elseif($method == 'POST') {
        // Leer los datos enviados por un formulario (Content-Type: x-www-form-urlencoded)
        // $n1 = $_POST['n1'] ?? null;
        // $n2 = $_POST['n2'] ?? null;

        // Leer los datos de un JSON del Body
        $raw = file_get_contents('php:/input');     // JSON texto
        $data = json_decode($raw, true);

        $n1 = $data['n1'] ?? null;
        $n2 = $data['n2'] ?? null;        
    } else  {
        http_response_code(405);
        $response['error'] = $method . ' método no soportado, utilizar GET o POST';
        echo json_encode($response);
    }

    // Validación para ver si recibimos datos
    if($n1 === null || $n1 === '' || $n2 === null || $n2 === '') {
        http_response_code(400);
        $response['error'] = 'Parámetros n1 y n2 son obligatorios';
        echo json_encode($response);        
    }

    // Validar que los datos son numéricos
    $num1 = is_numeric($n1) ? floatval($n1) : null;
    $num2 = is_numeric($n2) ? floatval($n2) : null;

    if($num1 === null || $num2 === null) {
        http_response_code(400);
        $response['error'] = 'Parámetros n1 y n2 deben de ser valores numéricos';
        echo json_encode($response);        
    }

    $response['n1'] = $num1;
    $response['n2'] = $num2;
    $response['suma'] = $num1 +  $num2;
    echo json_encode($response);
?>