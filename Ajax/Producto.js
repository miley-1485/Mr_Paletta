function VistaCrearProducto(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaCrearProducto.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);
}

function CrearProducto(){

    var archivo = document.getElementById("foto");
    var extensiones_permitidas = new Array(".jpg",".png","jpeg");
    var formElement = document.getElementById("frm_producto");
    var data = new FormData(formElement);

    var file;
    var errores = 0;

    var extension_archivo = (archivo.value.substring(archivo.value.lastIndexOf("."))).toLowerCase();
    var permitida_archivo = false;

    for (var i = 0; i < extensiones_permitidas.length; i++) {
        if (extensiones_permitidas[i] == extension_archivo) {
            permitida_archivo = true;
            break;
        }
    }

    if (permitida_archivo) {
        file = archivo.files[0];
        data.append('foto', file);
    } else {
        errores = errores + 1;
    }

    if (errores == 0) {

        data.append('opc', 'CrearProducto');
        data.append('nombre_producto', $("#nombre").val());
        data.append('descripcion', $("#descripcion").val());
        data.append('receta', $("#receta").val());
        data.append('valor_unitario', $("#valor_unitario").val());
        data.append('cantidad', $("#cantidad").val());
        data.append('estado', $("#estado").val());

        var url = "Controlador/ProductoControl.php";
        var retorno;
        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            async: false,
            processData: false,
            cache: false
        }).done(function (retu) {
            retorno = retu;
        });
        
        if(retorno == 'ok'){
            alert("SE INGRESO CORRECTAMENTE EL PRODUCTO");
            VistaCrearProducto();
        }else if(retorno == 'error'){
            alert("OCURRIO UN ERROR AL INGRESAR LA SEDE COMUNIQUESE CON SOPORTE TECNICO");
        }
        

    } else {
        alert("Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join() + "\n O revise que todos los documentos esten anexos ");
    }
}

function VerProductos(){

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/ProductoControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'VerProductos'
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;
}

function VistaProductoAdmin(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaProductoAdmin.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

}

function ConsultaGeneralProductos(){
    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/ProductoControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'ConsultaGeneralProductos'
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;
}

function VistaDetalleProducto(id_producto){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaDetalleProducto.php",
        async: false,
        data:{
            id_producto:id_producto
        },
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

}