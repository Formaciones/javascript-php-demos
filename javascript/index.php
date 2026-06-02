<?php 
    $nombre = $_GET['nombre'] ?? 'Borja';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Selector de tipo ETIQUETA */
        h1 {
            color: red;
        }

        /* Selector de tipo IDENTIFICADOR */
        #p1 {
            color: blue;
            font-size: 18px;
        }

        /* Selector de tipo CLASS */
        .colornaranja {
            color:orange;
        }
    </style>
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Demos JS y jQuery</h1>
                <p id="p1"><b class="colornaranja">Nombre:</b> <?= $nombre ?></p>
                <hr />

                <button type="button" class="btn btn-primary" id="mas">Ampliar</button>
                <button type="button" class="btn btn-primary" id="menos">Reducir</button>
                <br />
                <br />      
                <div class="row">
                    <div class="col">
                        <label>Procesado con JS</label>
                        <textarea class="form-control" rows="15"></textarea>
                    </div>
                    <div class="col">
                        <label>Procesado con jQuery</label>
                        <textarea class="form-control" rows="15"></textarea>
                    </div>                    
                </div>
                
                <br />
                <br />
                <form action="" method="get">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nomnbre" />
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" />
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="text" class="form-control" name="fecha" />
                    </div>
                    <br />
                    <button type="button" class="btn btn-primary" id="b1">Procesar</button>
                </form>
                <br />
                <br />

                <table class="table table-stiped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
    <script>
        // Posicionar sobre un elemento HTML
        var boton1a = document.getElementById('b1');    // JS
        var boton1b = $('#b1')                          // jQuery

        // Posicionar sobre todos los botones HTML
        var botonesA = document.getElementsByTagName('BUTTON');
        var botonesB = $('button');

        // Posicionar sobre todos los elementos HTML con la clase FORM-CONTROL
        var itemsA = document.getElementsByClassName('form-control');
        var itemsB = $('.form-control');

        // Formulario
        var item1 = document.getElementsByName('nombre');
        var item2 = $('input[name="nombre"]');

        // Selectore complejos
        var item3 = document.querySelectorAll('button[id="b1"]');
        var item4 = $('button[id="b1"]')

        console.log(boton1a);
        console.log(boton1b);
    </script>
</body>
</html>