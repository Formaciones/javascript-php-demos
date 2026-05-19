<?php 
    require_once 'funciones.php';

    $matricula = $_POST['matricula'] ?? '';
    $email = $_POST['email'] ?? '';

    $mensajeMatricula = '';
    $mensajeEmail = '';

    if($matricula == '') $mensajeMatricula = "Matrícula no válida.";
    else {
        $mensajeMatricula = matriculaValida($matricula) == true  
            ? 'La matrícula <i>' . $matricula . '</i> es válida.' 
            : 'La matrícula <i>' . $matricula . '</i> no es válida.';
    }

    if($email == '') $mensajeEmail = "Email no válido.";
    else {
        $mensajeEmail = match(emailValido($email)) { 
            1 => 'El email <i>' . $email . '</i> es válido.',  
            0 => 'El email <i>' . $email . '</i> no es válido.' 
        };
    }    
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
                <p><?=  $mensajeEmail ?></p>
                <p><?=  $mensajeMatricula ?></p>
                <br />
                <form action="validaciones.php" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Matrícula</label>
                        <input class="form-control" name="matricula" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Matrícula 2</label>
                        <input class="form-control" name="matricula2" pattern="[0-9]{4}[A-Z]{3}" />
                    </div>
                    <br />
                    <button type="submit" class="btn btn-primary">Enviar</button>                                        
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>