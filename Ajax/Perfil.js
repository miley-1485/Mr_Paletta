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

function VistaCrearPerfil(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaCrearPerfil.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);
}


function CrearPerfil() {

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/PerfilControl.php",
        async: false,
        data: {
            opc: 'CrearPerfil',
            nombre: $("#perfil").val(),
            estado:  $("#estado").val()
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    if(datos == 'ok'){
        alert("SE INGRESO CORRECTAMENTE EL PERFIL");
        VistaCrearPerfil();
    }else{
        alert("OCURRIO UN ERROR AL INGRESAR EL PERFIL COMUNIQUESE CON SOPORTE TECNICO")
    }

}

function Perfiles(id_perfil) {

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/PerfilControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'Perfil',
            id_perfil:id_perfil
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;

}

function VistaEditarPerfil(id_perfil){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaEditarPerfil.php",
        async: false,
        data: {
            id_perfil:id_perfil
        },
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

}

function EditarPerfil(id_perfil) {

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/PerfilControl.php",
        async: false,
        data: {
            opc: 'EditarPerfil',
            nombre: $("#perfil").val(),
            estado:  $("#estado").val(),
            id_perfil: id_perfil
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    if(datos == 'ok'){
        alert("SE EDITO CORRECTAMENTE EL PERFIL");
        VistaEditarPerfil(id_perfil)
    }else{
        alert("OCURRIO UN ERROR AL EDITAR EL PERFIL COMUNIQUESE CON SOPORTE TECNICO")
    }

}