<script>
    $('#frm_venta').validate({
        rules: {
            cliente: {required: true},
            fecha_venta: {required: true},
            forma_pago: {required: true},
        },
        messages: {
            cliente: {required: 'Ingrese el cliente.'},
            fecha_venta: {required: 'Ingrese la fecha de venta.'},
            forma_pago: {required: 'Ingrese la forma de pago.'},
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            //alert("hola");
            AlmacenarVenta();
        }
    });
</script>

<h2>CREAR VENTA</h2>
<br>
<form id="frm_venta">

    <div class="mb-3">
        <label for="lbl_estado" class="form-label">SELECCIONE EL CLIENTE</label>
        <select id="cliente" name="cliente" class="form-select" aria-label="Default select example">
            <option value="" selected>Seleccione el cliente al que le realizo la venta</option>   
        </select>
        <br>
        <a href="#" onclick="VistaCrearCliente()">Si no encuentra el cliente oprima click aqui para crear el cliente</a>
    </div>


    <div class="mb-3">
        <label for="lbl_nombre_perfil" class="form-label">INGRESE LA FECHA DE LA VENTA</label>
        <input type="date" class="form-control"  id="fecha_venta" name="fecha_venta" placeholder="INGRESE LA FECHA DE LA VENTA">
    </div>

    <div class="mb-3">
        <label for="lbl_estado" class="form-label">SELECCIONE LA FORMA DE PAGO</label>
        <select id="forma_pago" name="forma_pago" class="form-select" aria-label="Default select example">
            <option value="" selected>Seleccione la forma de pago de la venta</option>
            <option value="EFECTIVO">EFECTIVO</option>   
            <option value="DAVIPLATA">DAVIPLATA</option> 
            <option value="NEQUI">NEQUI</option>
            <option value="TRANSFERENCIA">TRANSFERENCIA</option>
            <option value="PSE">PSE</option>              
        </select>
    </div>

    <br>
    <b>ADICIONAR PRODUCTOS</b>
    <br>
    <div class="mb-3">
        <table>
            <tr>
                <td>
                    <label for="lbl_nombre_perfil" class="form-label">ADICIONAR PRODUCTOS A LA VENTA</label> 
                </td>
                <td>
                    <select id="producto" name="producto" class="form-select" aria-label="Default select example">
                        <option value="" selected>Seleccione el producto a adicionar</option>
                    </select>
                </td>
                <td>
                    <button type="button" onclick="AddProducto()" class="btn btn-success">Adicionar poducto</button>
                </td>               
            </tr>
        </table>
    </div>
    <div class="mb-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor unitario</th>
                    <th>Eliminar productos</th>
                </tr>    
            </thead>

            <tbody id="productos_add">
               
            </tbody>  
              
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td>TOTAL : <label id="tot"></label>
                        <input type="hidden" id="total" name="total" value="0">
                    </td>
                    <td></td>
                </tr>
            </tfoot>   
        </table>
    </div>

    <input type="hidden" value="FINALIZADA" id="estado" name="estado">
    
    <div class="mb-3">
        <button id="btoGuardarPerfil" name="btoGuardarPerfil" class="btn btn-primary" type="submit" >Guardar</button>
    </div>
</form>

<script>

    var json = ConsultaGeneralProductos();
    $.each( json, function( key, value ) {
        $("#producto").append('<option value="'+value.id_producto+'">'+value.nombre_producto+' - UNIDADES : '+value.cantidad+'</option>');
     });
     

     var json_clientes = Clientes();
     console.log(json_clientes);

     $.each( json_clientes, function( key, value ) {
        $("#cliente").append('<option value="'+value.id_cliente+'">'+value.nombre_completo+' - CELULAR : '+value.telefono+'</option>');
     });

     $('#producto').select2();
     $('#cliente').select2();
     

</script>