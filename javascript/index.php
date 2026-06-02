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
                <h1>Demos JS y jQuery</h1>
                <hr />

                <button type="button" class="btn btn-primary" id="mas">Ampliar</button>
                <button type="button" class="btn btn-primary" id="menos">Reducir</button>
                <br />
                <br />

                <form action="" method="get">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nomnbre" />
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" />
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="text" class="form-control" name="fecha" />
                    </div>
                    <br />
                    <button type="button" class="btn btn-primary" id="b1">Procesar</button>
                </form>
                <br />
                <br />

                <table class="table table-stiped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>