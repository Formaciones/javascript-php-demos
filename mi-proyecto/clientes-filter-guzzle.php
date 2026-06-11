<?php 
    require_once 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\RequestException;

    $tituloPagina = 'Gestión Clientes';
    $paginaActiva = 'clientes';

    $countries = [
        'Argentina','Austria','Belgium','Brazil','Canada','Denmark','Finland','France','Germany','Ireland','Italy','Mexico','Norway','Poland','Portugal','Spain','Sweden','Switzerland','UK','USA','Venezuela'
    ];

    $company = $_POST['company'] ?? null;
    $city = $_POST['city'] ?? null;
    $country = $_POST['country'] ?? null;

    $data = null;
    $result = null;

    if($company != null || $city != null || ($country != 'all' && $country != null)) {
        // Crear el cliente HTTP
        $baseUrl = 'https://gesnorthwind.azurewebsites.net/';

        if($country == 'all') $country = null;

        $params = '';
        $params .= ($params != '' ? '&' : '') . ($company != null ? 'company=' . $company : '');
        $params .= ($params != '' ? '&' : '') . ($city != null ? 'city=' . $city : '');
        $params .= ($params != '' ? '&' : '') . ($country != null ? 'country=' . $country : '');

        $url = 'customers' . ($params != null ? '?' . $params : '');

        $headers = [
            'apikey'        => '1234567890.',
            'Content-Type'  => 'application/json', 
            'Accept'        => 'application/json' 
        ];           
        
        $client = new Client([
            'base_uri' => $baseUrl,
            'timeout' => 15
        ]);

        $response = $client->get($url, [
            'headers' => $headers
        ]);

        if($response->getStatusCode() == 200) $data = json_decode($response->getBody(), true);
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
                    <h1 class="mb-4 text-custom-green fw-bold">Gestión de Clientes</h1>                                        
                   
                    <div class="card shadow-sm card-custom mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="card-title m-0 text-secondary fw-semibold">Filtro de Clientes</h5>
                        </div>
                        <div class="card-body bg-white">
                            <form method="post" class="row g-2 mb-3">
                                <div class="col-3">
                                    <label>Nombre de la Empresa</label>
                                    <input type="text" class="form-control" name="company" placeholder="Empresa ..." />
                                </div>
                                <div class="col-3">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control" name="city" placeholder="Ciudad ..." />                                    
                                </div>
                                <div class="col-3">
                                    <label>País</label>
                                    <select class="form-select" name="country">
                                        <option value="all">Todos los países</option>
                                    <?php foreach($countries as $country): ?>
                                        <option><?= $country ?></option>
                                    <?php endforeach;?>
                                    </select>                                                                        
                                </div>
                                <div class="col-3 d-flex align-items-end">
                                     &nbsp; &nbsp;
                                    <button type="submit" class="btn btn-success">Buscar</button> &nbsp;
                                    <button type="reset" class="btn btn-outline-secondary">Limpiar</button> &nbsp; &nbsp; &nbsp;
                                    <a class="btn btn-info" href="clientes-ficha.php?op=nuevo">Nuevo</a>
                                </div>
                            </form>
                        </div>
                    </div>                    
                    <hr />
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Empresa</th>
                                <th>Contacto</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($data != null): ?>
                            <?php foreach($data as $customer): ?>
                                <tr>
                                    <td><?= $customer['customerID'] ?></td>
                                    <td><?= $customer['companyName'] ?></td>
                                    <td>
                                        <?= $customer['contactName'] ?>
                                        <br />
                                        <small>(<?= $customer['contactTitle'] ?>)</small>
                                    </td>
                                    <td>
                                        <?= $customer['address'] ?>
                                        <br />
                                        <small><?= $customer['postalCode'] ?> <?= $customer['city'] ?> (<?= $customer['country'] ?>)</small>
                                    </td>
                                    <td><?= $customer['phone'] ?></td>
                                    <td> 
                                        <a class="btn btn-sm btn-success" href="clientes-ficha.php?id=<?= $customer['customerID'] ?>">ver ficha</a>
                                    </td>
                                </tr>
                            <?php 
                                endforeach; 
                            endif;
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <?php require_once __DIR__ . '/layouts/footer.php'; ?>
        </div>
    </div>

    <?php require_once __DIR__ . '/layouts/scripts.php'; ?>
    <script>
        $('table').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json'
            }
        });        
    </script>    
</body>
</html>