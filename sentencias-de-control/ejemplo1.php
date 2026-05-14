<?php 
    // Si no existe clientes.php -> warning, no falla y continua.
    //include "clientes2.php";    

    // Si no existe clientes.php -> error, falla y se detiene la página
    require "clientes.php";

    $dias = array("lunes", "martes", "miercoles", "jueves", "viernes", "sábado", "domingo");

    $diaNum = (int) ($_POST["dia"] ?? ($_GET["dia"] ?? "0"));
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

    $provincias = array_unique(array_column($clientes, 'provincia'));
    sort($provincias);    

    $provincia = $_GET["provincia"] ?? "-1";
    $edad = $_GET["edad"] ?? "-1";

    //$clientes = ($provincia == "-1" ? $clientes : array_filter($clientes, fn($cliente) => $provincia == $cliente["provincia"]));
    //$clientes = ($edad      == "-1" ? $clientes : array_filter($clientes, fn($cliente) => $edad      == $cliente["edad"]));

    if($provincia != "-1" Or $edad != "-1") {
        $clientes = array_filter($clientes, function($cliente) {
            $provincia = $_GET["provincia"] ?? "-1";
            $edad = $_GET["edad"] ?? "-1";

            if ($provincia != "-1" And $edad == "-1") 
                return ($provincia == $cliente["provincia"]);
            elseif ($provincia == "-1" And $edad != "-1") 
                return ($edad == $cliente["edad"]);
            elseif ($provincia != "-1" And $edad != "-1")
                return ($provincia == $cliente["provincia"] And $edad == $cliente["edad"]);
        });
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css" rel="stylesheet" />
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
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label">Día de la Semana</label>
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
                <br />
                <h1>Listado de Clientes</h1>
                <hr />
                <div class="card">
                    <div class="card-header bg-primary">
                        <b style="color:white">Filtro</b>
                    </div>
                    <div class="card-body">
                        <form method="get">
                            <div class="row">
                                <div class="col-6"> 
                                    <div class="form-group">
                                        <label><b>Provincia</b></label>
                                        <select name="provincia" class="form-select">
                                            <option value="-1">Todas las Provincias</option>
                                            <?php foreach($provincias as $provincia): ?>
                                                <option>
                                                    <?= htmlspecialchars($provincia) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>                                        
                                    </div>  
                                </div>
                                <div class="col-6"> 
                                    <div class="form-group">
                                        <label><b>Edad:</b></label>
                                        <select name="edad" class="form-select">
                                            <option value="-1">Todas las Edades</option>
                                            <?php for($i=15; $i < 70; $i++): ?>
                                                <option>
                                                    <?= htmlspecialchars($i) ?>
                                                </option>
                                            <?php endfor; ?>
                                        </select>                                         
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-success">Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col">
                        <!-- Tabla de Clientes (Columnas): ID, Nombre, Edad, Provincia, Vacia. -->
                        <table id="clientes" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Provincia</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($clientes as $cliente) {
                                        echo '<tr>';
                                        echo '<td>' . $cliente['id'] . '</td>';
                                        echo '<td>' . $cliente['nombre'] . '<br /><small>' . $cliente['email'] . '</small></td>';
                                        echo '<td>' . $cliente['edad'] . '</td>';
                                        echo '<td>' . $cliente['provincia'] . '</td>';
                                        echo '<td><a class="btn btn-success btn-sm" href="ficha.php?id=' . $cliente['id'] . '">ver ficha</a></td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br /><br /><br />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>

    <script>
        $('#clientes').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json'
            }
        });        
    </script>
</body>
</html>