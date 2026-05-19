<?php 
    function matriculaValida($matricula) {
        $regex = "/^[0-9]{4}[A-Z]{3}$/";
        return preg_match($regex, $matricula);
    }

    function emailValido($email) {
        $regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $regex2 = "/^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,}$/";
        return preg_match($regex, $email);        
    }    

    function calcularIVA($precio, $iva = 21) {
        return ($precio / 100) * $iva;
    }

    function precioConIVA($precio, $iva = 21) {
        $cuota = calcularIVA($precio, $iva);

        return $precio + $cuota;
    }
    
    function formatearPrecio($precio) {
        return number_format($precio, 2, ',', '.') . ' €';
    }

?>