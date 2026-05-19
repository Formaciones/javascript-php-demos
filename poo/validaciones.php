<?php 
    require_once 'funciones.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <br />
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Validaciones</h1>
                <hr />
                <form action="validaciones.php" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" />
                    </div>
                    <div class="form-group">
                        <label>Matrícula</label>
                        <input class="form-control" name="matricula" />
                    </div>
                    <div class="form-group">
                        <label>Matrícula 2</label>
                        <input class="form-control" name="matricula2" pattern="/^[0-9]{4}[A-Z]{3}$/" required />
                    </div>                                        
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>