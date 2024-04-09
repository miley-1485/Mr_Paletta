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

function CrearDepartamento() {

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/DepartamentoControl.php",
        async: false,
        data: {
            opc: 'CrearDepartamento',
            nombre: $("#departamento").val()
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    if(datos == 'ok'){
        alert("SE INGRESO CORRECTAMENTE EL DEPARTAMENTO");
        VistaCrearDepartamento();
    }else{
        alert("OCURRIO UN ERROR AL INGRESAR EL DEPARTAMENTO COMUNIQUESE CON SOPORTE TECNICO")
    }

}

function VistaCrearDepartamento(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaCrearDepartamento.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);
}