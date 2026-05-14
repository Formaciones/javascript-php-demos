<?php 
    require "clientes.php";

    $id = (int) ($_GET["id"] ?? "0"); // Leido de parámetro id de la URL
    $cliente = $clientes[$id - 1];

    $provincias = array_unique(array_column($clientes, 'provincia'));
    sort($provincias);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Cliente | <?= htmlspecialchars($cliente["nombre"] ?? '') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Ficha de <?= htmlspecialchars($cliente["nombre"] ?? '') ?></h1>
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
                            <input type="text" nam="id" class="form-control" value="<?= htmlspecialchars($cliente["id"] ?? '') ?>" placeholder="" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-end">
                            <label><b>Nombre y Apellidos</b></label>
                        </div>                        
                        <div class="col-9">
                            <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($cliente["nombre"] ?? '') ?>" placeholder="" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-end">
                            <label><b>Edad</b></label>
                        </div>                        
                        <div class="col-9">
                            <input type="number" min="15" max="130" name="edad" class="form-control" value="<?= htmlspecialchars($cliente["edad"] ?? '') ?>" placeholder="" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-end">
                            <label><b>Provincia</b></label>
                        </div>                        
                        <div class="col-9">
                            <select class="form-select">
                                <?php foreach($provincias as $provincia): ?>
                                    <option<?= ($cliente["provincia"] == $provincia ? ' selected' : '') ?>>
                                        <?= htmlspecialchars($provincia) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>  
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-end">
                            <label><b>Email</b></label>
                        </div>                        
                        <div class="col-9">
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($cliente["email"] ?? '') ?>" placeholder="" />
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