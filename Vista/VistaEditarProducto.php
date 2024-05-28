<?php
$id_producto = $_POST['id_producto'];
?>

<script>
    $('#frm_producto').validate({
        rules: {
            nombre: {required: true},
            valor_unitario: {required: true},
            cantidad: {required: true},
            descripcion: {required: true},
            estado: {required: true},
        },
        messages: {
            nombre: {required: 'Ingrese el nombre.'},
            valor_unitario: {required: 'Ingrese el valor unitario.'},
            cantidad: {required: 'Ingrese la cantidad.'},
            descripcion: {required: 'Ingrese la descripcion.'},
            estado: {required: 'Ingrese el estado.'},
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            
            EditarProducto(<?php echo $id_producto;?>);
        }
    });
</script>


<h2>EDITAR PRODUCTO</h2>
<br>

<form id="frm_producto">
<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE EL NOMBRE DEL PRODUCTO</label>
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="INGRESE NOMBRE PRODUCTO">
</div>

<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE EL VALOR UNITARIO DEL PRODUCTO</label>
  <input type="number" class="form-control" id="valor_unitario" name="valor_unitario" placeholder="INGRESE VALOR UNITARIO">
</div>

<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE LA CANTIDAD DEL PRODUCTO</label>
  <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="INGRESE EL STOCK DEL PRODUCTO">
</div>

<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE LA DESCRIPCION DEL PRODUCTO</label>
  <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
</div>

<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE LA RECETA DEL PRODUCTO</label>
  <textarea class="form-control" id="receta" name="receta" rows="3"></textarea>
</div>


<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">SELECCIONE LA FOTO DEL PRODUCTO</label>
  <input type="file" class="form-control" id="foto" name="foto">
</div>

<div class="mb-3">
  <label for="lbl_estado" class="form-label">SELECCIONE EL ESTADO</label>
  <select id="estado" name="estado" class="form-select" aria-label="Default select example">
  <option value="">Seleccione el estado del producto</option>
  <option value="AC">ACTIVO</option>
  <option value="IN">INACTIVO</option>
</select>
</div>

<div class="mb-3">
    <button id="btoGuardarPerfil" name="btoGuardarPerfil" class="btn btn-primary" type="submit" >Guardar</button>
</div>
</form>


<script>
    var datos;
    var producto = <?php echo $id_producto; ?>;
    

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
                datos = retu;
            }
        });

    $("#nombre").val(datos.nombre_producto);
    $("#valor_unitario").val(datos.valor_unitario);
    $("#cantidad").val(datos.cantidad);
    $("#descripcion").val(datos.descripcion);
    $("#receta").val(datos.receta);
    $("#estado").val(datos.estado);

</script>
