            <!-- Barra superior (Navbar básica con el botón de toggle) -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4 py-2">
                <button class="btn btn-outline-success" id="menu-toggle">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <span class="ms-3 fw-semibold text-secondary">Panel de Control</span> 
   
                <div class="ms-auto">
                    <?php if(isset($_SESSION['usuario'])): ?>
                        <b>Usuario:</b> <?= $_SESSION['usuario'] ?> <a href="logout.php" class="btn btn-link">Logout</a>
                    <?php else: ?>
                            <a href="login.php" class="btn btn-link">Login</a>
                    <?php endif; ?>
                </div>
            </nav>