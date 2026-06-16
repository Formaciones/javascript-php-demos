<?php 
    require_once 'vendor/autoload.php';

    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    use Firebase\JWT\BeforeValidException;

    $secreto = '9f8a7d3c4b2e1f5a6c7d8e9f0a1b2c3d4e5f67890123456789abcdef12345678';

    $token = $_COOKIE['jwt'];
    $claims = JWT::decode($token, new Key($secreto, 'HS256'));

    // Validar que la sesión NO está autenticada
    // isset() La variable X NO existe o es NULL
    if($claims->inventado == 'Demo') {
        $origen = urlencode($_SERVER['REQUEST_URI']);
        header("Location: login.php?returnUrl={$origen}");
        exit;
    }

?>