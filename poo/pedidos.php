<?php 
    include 'datos.php';

    /* 
        ------------------------------------------------------------
        | Núm Pedido  | Cliente | Número Productos | Importe Total |
        ------------------------------------------------------------
    */

    function formatearPrecio($precio) {
        return number_format($precio, 2, ',', '.') . ' €';
    }        

    function numLineas($productos) {
        return count($productos);
    }   

    function totalPedido($productos) {
        $total = 0;

        foreach ($productos as $producto) {
            $total += $producto["cantidad"] * $producto["precioUnidad"];
        }

        return $total;
    }

    ///////////////////////////////////////////////////////////////////////////

    function numLineasPorId($id) {
        $pedido = buscarPedidoPorId($id);
        return numLineas($pedido['productos']);
    }    

    function totalPedidoPorId($id) {
        $pedido = buscarPedidoPorId($id);
        return totalPedido($pedido['productos']);        
    }     

    function buscarPedidoPorId($numeroPedidoBuscar)
    {
        $numerosPedido = array_column($pedidos, "numeroPedido");
        $index = array_search($numeroPedidoBuscar, $numerosPedido);

        return $pedidos[$index];
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
                        <?php foreach($pedidos as $pedido): ?>                                                      
                        <tr>
                            <td><?= $pedido['numeroPedido'] ?></td>
                            <td><?= $pedido['cliente'] ?></td>
                            <td class="text-center"><?= numLineas($pedido['productos']) ?></td>
                            <td class="text-end"><?= formatearPrecio(totalPedido($pedido['productos'])) ?></td>
                        </tr>
                        <?php endforeach; ?>  
                    </tbody>
                </table>
                <br />
                <hr />
                <br />

            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>