<script>
    $('#frm_sede').validate({
        rules: {
            nombre: {required: true},
            departamento: {required: true},
            municipio: {required: true},
            direccion: {required: true},
            indicaciones: {required: true},
            estado: {required: true},
        },
        messages: {
            nombre: {required: 'Ingrese el nombre de la sede.'},
            departamento: {required: 'Ingrese el departamento.'},
            municipio: {required: 'Ingrese el municipio.'},
            direccion: {required: 'Ingrese la direccion.'},
            indicaciones: {required: 'Ingrese las indicaciones.'},
            estado: {required: 'Ingrese el estado.'},
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            CrearSede();
        }
    });
</script>


<h2>CREAR SEDE</h2>
<br>

<form id="frm_sede">
<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE EL NOMBRE DE LA SEDE</label>
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="INGRESE NOMBRE SEDE">
</div>
<div class="mb-3">
  <label for="lbl_estado" class="form-label">SELECCIONE EL DEPARTAMENTO</label>
  <select id="departamento" name="departamento" onchange="ListaMunicipios(this.value,'municipio')" class="form-select" aria-label="Default select example">
    <option value="">Seleccione el departamento</option>
  </select>
</div>
<div class="mb-3">
  <label for="lbl_estado" class="form-label">SELECCIONE EL MUNICIPIO</label>
  <select id="municipio" name="municipio" class="form-select" aria-label="Default select example">
    <option value="">Seleccione el municipio</option>
  </select>
</div>
<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE LA DIRECCION DE LA SEDE</label>
  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="INGRESE DIRECCION SEDE">
</div>
<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE INDICACIONES PARA LLEGAR A LA SEDE</label>
  <textarea class="form-control" id="indicaciones" name="indicaciones" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="lbl_estado" class="form-label">SELECCIONE EL ESTADO</label>
  <select id="estado" name="estado" class="form-select" aria-label="Default select example">
  <option value="" selected>Seleccione el estado del perfil</option>
  <option value="AC">ACTIVO</option>
  <option value="IN">INACTIVO</option>
</select>
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