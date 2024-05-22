function VerSedes() {
    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/SedeControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'VerSedes'
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;
}

function VistaSedeAdmin(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaSedeAdmin.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

}


function VistaCrearSede(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaCrearSede.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);
}

function CrearSede() {

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/SedeControl.php",
        async: false,
        data: {
            opc: 'CrearSede',
            nombre:$("#nombre").val(),
            direccion:$("#direccion").val(),
            id_municipio:$("#municipio").val(),
            indicaciones:$("#indicaciones").val(),
            estado:$("#estado").val()
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    if(datos == 'ok'){
        alert("SE INGRESO CORRECTAMENTE LA SEDE");
        VistaCrearSede();
    }else{
        alert("OCURRIO UN ERROR AL INGRESAR LA SEDE COMUNIQUESE CON SOPORTE TECNICO");
    }

}