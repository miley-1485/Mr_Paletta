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

function CrearMunicipio(nombre_departamento,id_departamento) {

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/MunicipioControl.php",
        async: false,
        data: {
            opc: 'CrearMunicipio',
            id_departamento:id_departamento,
            nombre:$("#municipio").val()
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    if(datos == 'ok'){
        alert("SE INGRESO CORRECTAMENTE EL MUNICIPIO");
        VistaMunicipios(nombre_departamento,id_departamento);
    }else{
        alert("OCURRIO UN ERROR AL INGRESAR EL MUNICIPIO COMUNIQUESE CON SOPORTE TECNICO")
    }

}

function ListaMunicipios(id_departamento,nombre_control){

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/MunicipioControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'ConsultaGeneralMunicipios',
            id_departamento:id_departamento
        },
        success: function (retu) {
            $("#"+nombre_control+"").html("");
            $("#"+nombre_control+"").append('<option value="">Seleccione el municipio</option>');
            $.each( retu, function( key, value ) {
                $("#"+nombre_control+"").append('<option value="'+value.id_municipio+'">'+value.nombre+'</option>');
              });

        }
    });
    
    

}