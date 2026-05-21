<?php 
    class Producto {
        public $productId;
        public $productName;
        public $supplierId;
        public $categoryId;
        public $quantityPerUnit;
        // Precio del producto sin IVA
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
        
        public function loadData2($id) {
            global $productos;

            foreach($productos as $producto) {
                
                if($producto['productId'] == $id) {
                    $this->productId = $producto['productId'];
                    $this->productName = $producto['productName'];
                    $this->supplierId = $producto['supplierId'];
                    $this->categoryId = $producto['categoryId'];
                    $this->quantityPerUnit = $producto['quantityPerUnit'];
                    $this->unitPrice = $producto['unitPrice'];
                    $this->unitsInStock = $producto['unitsInStock'];
                    $this->unitsOnOrder = $producto['unitsOnOrder'];
                    $this->reorderLevel = $producto['reorderLevel'];
                    $this->discontinued = $producto['discontinued']; 

                    return true;
                }
            }

            return false;
        }        

        public function loadData($id) {
            global $productos;

            $resultado = array_filter(
                $productos,
                function($producto) use ($id) {
                    return $producto['productId'] == $id;
                }
            );

            if (count($resultado) > 0) {
                $temp = array_values($resultado)[0];

                $this->productId = $temp['productId'];
                $this->productName = $temp['productName'];
                $this->supplierId = $temp['supplierId'];
                $this->categoryId = $temp['categoryId'];
                $this->quantityPerUnit = $temp['quantityPerUnit'];
                $this->unitPrice = $temp['unitPrice'];
                $this->unitsInStock = $temp['unitsInStock'];
                $this->unitsOnOrder = $temp['unitsOnOrder'];
                $this->reorderLevel = $temp['reorderLevel'];
                $this->discontinued = $temp['discontinued'];                

                return true;
            } else return false;
        }

        // Método valor de Stock

        // Método que retorne la cuota de IVA 10%

        // Método que retorne el precio con IVA

        // Poner como PRIVATE UnitPrice y controlar el acceso

        // Método que retorna la categoría en letra

        // Retorna ficha HTML

    }    
?>