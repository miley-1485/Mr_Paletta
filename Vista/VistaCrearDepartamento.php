<script>
    $('#frm_departamento').validate({
        rules: {
            departamento: {required: true}
        
        },
        messages: {
            departamento: {required: 'Ingrese el nombre del departamento.'}
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            CrearDepartamento();
            //alert("holaaa");
        }
    });
</script>


<h2>CREAR DEPARATAMENTO</h2>
<br>

<form id="frm_departamento">
<div class="mb-3">
  <label for="lbl_nombre_departamento" class="form-label">INGRESE EL DEPARTAMENTO</label>
  <input type="text" class="form-control" id="departamento" name="departamento" placeholder="INGRESE EL NOMBRE DEL DEPARTAMENTO">
</div>

<div class="mb-3">
    <button id="btoGuardardepartamento" name="btoGuardardepartamento" class="btn btn-primary" type="submit" >Guardar</button>
</div>
</form>