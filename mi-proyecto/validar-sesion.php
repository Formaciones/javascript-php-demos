<?php 
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
        $_SESSION['autenticado'] = true;
        $_SESSION['usuario'] = 'Alex Wilber';
        $_SESSION['rol'] = 'Admin';

        if ($destino == '') header('Location: index.php');
        else header("Location: {$destino}");
    } else {
       if ($destino == '') header('Location: index.php?mensaje='. urlencode('Email y/o contraseña no validos'));
        else header('Location: index.php?returnUrl=' . $destino . '&mensaje=' . urlencode('Email y/o contraseña no validos'));
    }
    exit;

?>