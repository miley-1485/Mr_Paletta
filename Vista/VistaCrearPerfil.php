<script>
    $('#frm_perfil').validate({
        rules: {
            perfil: {required: true},
            estado: {required: true},
        },
        messages: {
            perfil: {required: 'Ingrese el nombre del perfil.'},
            estado: {required: 'Ingrese el estado del perfil.'},
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            CrearPerfil();
            //alert("holaaa");
        }
    });
</script>


<h2>CREAR PERFIL</h2>
<br>

<form id="frm_perfil">
<div class="mb-3">
  <label for="lbl_nombre_perfil" class="form-label">INGRESE EL PERFIL</label>
  <input type="text" class="form-control" id="perfil" name="perfil" placeholder="INGRESE EL NOMBRE DEL PERFIL">
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