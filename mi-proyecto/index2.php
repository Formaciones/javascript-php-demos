<?php 
$tituloPagina = 'Home';
$paginaActiva = 'home';
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
                    
                    <?php require_once __DIR__ . '/pages/home.php'; ?>
                    
                </div>
            </div>

            <?php require_once __DIR__ . '/layouts/footer.php'; ?>
        </div>
    </div>

    <?php require_once __DIR__ . '/layouts/scripts.php'; ?>
</body>
</html>