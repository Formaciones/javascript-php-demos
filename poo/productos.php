<?php
    require_once 'datos2.php';
    require_once 'productoClass.php';

    // Leemos del formulario referencia
    $referencia = (int) ($_POST['referencia'] ?? '-1');

    // Instanciamos y cargamos datos
    $producto = new Producto();
    if ($referencia != -1) $producto->loadData($referencia);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Consulta de Productos</h1>
                <hr />
                <form method="post">
                    <div class="form-group">
                        <label>Referencia</label>
                        <input type="number" name="referencia" class="form-control" />
                        <br />
                        <div class="text-end">
                            <button type="submit" class="btn btn-warning">Consultar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 style="color: white">Ficha de <?= $producto->productName ?></h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>