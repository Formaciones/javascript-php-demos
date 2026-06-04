var app = {
    Core: {},
    Tools: {},
    Pages: {
        Customers: {
            OnLoad : function() {
                $('table').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json'
                    }
                });

                //JS
                document.getElementById('loading').style.display = 'none';

                //jQuery
                $('#loading').hide();
                $('#loading').css('display', 'none');

                //jQuery Click boton B1
                $('#b1').on('click', (e) => {
                    let resultado = app.Pages.Customers.Search1();
                });
            },
            Search1: function() {
                
            },
            Search2: function() {
                
            },
            Search3: function() {
                
            },
            Search4: function() {
                
            },
        }
    }    
};