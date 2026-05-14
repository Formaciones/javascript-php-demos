<?php 
    require "clientes.php";

    $id = ; // Leido de parámetro id de la URL
    $cliente = $clientes[$id];

    $demo = "Demostración";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Cliente | </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Ficha de </h1>
                <hr />
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-end">
                            <label><b>Identificador</b></label>
                        </div>                        
                        <div class="col-9">
                            <input type="text" nam="nombre" class="form-control" value="<?= htmlspecialchars($demo ?? '') ?>" placeholder="" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-end">
                            <label><b>Nombre y Apellidos</b></label>
                        </div>                        
                        <div class="col-9">
                            <input type="text" class="form-control" value="" placeholder="" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-end">
                            <label><b>Edad</b></label>
                        </div>                        
                        <div class="col-9">
                            <input type="text" class="form-control" value="" placeholder="" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-end">
                            <label><b>Provincia</b></label>
                        </div>                        
                        <div class="col-9">
                            <input type="text" class="form-control" value="" placeholder="" />
                        </div>
                    </div>  
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-end">
                            <label><b>Email</b></label>
                        </div>                        
                        <div class="col-9">
                            <input type="text" class="form-control" value="" placeholder="" />
                        </div>
                    </div>                                                                                                  
                </form>
            </div>
        </div>        
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>