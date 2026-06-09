<?php 
    $tituloPagina = 'Ficha Cliente';
    $paginaActiva = 'fichacliente';

    $id = $_GET['id'] ?? '';

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
                            <h5 class="card-title m-0 text-secondary fw-semibold">Contenido Principal</h5>
                        </div>
                        <div class="card-body bg-white">
                            <form method="post" action="">
    
                                <div class="row mb-3">
                                    <label for="customerID" class="col-md-3 col-form-label text-end"><b>Identificador</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="customerID" name="customerID" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="companyName" class="col-md-3 col-form-label text-end"><b>Empresa</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="companyName" name="companyName" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="contactName" class="col-md-3 col-form-label text-end"><b>Responsable</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="contactName" name="contactName" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="contactTitle" class="col-md-3 col-form-label text-end"><b>Cargo</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="contactTitle" name="contactTitle" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-md-3 col-form-label text-end"><b>Dirección</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="address" name="address" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="city" class="col-md-3 col-form-label text-end"><b>Ciudad</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control text-end" id="city" name="city" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="region" class="col-md-3 col-form-label text-end"><b>Region</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="region" name="region" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="postalCode" class="col-md-3 col-form-label text-end"><b>Código Postal</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="postalCode" name="postalCode" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="country" class="col-md-3 col-form-label text-end"><b>País</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="country" name="country" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-md-3 col-form-label text-end"><b>Teléfono</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="phone" name="phone" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fax" class="col-md-3 col-form-label text-end"><b>Fax</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="fax" name="fax" value="">
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
</body>
</html>