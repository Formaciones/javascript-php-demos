<?php 

    // Si no existe clientes.php -> warning, no falla y continua.
    //include "clientes2.php";    

    // Si no existe clientes.php -> error, falla y se detiene la página
    require "clientes.php";

    $dias = array("lunes", "martes", "miercoles", "jueves", "viernes", "sábado", "domingo");

    $diaNum = (int) ($_POST["dia"] ?? "0");
    $dia = match($diaNum) {
        1 => "Lunes", 2 => "Martes", 3 => "Miercoles", 4 => "Jueves", 5 => "Viernes", 6 => "Sábado", 7 => "domingo",
        default => "sin datos"
    };

    // SOLUCIÓN DE VICTOR 
    //
    // $dia = ucfirst(strtolower(match($diaNum) {
    //     1 => $dias[($diaNum-1)],
    //     2 => $dias[($diaNum-1)],
    //     3 => $dias[($diaNum-1)],
    //     4 => $dias[($diaNum-1)],
    //     5 => $dias[($diaNum-1)],
    //     6 => $dias[($diaNum-1)],
    //     7 => $dias[($diaNum-1)],
    //     default => "sin datos"
    // }));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Ejempo 1 - Formulario y Sentencias de Control</h1>
                <hr />
                <div class="row">
                    <div class="col">
                        <p><b>Día Seleccionado:</b> <?= $dia ?></p>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Día de la Semana</label>
                                <select class="form-select" name="dia">
                                    <?php 
                                        // Pintar los OPTIONS con value de 1 a 7 y la etiqueta la prmera letra en mayúsculas
                                        for($i = 0; $i < count($dias); $i++) {
                                            echo '<option value="' . ($i + 1) . '"' . (($i + 1 == $diaNum) ? ' selected' : '')  . '>' . ucfirst(strtolower($dias[$i])) . '</option>';
                                        }
                                    ?>
                                    <!-- <option value="1">Lunes</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col text-end">
                            <button type="reset" class="btn btn-danger">Resetear</button>
                            <button type="submit" class="btn btn-success">Enviar</button>                            
                            <!--
                            Los botones en HTML también se puede crear mediante la etiqueta INPUT

                            <input type="submit" class="btn btn-success" value="Enviar" />
                            <input type="reset" class="btn btn-success" value="Resetear" />
                            -->
                        </div>
                    </div>
                </form>             
            </div>
        </div>
    </div>
</body>
</html>