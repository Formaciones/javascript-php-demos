<?php 

    $dias = array("lunes", "martes", "miercoles", "jueves", "viernes", "sábado", "domingo");

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
                <form action="" method="get">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Día de la Semana</label>
                                <select class="form-select" name="dia">
                                    <?php 
                                        // Pintar los OPTIONS con value de 1 a 7 y la etiqueta la prmera letra en mayúsculas
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