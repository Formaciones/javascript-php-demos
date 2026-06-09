    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Bootstrap 5.3 Bundle con Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatable Scripts -->
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>

    <!-- App JS -->
    <script src="assets/js/app.js?t=<?= time() ?>"></script>

    <!-- Script para activar/esconder el menú lateral -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const wrapper = document.getElementById('wrapper');

        menuToggle.addEventListener('click', event => {
            event.preventDefault();
            wrapper.classList.toggle('toggled');
        });
    </script>