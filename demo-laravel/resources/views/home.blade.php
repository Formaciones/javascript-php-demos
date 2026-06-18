<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css'])   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>
<body>
    <br />
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1>Hola Laravel ...</h1>
            <hr />
            <p><b>Nombre:</b> {{ $nombre }}</p>
            <p><b>Matricula:</b> {{ $matricula }}</p>
        </div>
        <div class="col-1"></div>
    </div>

    @vite(['resources/js/app.js'])
    <script src="http://localhost:5173/resources/js/app.js"></script>
    <script src="/js/demo.js"></script>
</body>
</html>