<?php
    require_once 'datos2.php';

    class Producto {
        public $productId;
        public $productName;
        public $supplierId;
        public $categoryId;
        public $quantityPerUnit;
        public $unitPrice;
        public $unitsInStock;
        public $unitsOnOrder;
        public $reorderLevel;
        public $discontinued;

        public function __construct(
            $productId = null,
            $productName = '',
            $supplierId = null,
            $categoryId = null,
            $quantityPerUnit = '',
            $unitPrice = 0,
            $unitsInStock = 0,
            $unitsOnOrder = 0,
            $reorderLevel = 0,
            $discontinued = 0
        ) {
            $this->productId = $productId;
            $this->productName = $productName;
            $this->supplierId = $supplierId;
            $this->categoryId = $categoryId;
            $this->quantityPerUnit = $quantityPerUnit;
            $this->unitPrice = $unitPrice;
            $this->unitsInStock = $unitsInStock;
            $this->unitsOnOrder = $unitsOnOrder;
            $this->reorderLevel = $reorderLevel;
            $this->discontinued = $discontinued;
        }        
    }
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
                        <button type="submit" class="btn btn-warning">Consultar</button>
                    </div>
                </form>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3></h3>
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