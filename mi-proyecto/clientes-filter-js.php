<?php 
    $tituloPagina = 'Gestión Clientes';
    $paginaActiva = 'clientes';

    $countries = [
        'Argentina','Austria','Belgium','Brazil','Canada','Denmark','Finland','France','Germany','Ireland','Italy','Mexico','Norway','Poland','Portugal','Spain','Sweden','Switzerland','UK','USA','Venezuela'
    ];
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
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Empresa ..." />
                                </div>
                                <div class="col-3">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad ..." />                                    
                                </div>
                                <div class="col-3">
                                    <label>País</label>
                                    <select class="form-select" id="country" name="country">
                                        <option value="all">Todos los países</option>
                                    <?php foreach($countries as $country): ?>
                                        <option><?= $country ?></option>
                                    <?php endforeach;?>
                                    </select>                                                                        
                                </div>
                                <div class="col-3 d-flex align-items-end">
                                     &nbsp; &nbsp;
                                    <button id="b1" type="button" class="btn btn-success">Buscar</button> &nbsp;
                                    <button type="reset" class="btn btn-outline-secondary">Limpiar</button>
                                    &nbsp;
                                    <img id="loading" src="assets/images/loading2.gif" style="height:36px; width:auto;" />
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
                        </tbody>
                    </table>

                </div>
            </div>

            <?php require_once __DIR__ . '/layouts/footer.php'; ?>
        </div>
    </div>

    <?php require_once __DIR__ . '/layouts/scripts.php'; ?>
    <script>
        // jQuery
        $(document).ready(function() {
            app.Pages.Customers.OnLoad();

            // console.log('Genérico');
            // console.info('Información');
            // console.warn('Advertencía');
            // console.error('Error');
        });

        // JS
        window.onload = function() {
            //app.Pages.Customers.OnLoad();
        };

        // window.addEventListener('load', () => {
        //     app.Pages.Customers.OnLoad();
        // });        

        // document.addEventListener('DOMContentLoaded', () => {
        //     app.Pages.Customers.OnLoad();
        // });
    </script>    
</body>
</html>