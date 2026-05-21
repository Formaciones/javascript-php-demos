<?php 

    require 'datos2.php';

    $numeros = [5, 85, 16, 8, 7, 99, -35, 241, 99, 178, 4, -33, 12, 250];

    $resultado = array_filter(
        $numeros    ,
        function($n) { 
            return $n % 2 == 0;

             if($n % 2 == 0) return true; 
             else return false;
        }
    );

    print_r($resultado);
    echo '<hr />';
    print_r(array_values($resultado));
    echo '<hr />';
    print_r(count($resultado));
?>