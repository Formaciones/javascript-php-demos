    <!-- Bootstrap 5.3 Bundle con Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para activar/esconder el menú lateral -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const wrapper = document.getElementById('wrapper');

        menuToggle.addEventListener('click', event => {
            event.preventDefault();
            wrapper.classList.toggle('toggled');
        });
    </script>