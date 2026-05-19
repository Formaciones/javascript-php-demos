<?php 
    require_once 'funciones.php';

    function saludar1() {
        echo 'Hola desde la función saludar1.';
    }

    $mensaje1 = saludar1();

    function saludar2() {
        return 'Hola desde la función saludar2.';
    }

    $mensaje2 = saludar2();

    function saludar3($nombre) {
        return 'Hola, soy ' . $nombre . '.';
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Funciones y Clases</h1>
                <hr />
                <p><b>Saludo 1: </b><?php saludar1(); ?></p>
                <p><b>Saludo 2: </b><?php saludar2(); ?></p>
                <p><b>Saludo 2 (?=): </b><?= saludar2(); ?></p>
                <p><b>Saludo 2 (temp): </b><?php  $temp = saludar2(); echo $temp; ?></p>
                <p><b>Mensaje 1: </b><?=  $mensaje1 ?></p>
                <p><b>Mensaje 2: </b><?=  $mensaje2 ?></p>
                <p><b>Saludo 3: </b><?= saludar3('Borja'); ?></p>
                <hr />
                <p><?= formatearPrecio(102148.822); ?> + 21% IVA 
                    <?= formatearPrecio(calcularIVA(102148.822)); ?> = 
                    <?= formatearPrecio(precioConIVA(102148.82)); ?></p>
                <p>21% IVA de 178.32 = <?= calcularIVA(178.32); ?></p>
                <p>21% IVA de 178.32 = <?= calcularIVA(178.32, 21); ?></p>
                <p>10% IVA de 178.32 = <?= calcularIVA(178.32, 10); ?></p>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>