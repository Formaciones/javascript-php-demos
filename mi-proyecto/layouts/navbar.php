            <!-- Barra superior (Navbar básica con el botón de toggle) -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4 py-2">
                <div class="row">
                    <div class="col-lg-4">
                        <button class="btn btn-outline-success" id="menu-toggle">
                            <i class="bi bi-list fs-5"></i>
                        </button>
                        <span class="ms-3 fw-semibold text-secondary">Panel de Control</span>                        
                    </div>
                    <div class="col-lg-8">
                        <b>Usuario:</b> <?= $_SESSION['usuario'] ?> <a href="logout.php" class="btn btn-link">Logout</a>
                    </div>
                </div>
            </nav>