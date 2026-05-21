<?php
    class Animal {
        public $nombre;

        public function respirar() {
            echo $this->nombre . ' respira ...';
        }

        protected function Secreto() {
            return 'secreto 1234';
        }
    }

    class Perro extends Animal {
        public function ladrar() {
            echo $this->nombre . ' ladra ...';
        }

        public function respirar() {
            parent::respirar();
            echo $this->nombre . ' respira v2 ...';
        }     
        
        public function getSecreto() {
            return parent::Secreto();
        }
    }

    $animal = new Animal();    

    $perro = new Perro();
    $perro->nombre = 'Perro';    

    class Pedido {
        public $idPedido;
        public $cliente;
        public $fecha;

        public function __construct(...$args)
        {
            $num = count($args);
            if ($num == 1) $this->idPedido = $args[0];
            elseif ($num == 2) {
                $this->idPedido = $args[0];
                $this->cliente = $args[1];
            } elseif ($num == 3) {
                $this->idPedido = $args[0];
                $this->cliente = $args[1];
                $this->fecha = $args[2];
            }
        }
    }

    $p1 = new Pedido();
    $p2 = new Pedido('AZP400', 'Empresa Unos, SL');
    $p3 = new Pedido('AZP400', 'Empresa Unos, SL', '21/05/2026');
    $p4 = new Pedido('AZP400', 'Empresa Unos, SL', '21/05/2026', 16);

    class Persona {
        public $nombre;
        public $apellidos;
        public $edad;
        private $salario;

        public static $mensaje;

        public function __construct($nombre = '', $apellidos = '')
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = 0;
            $this->salario = 0;
        }

        public function setSalario($salario) {
            if($salario > 0) $this->salario = $salario;
        }

        public function getSalario() {
            return $this->formatearSalario();
        } 
        
        public function getNombreCompleto() {
            return $this->nombre . ' ' . $this->apellidos;
        }
        
        private function formatearSalario() {
            return number_format($this->salario, 2, ',', '.') . ' €';
        }
        
        public static function Saludar() {
            return 'Hola ' . Persona::$mensaje;
        }        
    }

    $persona1 = new Persona('Ana', 'Sanz');
    $persona1->nombre = 'Borja';
    $persona1->setSalario(50000);
    $persona1->importe = 1000;

    Persona::$mensaje = 'mundo !!!';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Clases</h1>
                <hr />
                <p><b>Nombre:</b> <?= $persona1->nombre ?></p>
                <p><b>Apellidos:</b> <?= $persona1->apellidos ?></p>
                <p><b>Edad:</b> <?= $persona1->edad ?></p>
                <p><b>Salario:</b> <?= $persona1->getSalario() ?></p>
                <p><b>Saludo:</b> <?= Persona::Saludar() ?></p>
                <p><b>Nombre Completo:</b> <?= $persona1->getNombreCompleto() ?></p>
                <p><b>Perro:</b> <?= $perro->respirar() ?></p>
                <p><b>Perro:</b> <?= $perro->ladrar() ?></p>
                <p><b>Secreto:</b> <?= $perro->getSecreto() ?></p>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>