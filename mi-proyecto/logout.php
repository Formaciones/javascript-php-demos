<?php 
    ////////////////////////////////////////////
    // Con variables de SESIÓN
    ////////////////////////////////////////////

    // Recuperamos sesión actual
    session_start();

    $usuario = $_SESSION['usuario'];

    // Opción 1 - Eliminamos las variables de sesión
    $_SESSION = [];

    // Opción 2 - Eliminamos las variables de sesión
    session_unset();

    // Destruimos la sesión del servidor
    session_destroy();

    ////////////////////////////////////////////
    // Con COOKIES
    ////////////////////////////////////////////

    $usuario = $_COOKIE['usuario'];

    setcookie('autenticado', '', time() - 1440, '/');
    setcookie('usuario', '', time() - 1440, '/');
    setcookie('rol', '', time() - 1440, '/');

    // Volvemos al INDEX (porque es de acceso anónimo) o volvemos al LOGIN
    header('Location: index.php?mensaje='. urlencode('Sesión de ' . $usuario . ' finalizada.'));
    exit;
?>