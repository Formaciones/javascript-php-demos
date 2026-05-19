<?php 
    include 'datos.php';

    /* 
        ------------------------------------------------------------
        | Núm Pedido  | Cliente | Número Productos | Importe Total |
        ------------------------------------------------------------
    */

    function numLineas($id) {

    }

    function totalPedido($id) {
        
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
                <h1>Listado de Pedidos</h1>
                <hr />
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Núm. Pedido</th>
                            <th>Cliente</th>
                            <th>Núm. Líneas</th>
                            <th>Importe Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>