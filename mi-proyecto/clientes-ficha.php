<?php
    require_once 'models/Customer.php';
    require_once 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\RequestException;

    $tituloPagina = 'Ficha Cliente';
    $paginaActiva = 'fichacliente';

    $alerta = false;
    $mensaje = '';
    $tipoAlerta = '';

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

    if($_SERVER["REQUEST_METHOD"] == 'GET') {    
        $id = $_GET['id'] ?? '';
        $url = 'customers' . '/' . $id;

        $response = $client->get($url, [
            'headers' => $headers
        ]);

        if($response->getStatusCode() == 200) $data = json_decode($response->getBody(), true);    
    } elseif ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $cliente = new Customer();

        // Asignamos valores a las propiedades del objeto Cliente - Método 1
        // foreach($_POST as $campo => $valor) {
        //     if(property_exists($cliente, $campo)) {
        //         $cliente->$campo = $valor;
        //     }
        // }

        // Asignamos valores a las propiedades del objeto Cliente - Método 2
        $cliente->customerID  = $_POST['customerID'];
        $cliente->companyName  = $_POST['companyName'];
        $cliente->contactName  = $_POST['contactName'];
        $cliente->contactTitle  = $_POST['contactTitle'];
        $cliente->address  = $_POST['address'];
        $cliente->postalCode  = $_POST['postalCode'];
        $cliente->city  = $_POST['city'];
        $cliente->country  = $_POST['country'];
        $cliente->region  = $_POST['region'];
        $cliente->phone  = $_POST['phone'];
        $cliente->fax  = $_POST['fax'];
        
        $url = 'customers' . '/' . $_POST['customerID'];

        $response = $client->put($url, [
            'headers'   => $headers,
            'json'      => $cliente
        ]);

        if($response->getStatusCode() == 204) {
            $data = (array)$cliente;

            $alerta = true;
            $mensaje = 'Ficha de ' . $cliente->companyName . ' actualizada correctamente.';
            $tipoAlerta = 'alert-success';
        } else {
            $data = (array)$cliente;

            $alerta = true;
            $mensaje = 'Error ' . $response->getStatusCode() . ': Ficha de ' . $cliente->companyName . ' NO actualizada.';
            $tipoAlerta = 'alert-danger';            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/layouts/head.php'; ?>
<body>
    <div id="wrapper">
        <?php require_once __DIR__ . '/layouts/sidebar.php'; ?>

        <!-- CONTENIDO DE LA PÁGINA -->
        <div id="page-content-wrapper" class="d-flex flex-column">
            <?php require_once __DIR__ . '/layouts/navbar.php'; ?>

            <!-- ZONA CENTRAL (CON SCROLL INDEPENDIENTE) -->
            <div class="content-area p-4">
                <div class="container-fluid">
                    
                    <!-- Título de la página -->
                    <h1 class="mb-4 text-custom-green fw-bold">Ficha Cliente</h1>
                    
                    <!-- Card para el contenido -->
                    <div class="card shadow-sm card-custom mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="card-title m-0 text-secondary fw-semibold"><?= $data["companyName"] ?></h5>
                        </div>
                    
                        <div class="card-body bg-white">

                            <?php if($alerta == true): ?>
                            <div id="block-alert">
                                <br />
                                <div class="alert <?= $tipoAlerta ?>" role="alert">
                                    <?= $mensaje ?>
                                </div>
                                <br />
                            </div>
                            <?php endif; ?>

                            <form method="post" action="">
    
                                <div class="row mb-3">
                                    <label for="customerID" class="col-md-3 col-form-label text-end"><b>Identificador</b></label>
                                    <div class="col-md-9">
                                        <input type="hidden" id="customerID-hidden" name="customerID" value="<?= $data["customerID"] ?>" />
                                        <input type="text" class="form-control" id="customerID" name="customerID" value="<?= $data["customerID"] ?>" disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="companyName" class="col-md-3 col-form-label text-end"><b>Empresa</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="companyName" name="companyName" value="<?= $data["companyName"] ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="contactName" class="col-md-3 col-form-label text-end"><b>Responsable</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="contactName" name="contactName" value="<?= $data["contactName"] ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="contactTitle" class="col-md-3 col-form-label text-end"><b>Cargo</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="contactTitle" name="contactTitle" value="<?= $data["contactTitle"] ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-3 col-form-label text-end"><b>Dirección</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="address" name="address" value="<?= $data["address"] ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="city" class="col-md-3 col-form-label text-end"><b>Ciudad</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="city" name="city" value="<?= $data["city"] ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="region" class="col-md-3 col-form-label text-end"><b>Region</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="region" name="region" value="<?= $data["region"] ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="postalCode" class="col-md-3 col-form-label text-end"><b>Código Postal</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="postalCode" name="postalCode" value="<?= $data["postalCode"] ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="country" class="col-md-3 col-form-label text-end"><b>País</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="country" name="country" value="<?= $data["country"] ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-md-3 col-form-label text-end"><b>Teléfono</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $data["phone"] ?>" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fax" class="col-md-3 col-form-label text-end"><b>Fax</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="fax" name="fax" value="<?= $data["fax"] ?>" />
                                    </div>
                                </div>
                                
                                <br />

                                <div class="row">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="clientes-filter-guzzle.php" class="btn btn-outline-success">
                                                    Volver al Listado de Clientes
                                                </a>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit" class="btn btn-success">
                                                    Guardar
                                                </button>
                                                <button type="reset" class="btn btn-secondary">
                                                    Limpiar
                                                </button>                                              
                                            </div>
                                        </div>
                                    </div>                                                                        
                                </div>

                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>

            <?php require_once __DIR__ . '/layouts/footer.php'; ?>
        </div>
    </div>

    <?php require_once __DIR__ . '/layouts/scripts.php'; ?>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#block-alert').fadeOut()
            }, 3000);
        });
    </script>
</body>
</html>