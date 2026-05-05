<?php 
    // Colecciones como resultado de una consulta a una base de datos

    // Crear Colecciones

    // Listas
    $frutas = ["naranja", "limón", "pomelo", "líma", "mandarina"];
    $frutas2 = array("naranja", "limón", "pomelo", "líma", "mandarina");

    $numeros = [10, 20, 5, 15, -8, 12.5, 740];

    // Diccionarios o colecciones asociadas en PHP
    $edades = [ "Ana" => 28, "Luis" => 34, "Marta" => 22];
    $colores = [ "AZ" => "Azul", "RJ" => "Rojo", "VD" => "Verde"];

    // Lista de Diccionarios o colecciones asociadas
    $alumnos = [
        ["id" => 1, "nombre" => "Ana", "apellidos" => "Sanz", "grupo" => "3A"],
        ["id" => 2, "nombre" => "Luis", "apellidos" => "Cabeza", "grupo" => "3B"],
        ["id" => 30, "nombre" => "Andrea", "apellidos" => "García", "grupo" => "3A"],
        ["id" => 5, "nombre" => "Javier", "apellidos" => "Sanchez", "grupo" => "2A"],
    ];

    // Lista de Objetos (clases)
    $personas = [];
    $p1 = new stdClass();
    $p1->nombre = "Ana";
    $p1->apellidos = "Sanz";
    $p1->grupo = "3A";

    // Añadir un elemento al final de colección
    $personas[] = $p1;

    $p2 = new stdClass();
    $p2->nombre = "Luis";
    $p2->apellidos = "Cabeza";
    $p2->grupo = "3B";

    // Añadir un elemento al final de colección
    $personas[] = $p2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colecciones o Arrays en PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />    
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Ejemplos con Arrays</h1>
                <hr />        
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>Mostrar datos de las colecciones.</h4>
              <?php 
                // Número de elementos en la colección
                echo "<p><b>Elementos en frutas:</b> " . count($frutas) . "</p>";
                
                // Añadir un elemento a la colección
                $frutas[] = "kiwi";
                echo "<p><b>Elementos en frutas después de añadir <i>kiwi</i>:</b> " . count($frutas) . "</p>";

                // Mostar el contenido de una de las posiciones
                echo "<p><b>Frutas [2]</b>: $frutas[2]</p>";
                echo "<p><b>Numeros [2]</b>: $numeros[2]</p>";
                echo "<p><b>Colores [AZ]</b>: " . $colores["AZ"] . "</p>";
                echo "<p><b>Alumnos [2]</b>: " . $alumnos[2]["nombre"] . " " . $alumnos[2]["apellidos"] . "</p>";
                echo "<p><b>Personas [1]</b>: " . $personas[1]->nombre . " " . $personas[1]->apellidos . "</p>";
              ?>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col">
                <h4>Modificar y Eliminar</h4>
                <?php 
                    // Actualizar posición 1 limón
                    echo "<p><b>Antes de modificar Frutas [1]:</b> $frutas[1]</p>";
                    $frutas[1] = "sandia";
                    echo "<p><b>Depués de modificar Frutas [1]:</b> $frutas[1]</p>";

                    // Eliminar la posición 1 sandia
                    print_r(array_values($frutas));
                    unset($frutas[1]);  // elimina el elemento de la posición 1, no reindexa
                    echo "<br />";                    
                    $frutas = array_values($frutas);
                    echo "<br />";   
                    echo "<p><b>Depués de eliminar Frutas [1]:</b> $frutas[1]</p>";
                    print_r(array_values($frutas));
                    echo "<br />";
                    echo "<br />";

                    // Modificar diccionario
                    echo "<p><b>Antes de moficar Alumnos [2]</b>: " . $alumnos[2]["nombre"] . " " . $alumnos[2]["apellidos"] . "</p>";
                    $alumnos[2]["apellidos"] = "Fernández";
                    echo "<p><b>Después de modificar Alumnos [2]</b>: " . $alumnos[2]["nombre"] . " " . $alumnos[2]["apellidos"] . "</p>";

                    // Eliminar con array_splice()
                    print_r(array_values($frutas));
                    echo "<br />";                    
                    echo "<p><b>Antes de eliminar Frutas [1]:</b> $frutas[1]</p>";
                    array_splice($frutas, 1, 1); // elimina desde la posición x elementos (en el ejemplo 1, terce parámetro), reindexa
                    echo "<p><b>Depués de eliminar Frutas [1]:</b> $frutas[1]</p>";


                    // Comprobar si existe un valor
                    echo "<p><b>Existe <i>kiwi</i>:</b> " . in_array("kiwi", $frutas) . "</p>";
                    echo "<p><b>Existe <i>melón</i>:</b> " . in_array("melón", $frutas) . "</p>";
                    echo "<p><b>Buscar <i>kiwi</i>:</b> " . array_search("kiwi", $frutas) . "</p>";
                    echo "<p><b>Buscar <i>melón</i>:</b> " . array_search("melón", $frutas) . "</p>";

                    // Eliminar duplicados
                    echo "<b>Eliminar duplicados</b><br />";
                    $frutas[] = "naranja";
                    $frutas[] = "melón";
                    $frutas[] = "kiwi";
                    $frutas[] = "mandarina";
                    $frutas[] = "mandarina";
                    print_r(array_values($frutas));
                    echo "<br />"; 
                    $frutas = array_unique($frutas);
                    print_r(array_values($frutas));
                    echo "<br />";                     
                ?>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col">
                <h4>Funciones de agregación con colecciones de números</h4>
                <?php 
                    echo "<p><b>Elementos</b>: " . count($numeros) . "</p>";
                    echo "<p><b>Suma</b>: " . array_sum($numeros) . "</p>";
                    echo "<p><b>Máximo</b>: " . max($numeros) . "</p>";
                    echo "<p><b>Minimo</b>: " . min($numeros) . "</p>";
                    echo "<p><b>Media</b>: " . array_sum($numeros) / count($numeros) . "</p>";
                ?>                
            </div>
        </div>
    </div>
    <br /><br /><br /><br />
</body>
</html>