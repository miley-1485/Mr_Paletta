function VistaMunicipios(nombre_departamento,id_departamento){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaMunicipios.php",
        async: false,
        data: {
            nombre_departamento: nombre_departamento,
            id_departamento:id_departamento
        },
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

}


function VerMunicipios(id_departamento){


    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/MunicipioControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'VerMunicipios',
            id_departamento:id_departamento
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;

}

function VistaCrearMunicipio(nombre_departamento,id_departamento){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaCrearMunicipio.php",
        async: false,
        data: {
            nombre_departamento: nombre_departamento,
            id_departamento:id_departamento
        },
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

}