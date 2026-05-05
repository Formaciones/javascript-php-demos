<?php 
    // Datos de ejemplo: array de clientes
    $clientes = [
        ['id'=>1,'nombre'=>'Ana Pérez','edad'=> 17,'provincia'=>'Madrid','email'=>'ana@example.com'],
        ['id'=>2,'nombre'=>'Luis García','edad'=> 27,'provincia'=>'Valencia','email'=>'luis@example.com'],
        ['id'=>3,'nombre'=>'Marta Ruíz','edad'=> 42,'provincia'=>'Barcelona','email'=>'marta@example.com'],
        ['id'=>4,'nombre'=>'Ana Sáchez','edad'=> 33,'provincia'=>'Madrid','email'=>'ana.sanchez@example.com'],
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($clientes as $cliente) {
                                // echo '<tr data-id="' . $cliente["id"] . '">';
                                echo "<tr data-id=\"" . $cliente["id"] . "\">";
                                echo "<td>" . $cliente["id"] . "</td>";
                                echo "<td>" . $cliente["nombre"] . "</td>";
                                echo "<td>" . $cliente["provincia"] . "</td>";
                                echo "<td>" . $cliente["email"] . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>        
    </div>
    <br /><br /><br /><br />
</body>
</html>