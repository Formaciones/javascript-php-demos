<?php 
    // Comentarios en PHP

    # Comentario en PHP

    /*
        Comentarios en Bloque - PHP
    */

    $color = "green";

    $nombre = "Borja";
    $apellido = "Cabeza";
    $nombreCompleto = $nombre . " " . $apellido;

    $num1 = 10;
    $num2 = 30;
    $pi = 3.1416;
    $activo = true;

    $suma = $num1 + $num2;
?>

<!-- Comentarios HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Selector. ETIQUETA */
        body {
            font-size: 14px;            
        };

        /* Selector. ID */
        #title-demo {
            color: orange;
        }

        /* Selector. CLASE */
        .text-demo {
            color: <?= $color ?>;   /* <?php echo "$color" ?> */
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-1"> </div>
        <div class="col-10"> 
            <br />
            <h1>Bienvenido a mi página</h1>
            <hr />
            <p id="title-demo" class="text-demo text-demo2"><?php echo "Este texto se ha generado con PHP"  ?></p>
            <?php echo "<p>Mi nombre es $nombreCompleto</p>" ?> 
            <p><b>Suma:</b> <?= $suma ?></p>
            <p><b>Hostname:</b> <?php echo $_ENV['TEMP'] ?></p>     
            <p><b>Hostname:</b> <?php echo getenv('TEMP') ?></p>
        </div>
        <div class="col-1"> </div>
    </div>
</body>
</html>