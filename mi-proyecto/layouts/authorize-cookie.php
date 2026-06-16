<?php 
    // ACCESO PRIVADO O AUTORIZADO

    // Validar que la sesión NO está autenticada
    // isset() La variable X NO existe o es NULL
    if(!isset($_COOKIE['autenticado']) || $_COOKIE['autenticado'] != true) {
        $origen = urlencode($_SERVER['REQUEST_URI']);
        header("Location: login.php?returnUrl={$origen}");
        exit;
    }

?>