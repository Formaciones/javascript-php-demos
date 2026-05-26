<?php 
    $tituloPagina = 'Gestión Clientes';
    $paginaActiva = 'clientes';

    require_once 'libraries/ApiCustomers.php';

    $result = list_customers();
    $data = null;
    if($result['http_status_code'] == 200) $data = json_decode($result['body'], true);
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
                    <hr />

                    <?php if($result['http_status_code'] != 200): ?>                        
                    <!-- Bloque ERROR -->
                    <div class="alert alert-danger">
                        <p><b>Status Code:</b> <?= $result['http_status_code'] ?> <?= $result['http_status_desc'] ?></p>
                        <pre><b>Error:</b><?= $result['error'] ?></pre>
                    </div>
                
                    <?php else: ?>
                    <!-- Bloque OK -->
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
                                    <td> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?php endif; ?>


                    <!-- Card para el contenido -->
                    <!-- <div class="card shadow-sm card-custom mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="card-title m-0 text-secondary fw-semibold">Contenido Principal</h5>
                        </div>
                        <div class="card-body bg-white">
                            
                        </div>
                    </div> -->
                    
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