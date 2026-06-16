<?php 
    require_once 'vendor/autoload.php';

    use Firebase\JWT\JWT;
    use Firebase\JWT\BeforeValidException;

    $secreto = '9f8a7d3c4b2e1f5a6c7d8e9f0a1b2c3d4e5f67890123456789abcdef12345678';

    // Iniciamos la sesión para poder usar $_SESSION
    session_start();

    // Recogemos datos del formulario de login
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $destino = $_POST['destino'] ?? '';

    // Validamos usuario y contraseña REAL.
    // -> Opción 1: Consultar en un base de datos el Hash de la contraseña y comparar
    // -> Opción 2: Llamada un API enviando email y password. La respuesta de API determina la autenticación.

    // Validación SIMULADA 
    // Datos validos:   Email -> admin@prueba.es    Pass -> 1234.
    if($email == 'admin@prueba.es' && $password == '1234.') {
        // Opción 1 -> SESSION en el Servidor
        $_SESSION['autenticado'] = true;
        $_SESSION['usuario'] = 'Alex Wilber';
        $_SESSION['rol'] = 'Admin';

        // Opción 2 -> COOKIE en Servidor + Cliente 
        setcookie('autenticado', true, time() + 1440, '/', '', false, true);
        setcookie('usuario', 'Alex Wilber', time() + 1440, '/', '', false, true);
        setcookie('rol', 'Admin', time() + 1440, '/', '', false, true);

        // Opción 3 -> JWT Token + COOKIE
        $payload = [
            'aud' => 'dominio.com',
            'sub' => 'Alex Wilber',
            'rol' => 'Admin',
            'iat' => time(),
            'exp' => time() + 1440,
            'inventado' => 'Demo'
        ];

        $jwt = JWT::encode($payload, $secreto, 'HS256');

        setcookie('jwt', $jwt, time() + 1440, '/', '', false, true);

        if ($destino == '') header('Location: index.php');
        else header("Location: {$destino}");
    } elseif($email == 'user@prueba.es' && $password == '1234.') {
        $_SESSION['autenticado'] = true;
        $_SESSION['usuario'] = 'Patti Fernández';
        $_SESSION['rol'] = 'User';

        setcookie('autenticado', true, time() + 1440, '/', '', false, true);
        setcookie('usuario', 'Patti Fernández', time() + 1440, '/', '', false, true);
        setcookie('rol', 'User', time() + 1440, '/', '', false, true);

        if ($destino == '') header('Location: index.php');
        else header("Location: {$destino}");
    } else {
       if ($destino == '') header('Location: login.php?mensaje='. urlencode('Email y/o contraseña no validos'));
        else header('Location: login.php?returnUrl=' . $destino . '&mensaje=' . urlencode('Email y/o contraseña no validos'));
    }
    exit;

?>