function VistaCrearCliente(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaCrearCliente.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);
}

function CrearCliente(){

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/ClienteControl.php",
        async: false,
        data: {
            opc: 'CrearCliente',
            identificacion_cliente:$("#identificacion_cliente").val(),
            correo:$("#correo").val(),
            sexo:$("#sexo").val(),
            id_municipio:$("#municipio").val(),
            direccion:$("#direccion").val(),
            telefono:$("#telefono").val(),
            nombre_completo:$("#nombre_completo").val(),
            fecha_nacimiento:$("#fecha_nacimiento").val()
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    if(datos == 'ok'){
        alert("SE INGRESO CORRECTAMENTE EL CLIENTE");
        VistaCrearCliente();
    }else{
        alert("OCURRIO UN ERROR AL INGRESAR EL CLIENTE COMUNIQUESE CON SOPORTE TECNICO");
    }

}

function VerClientes() {
    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/ClienteControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'VerClientes'
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;
}

function VistaClienteAdmin(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaClienteAdmin.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

}

function Clientes() {
    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/ClienteControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'Clientes'
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;
}