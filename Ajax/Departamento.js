function VerDepartamentos() {
    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/DepartamentoControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'VerDepartamentos'
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;
}

function VistaDepartamentoAdmin(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaDepartamentoAdmin.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

}