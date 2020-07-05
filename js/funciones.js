function mostrarDatosLibro(callerID) {
    console.log("llamada a funcion mostrarDatosLibro para: ", callerID);
    var columnasLibro = ['Titulo:', 'Descripción:', 'Tipo:', 'Estrenado:', 'Ventas', 'Precio'];
    var tablaDatosLibro = document.getElementById("tablaDatosLibro");
    tablaDatosLibro.innerHTML = "";
    tablaDatosLibro.innerHTML += "<thead><tr><th scope='col'>Campos</th><th scope='col'>Datos</th></tr></thead><tbody>";
    $.post('ajax/Proveedor.php',
        {functionname: 'obtenerDatosLibro', arguments: [callerID]},
        function (datosLibro) {
            if( !( datosLibro.hasOwnProperty('error') ) ) {
                var datos = JSON.parse(datosLibro);
                var result = datos['result'];
                for (let i = 0; i < result.length; i++) {
                    let html = "<tr><th scope='row'>"+columnasLibro[i]+"</th><td>"+result[i]+"</td></tr>\n";
                    $( "#tablaDatosLibro" ).append( html );
                }
            }
            else {
                console.log(datosLibro.error);
            }
        });
    tablaDatosLibro.innerHTML += "</tbody>";
}

function mostrarDatosAutor(callerID) {
    console.log("llamada a funcion mostrarDatosAutor para: ", callerID);
    var columnasAutor = ['Nombre:', 'Apellido:', 'Libros:'];
    var tablaDatosAutor = document.getElementById("tablaDatosAutor");
    tablaDatosAutor.innerHTML = "";
    tablaDatosAutor.innerHTML += "<thead><tr><th scope='col'>Campos</th><th scope='col'>Datos</th></tr></thead><tbody>";
    $.post('ajax/Proveedor.php',
        {functionname: 'obtenerDatosAutor', arguments: [callerID]},
        function (datosAutor) {
            if( !( datosAutor.hasOwnProperty('error') ) ) {
                var datos = JSON.parse(datosAutor);
                var result = datos['result'];
                for (let i = 0; i < result.length; i++) {
                    let html = "<tr><th scope='row'>"+columnasAutor[i]+"</th><td>"+result[i]+"</td></tr>\n";
                    $( "#tablaDatosAutor" ).append( html );
                }
            }
            else {
                console.log(datosAutor.error);
            }
        });
    tablaDatosAutor.innerHTML += "</tbody>";
}