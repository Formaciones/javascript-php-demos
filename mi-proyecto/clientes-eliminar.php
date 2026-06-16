<?php 
    require_once 'layouts/authorize.php';
    
    require_once 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\RequestException;

    $id = $_POST['customerID'] ?? '';

    if($id != '') { 
        $baseUrl = 'https://gesnorthwind.azurewebsites.net/';

        $client = new Client([
            'base_uri' => $baseUrl,
            'timeout' => 15
        ]);

        $headers = [
            'apikey'        => '1234567890.',
            'Content-Type'  => 'application/json', 
            'Accept'        => 'application/json' 
        ];          

        $url = 'customers' . '/' . $id;

        $response = $client->delete($url, [
            'headers'   => $headers
        ]);

        if($response->getStatusCode() == 200) {
            header('Location: clientes-filter-guzzle.php?mensaje=Cliente eliminado correctamente.');
        } else {
            header('Location: clientes-filter-guzzle.php?mensaje=Error al eliminar el cliente.');
        }        
    } else {
        header('Location: clientes-filter-guzzle.php');  
    } 
?>