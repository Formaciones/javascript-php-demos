<?php 

    // ACCESO PRIVADO O AUTORIZADO
    // Recuperar la sesión
    session_start();

    // Validar que la sesión NO está autenticada
    // isset() La variable X NO existe o es NULL
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != true) {
        $origen = urlencode($_SERVER['REQUEST_URI']);
        header("Location: login.php?returnUrl={$origen}");
        exit;
    }

?>