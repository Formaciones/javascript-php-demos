<?php 
    // Iniciamos la sesión para poder usar $_SESSION
    session_start();

    // Recogemos datos del formulario de login
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validamos usuario y contraseña REAL.
    // -> Opción 1: Consultar en un base de datos el Hash de la contraseña y comparar
    // -> Opción 2: Llamada un API enviando email y password. La respuesta de API determina la autenticación.

    // Validación SIMULADA 
    // Datos validos:   Email -> admin@prueba.es    Pass -> 1234.
    if($email == 'admin@prueba.es' && $password == '1234.') {
        $_SESSION['autenticado'] = true;
        $_SESSION['usuario'] = 'Alex Wilber';
        $_SESSION['rol'] = 'Admin';

        header('Location: index.php');        
    } else {
        header('Location: login.php');
    }
    exit;

?>