function VistaCrearVenta(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaCrearVenta.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);
}

function AddProducto(){

    var producto = $("#producto").val();

    if(producto == "" || producto == null){
        alert("Seleccione un producto");
    }else{
        
        var cantidad = 0;

        if ( $("#canti_"+producto).length > 0 ) {
            
            var cantidad_def = parseInt($("#canti_"+producto).val());
            cantidad = cantidad_def+1;

        }else{
            cantidad = 1;
        }


        $.ajax({
            type: "POST",
            url: "Controlador/ProductoControl.php",
            async: false,
            dataType: 'json',
            data: {
                opc: 'AddProducto',
                id_producto:producto

            },
            success: function (retu) {
                var stock = parseInt(retu.cantidad);

                if(cantidad <= stock){

                    
                    
                    if($("#producto_"+producto).length > 0 ){
                       $("#can_"+producto+"").html(cantidad+"<input type='hidden' id='canti_"+producto+"' value='"+cantidad+"'>"+
                       "<input type='hidden' name='productos[]' id='productos' value='"+producto+"'>"+
                       "<input type='hidden' name='cantidades[]' id='cantidades' value='"+cantidad+"'>");
                        
                    }else{

                        var html = "<tr id='producto_"+producto+"'>"+
                        "<td>"+retu.nombre_producto+"</td>"+
                        "<td id='can_"+producto+"'>"+cantidad+"<input type='hidden' id='canti_"+producto+"' value='"+cantidad+"'>"+  
                        "<input type='hidden' name='productos[]' id='productos' value='"+producto+"'>"+
                        "<input type='hidden' name='cantidades[]' id='cantidades' value='"+cantidad+"'>"+                        
                        "</td>"+
                        "<td>"+retu.valor_unitario+"</td>"+
                        "<td><input type='button' value='Eliminar' onclick='EliminarProducto("+producto+")' class='btn btn-danger'></td>"+
                        "</tr>";

                        $("#productos_add").append(html);
                    }

                    var total = parseInt($("#total").val());
                    total = total+retu.valor_unitario;

                    formateado = Intl.NumberFormat("es-CL").format(total);
                    $("#tot").html(formateado);
                    $("#total").val(total)


                }else{
                    alert("No hay disponibilidad en el stock de el producto seleccionado")
                }
            }
        });

        


    }

}

function EliminarProducto(id_producto){


    $.ajax({
        type: "POST",
        url: "Controlador/ProductoControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'AddProducto',
            id_producto:id_producto

        },
        success: function (retu) {
          var cantidad_producto = parseInt($("#canti_"+id_producto).val());
          var valor_producto = cantidad_producto*parseInt(retu.valor_unitario);
         
          var total = parseInt($("#total").val()) - valor_producto;

          $("#tot").html(total);
          $("#total").val(total);

          $("#producto_"+id_producto).remove();

        }
    });

    var arreglo_productos = [];
    $('input[name^="productos"]').each(function () {
        arreglo_productos.push($(this).val());
    });
    
   /* console.log(arreglo_productos);*/
}

function AlmacenarVenta(){


    var arreglo_productos = [];
    var arreglo_cantidades = [];

    $('input[name^="productos"]').each(function () {
        arreglo_productos.push($(this).val());
    });
    $('input[name^="cantidades"]').each(function () {
        arreglo_cantidades.push($(this).val());
    });

    if(arreglo_productos == null || arreglo_productos.length == 0){
        alert("ADICIONE UN PRODUCTO");
    }else{

        var datos;
        
        $.ajax({
            type: "POST",
            url: "Controlador/VentaControl.php",
            async: false,
            data: {
                opc: 'AlmacenarVenta',
                productos:arreglo_productos,
                cantidades:arreglo_cantidades,
                id_cliente:$("#cliente").val(),
                fecha_venta:$("#fecha_venta").val(),
                forma_pago:$("#forma_pago").val(),
                estado:$("#estado").val()
            },
            success: function (retu) {
                datos = retu;
            }
        });

        if(datos == 'ok'){
            alert("SE INGRESO CORRECTAMENTE DE LA VENTA");
            VistaCrearVenta();
        }else{
            alert("OCURRIO UN ERROR AL INGRESAR LA VENTA COMUNIQUESE CON SOPORTE TECNICO");
        }

    }
}

function VistaVentaAdmin(){

    var data;

    $.ajax({
        type: "POST",
        url: "Vista/VistaVentaAdmin.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);

}

function VerVentas(){

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/VentaControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'VerVentas'
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    return datos;
}