<?php 
    // Datos de ejemplo: array de clientes
    $clientes = [
        ['id'=>1,'nombre'=>'Ana Pérez','nota'=> 10,'edad'=> 17,'vip'=> true,'provincia'=>'Madrid','email'=>'ana@example.com'],
        ['id'=>2,'nombre'=>'Luis García','nota'=> 7,'edad'=> 27,'vip'=> '','provincia'=>'Valencia','email'=>'luis@example.com'],
        ['id'=>3,'nombre'=>'Marta Ruíz','nota'=> 2,'edad'=> 42,'vip'=> null,'provincia'=>'Barcelona','email'=>'marta@example.com'],
        ['id'=>4,'nombre'=>'Ana Sáchez','nota'=> 5,'edad'=> 33,'vip'=> false,'provincia'=>'Madrid','email'=>'ana.sanchez@example.com'],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentecias de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Sentecias de Control</h1>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4>For</h4>
                <p><b>Como contador</b></p>
                <?php 
                    /* 
                        for(variable y valor inicial; condición; incremento) {
                            bloque de sentencias;
                        }
                    */
                    for($i = -10; $i < 11; $i = $i + 1) {
                        if ($i % 2 <> 0) continue;
                        if ($i == 8) break;
                        echo $i . " ";
                    }
                    echo "<br /><p>Finalizdo el For.</p>";
                ?>
                <br />
                <p><b>Recorrer Colecciones</b></p>
                <?php 
                    // Las colecciones son de base cero, su primer elemento tiene como índice cero.
                    // Las colecciones el índice máximo es número de elementos menos uno.
                    $numItems = count($clientes);
                    for($i = 0; $i < $numItems; $i++) {
                        echo "índice -> " . $i . "# " . $clientes[$i]["nombre"] . "<br />";
                    }
                ?>
                <br />
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Provincia</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            for($i = 0; $i < count($clientes); $i++) {
                                echo "<tr>";
                                echo "<td>" . $clientes[$i]["id"] . "</td>";
                                echo "<td>" . $clientes[$i]["nombre"] . "</td>";
                                echo "<td>" . $clientes[$i]["provincia"] . "</td>";
                                echo "<td>" . $clientes[$i]["email"] . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>     
                <br />
                <h4>Foreach</h4>
                <p><b>Recorrer Colecciones</b></p>
                <?php 
                    /* 
                        foreach(colección as variable-elemento) {
                            bloque de sentencias;
                        }

                        No conocemos en el bloque de sentencias el índice del elemento
                    */
                    foreach($clientes as $cliente) {
                        echo "# " . $cliente["nombre"] . "<br />";
                    }
                ?>
                <br />
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Provincia</th>
                            <th>Email</th>
                            <th>> Edad</th>
                            <th>> Edad</th>
                            <th>VIP</th>
                            <th>VIP</th>
                            <th>Notas</th>
                            <th>Notas</th>
                            <th>VIP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($clientes as $cliente) {
                                // echo '<tr data-id="' . $cliente["id"] . '">';
                                echo "<tr data-id=\"" . $cliente["id"] . "\">";
                                echo "<td>" . $cliente["id"] . "</td>";
                                echo '<td class="' . (($cliente["nota"] < 5) ? 'text-danger' : '' ) . '">' . $cliente["nombre"] . '</td>';
                                echo "<td>" . $cliente["provincia"] . "</td>";
                                echo "<td>" . $cliente["email"] . "</td>";

                                // if
                                // if-else
                                // if-elseif-else                                
                                if ($cliente["edad"] >= 18) 
                                {
                                    echo "<td>Sí</td>";
                                }
                                else
                                {
                                    echo "<td>No</td>";
                                }
                                
                                // Si la expresión es vedadera retorn el valor después de ? y si es falso el valor después :
                                echo "<td>" . (($cliente["edad"] >= 18) ? "Sí" : "No") . "</td>";

                                // Retorna un valor predeterminado para variables que contienen Null, vacion '' o false
                                $vipValor = $cliente["vip"] ?: false;
                                echo "<td>" . (($vipValor) ? "Sí" : "No") . "</td>";

                                // Retorna un valor predeterminado para variables que contienen Null o que no existen
                                echo "<td>" . ($cliente["vip2"] ?? "default") . "</td>";

                                if($cliente["nota"] >=9) echo "<td>Sobresaliente</td>";
                                elseif ($cliente["nota"] >=7) echo "<td>Notable</td>";
                                elseif ($cliente["nota"] >=5) echo "<td>Aprobado</td>";
                                else echo '<td class="text-danger">Suspenso</td>';

                                // switch - analiza valores utilizando una comparación no estricta ==
                                echo "<td>"; 
                                switch ($cliente["nota"]) 
                                {
                                    case 0;
                                        echo "Suspenso";
                                        break;
                                    case 1;
                                        echo "Suspenso";
                                        break;
                                    case 2;
                                        echo "Suspenso";
                                        break;
                                    case 3;
                                        echo "Suspenso";
                                        break;
                                    case 4;
                                        echo "Suspenso";
                                        break;
                                    case 5;
                                        echo "Aprobado";
                                        break;
                                    case 6;
                                        echo "Aprobado";
                                        break; 
                                    case 7;
                                        echo "Notable";
                                        break;                                                                                                                                                                                                                                                                                       
                                    case 8;
                                        echo "Notable";
                                        break;
                                    case 9;
                                        echo "Sobresaliente";
                                        break;
                                    case 10;
                                        echo "Sobresaliente";
                                        break;
                                    default;
                                        echo "No valido";                                                                                                                 
                                }
                                echo "</td>";                                    

                                // match  - analiza valores utilizando una comparación estricta === (PHP 8+)
                                echo "<td>";
                                echo match($cliente["vip"]) {
                                    true => 'Sí',
                                    false => 'No',
                                    default => 'Desconocido'
                                };
                                echo"</td>";
                                
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <br />
                <h4>While / Do-While</h4>
                <p><b>Como contador</b></p>
                <?php
                    /*
                        CUANDO SE COMPORTA COMO UN FOR

                        declaración variable;
                        while (codición) {
                            bloque de sentencias;
                            incremento;
                        }

                        EJECUTAR UN BLOQUE DE SENTENCIAS MIENTRANS SE CUMPLE LA CONDICIÓN
                        while (codición) {
                            bloque de sentencias;
                        }

                        El Do-While garantiza que al menos una vez se ejecuta el contenido del bloque
                    */
                    $i = 0;
                    while ($i < 5 ) {
                        echo $i . " ";
                        $i = $i + 1;
                    }

                    $valor = 30;
                    while ($valor < 30 ) {
                        echo "<p>WHILE - valor es menor de 30.</p>";
                    }

                    do {
                        echo "<p>DO-WHILE - valor es menor de 30.</p>";
                    } while ($valor < 30 );                 

                ?>
            </div>
        </div>        
    </div>
    <br /><br /><br /><br />
</body>
</html>