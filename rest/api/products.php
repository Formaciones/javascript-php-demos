<?php
// ========================================
// Establecemos cabeceras del Response
// ========================================
header('Content-Type: application/json; charset=UTF-8');


// ========================================
// Método HTTP del Request
// ========================================
$method = $_SERVER['REQUEST_METHOD'];


// ========================================
// Configuración de la Base de Datos
// ========================================
$db_host = 'localhost';
$db_name = 'northwind';
$db_user = 'dbuser';
$db_pass = 'phpPa$$w0rd';

$connection = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8mb4';
$connection = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


// ========================================
// Procesamiento del Request
// ========================================
try {
    $pdo = new PDO($connection, $db_user, $db_pass, $options);

    $id = $_GET['id'] ?? null;

    if($method == 'GET' && $id == null) {
        $query = 'SELECT * FROM products';
        $cursor = $pdo->query($query);          // QUERY retorna un curso (incluso un array vacio)
        $products = $cursor->fetchAll();

        http_response_code(200);
        echo json_encode($products);
        exit;
    } elseif($method == 'GET' && $id != null) {              
        // $query = 'SELECT * FROM products WHERE ProductID = ' . $id;
        // $cursor = $pdo->query($query);
        // $products = $cursor->fetchAll();

        $query = 'SELECT * FROM products WHERE ProductID = ?';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);                  // EXCUTE retorna true o false dependiendo de la ejecución del comando
        $product = $stmt->fetch();

        http_response_code(200);
        echo json_encode($product);
        exit;      
    } else {
        http_response_code(405);
        echo json_encode([
            'code' => 405, 
            'details' => '',
            'error' => $method . 'no permitido.']);
        exit;        
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'code' => 500, 
        'details' => $e->getMessage(),
        'error' => 'Error de aplicación o base de datos.']);
    exit;
}
?>