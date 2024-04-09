function VerPerfiles() {

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/PerfilControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'VerPerfiles'
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;

}

function VistaPerfilAdmin(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaPerfilAdmin.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

    
    

}