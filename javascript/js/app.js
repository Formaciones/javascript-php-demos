var saludo = function(nombre) {
    alert('Hola ' + nombre + ' !!!' );
};

function Saludo(nombre) {
    alert('Hola ' + nombre + ' !!!' );
};

var persona = {
    Nombre: '',
    Apellidos: '',
    Edad: 0,
    Saluda: function() {}
}

var app = {
    Core: {
        nombre: ''
    },
    Tools: {
        index: 0,
        Borrar: function() {},
        Saluda: function() {
            alert('Hola ' + app.Core.nombre + ' !!!' );
        },
        obj: {

        }
    }
};