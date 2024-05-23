<script>
    $('#frm_cliente').validate({
        rules: {
            nombre_completo: {required: true},
            correo: {required: true},
            telefono: {required: true}
        },
        messages: {
            nombre_completo: {required: 'Ingrese el nombre.'},
            correo: {required: 'Ingrese el correo.'},
            telefono: {required: 'Ingrese el telefono.'}
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            //alert("hola");
            CrearCliente();
        }
    });
</script>


<h2>CREAR CLIENTE</h2>
<br>

<form id="frm_cliente">
<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE EL NOMBRE COMPLETO</label>
  <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="INGRESE EL NOMBRE COMPLETO DEL CLIENTE">
</div>

<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE EL CORREO</label>
  <input type="email" class="form-control" id="correo" name="correo" placeholder="INGRESE EL CORREO DEL CLIENTE">
</div>

<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE EL # TELEFONICO(CELULAR)</label>
  <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="INGRESE EL NUMERO TELEFONICO DEL CLIENTE">
</div>

<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE LA IDENTIFICACION</label>
  <input type="text" class="form-control" id="identificacion_cliente" name="identificacion_cliente" placeholder="INGRESE LA IDENTIFICACION DEL CLIENTE">
</div>

<div class="mb-3">
  <label for="lbl_estado" class="form-label">SELECCIONE EL SEXO</label>
  <select id="sexo" name="sexo" class="form-select" aria-label="Default select example">
  <option value="" selected>Seleccione el sexo del cliente</option>
  <option value="MASCULINO">MASCULINO</option>
  <option value="FEMENINO">FEMENINO</option>
</select>
</div>

<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE LA FECHA DE NACIMIENTO</label>
  <input type="date" class="form-control"  id="fecha_nacimiento" name="fecha_nacimiento" placeholder="INGRESE LA FECHA DE NACIMIENTO DEL CLIENTE">
</div>


<div class="mb-3">
  <label for="lbl_estado" class="form-label">SELECCIONE EL DEPARTAMENTO</label>
  <select onchange="ListaMunicipios(this.value,'municipio')" id="departamento" name="departamento" class="form-select" aria-label="Default select example">
  <option value="" selected>Seleccione el departamento del cliente</option>
</select>
</div>

<div class="mb-3">
  <label for="lbl_estado" class="form-label">SELECCIONE EL MUNICIPIO</label>
  <select id="municipio" name="municipio" class="form-select" aria-label="Default select example">
    <option value="">Seleccione el municipio</option>
  </select>
</div>

<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE LA DIRECCION</label>
  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="INGRESE LA DIRECCION DEL CLIENTE">
</div>

<div class="mb-3">
    <button id="btoGuardarPerfil" name="btoGuardarPerfil" class="btn btn-primary" type="submit" >Guardar</button>
</div>
</form>

<script>
  var json_departamentos = ConsultaGeneralDepartamentos();
  $.each( json_departamentos, function( key, value ) {
    $("#departamento").append('<option value="'+value.id_departamento+'">'+value.nombre_departamento+'</option>');
  });
    
</script>