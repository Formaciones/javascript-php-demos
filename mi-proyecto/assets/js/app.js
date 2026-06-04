var app = {
    Core: {
        API_BASE: 'https://gesnorthwind.azurewebsites.net',
        API_KEY: '1234567890.'
    },
    Tools: {
        ShowItem: function(el) {
            el.classList.remove('d-none');
        },
        HideItem: function(el) {
            el.classList.add('d-none');
        },
    },
    Pages: {
        Customers: {
            OnLoad : function() {
                $('table').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json'
                    }
                });

                //JS (opción, mediante style -> Display)
                //document.getElementById('loading').style.display = 'none';

                //JS (opción, mediante las clase d-none)
                //document.getElementById('loading').classList.add('d-none');

                //JS (ejemplo mediante una función que funciona como una Tool)
                app.Tools.HideItem(document.getElementById('loading'));

                //JS Click boton B1
                document.getElementById('b1').onclick = (e) => {
                    let resultado = app.Pages.Customers.Search1();
                };

                // //jQuery (opción, mediante style -> Display)
                // $('#loading').hide();
                // $('#loading').css('display', 'none');

                // //jQuery (opción, mediante las clase d-none)
                // $('#loading').addClass('d-none');

                // //jQuery Click boton B1
                // $('#b1').on('click', (e) => {
                //     let resultado = app.Pages.Customers.Search1();
                // });
            },
            Search1: async function() {
                const qs = app.Pages.Customers.BuildQueryString();
                const url = app.Core.API_BASE + '/customers' + (qs ? `?${qs}` : '');

                try {
                    app.Tools.ShowItem(document.getElementById('loading'));
                    const response = await fetch(
                        url, {
                            method: 'GET', 
                            headers: {
                                'apikey': app.Core.API_KEY,
                                'Content-Type': 'application/json'
                            }
                        }
                    );

                    if(response.ok) {
                        const data = await response.json();
                        app.Pages.Customers.RenderTable(data);
                    } else {
                        console.error('Fetch Error:', response.status, response.statusText);                        
                    }

                    app.Tools.HideItem(document.getElementById('loading'));
                } catch(err) {
                    console.error('Fetch Error:', err);
                    app.Tools.HideItem(document.getElementById('loading'));
                }
            },
            Search2: function() {
                
            },
            Search3: function() {
                
            },
            Search4: function() {
                
            },
            BuildQueryString: function() {
                // Parámetros de filtrado
                const company = document.getElementById('company').value.trim();
                const city = document.getElementById('city').value.trim();
                const country = document.getElementById('country').value.trim();

                // Alternativa
                // const company = document.querySelector('input[name="company"]').value.trim();
                // const city = document.querySelector('input[name="city"]').value.trim();
                // const country = document.querySelector('select[name="country"]').value.trim();

                let params = {};
                if(company !== '') params.company = company;
                if(city !== '') params.city = city;
                if(country !== 'all') params.country = country;

                return new URLSearchParams(params).toString();
            },
            RenderTable(customers) {
                let html = '';

                customers.forEach(item => {
                    html += '<tr>'
                    + `<td>${(item.customerID || '')}</td>`
                    + '<td>' + (item.companyName || '') + '</td>'
                    + `<td>${(item.contactName || '')}</td>`
                    + `<td>${(item.address || '')}</td>`
                    + `<td>${(item.phone || '')}</td>`
                    + '<td></td></tr>';
                });

                $('table').DataTable().clear().destroy();
                
                document.getElementsByTagName('tbody')[0].innerHTML = html;

                $('table').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json'
                    }
                });                
            },
        }
    }    
};