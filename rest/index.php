<?php
    require_once 'ApiTools.php';

    // GET
    // $n1 = $_GET['n1'] ?? null;
    // $n2 = $_GET['n2'] ?? null;

    // $url = 'http://localhost/demos/rest/api/suma.php?n1=' . $n1 . '&n2=' . $n2;
    // $response = call_api($url, 'GET');

    // POST
    $n1 = $_POST['n1'] ?? null;
    $n2 = $_POST['n2'] ?? null;    
    $url = 'http://localhost/demos/rest/api/suma.php';
    $response = call_api($url, 'POST', body: json_encode(['n1' => $n1, 'n2' => $n2]));

    $data = json_decode($response['body'], true);
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
                <form action="" method="post">
                    <div class="form-group">
                        <label>Número 1</label>
                        <input type="text" class="form-control" name="n1" />
                    </div>
                    <div class="form-group">
                        <label>Número2</label>
                        <input type="text" class="form-control" name="n2" />
                    </div>
                    <div class="form-group">
                        <label>Resultado</label>
                        <?php if($data['error'] != ''): ?>
                        <input type="text" class="form-control" value="<?= $data['error'] ?>" />
                        <?php else: ?>
                        <input type="text" class="form-control" value="<?= $data['suma'] ?>" />
                        <?php endif; ?>
                        <br />
                        <textarea class="form-control"><?= $response['body'] ?></textarea>
                        <p><small><?= $response['http_status_code'] ?> <?= $response['http_status_desc'] ?></small></p>                      
                    </div>
                    <button type="submit" class="btn btn-success">Sumar</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>