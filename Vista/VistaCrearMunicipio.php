<?php

$nombre_departamento = $_POST['nombre_departamento'];
$id_departamento = $_POST['id_departamento'];

?>
<script>
    $('#frm_crear_municipio').validate({
        rules: {
            municipio: {required: true}
        },
        messages: {
            municipio: {required: 'Ingrese el nombre del municipio.'}
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
          CrearMunicipio("<?php echo $nombre_departamento;?>",<?php echo $id_departamento;?>);
        }
    });
</script>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
    <li class="breadcrumb-item"><a href="#" onclick="VistaDepartamentoAdmin()">Ver departamentos</a></li>
    <li class="breadcrumb-item"><a href="#" onclick="VistaMunicipios()">Ver Municipios <?php echo $nombre_departamento; ?></a></li>
  </ol>
</nav>

<br>

<h4>CREAR MUNICIPIO</h4>
<br>

<form id="frm_crear_municipio">

<div class="mb-3">
  <label for="lbl_departamento" class="form-label">DEPARTAMENTO : <?php echo $nombre_departamento; ?></label>
  <input type="hidden" value="<?php echo $id_departamento; ?>" >
</div>

<div class="mb-3">
  <label for="lbl_nombre_municipio" class="form-label">INGRESE EL MUNICIPIO</label>
  <input type="text" class="form-control" id="municipio" name="municipio" placeholder="INGRESE EL NOMBRE DEL MUNICIPIO">
</div>
<div class="mb-3">
    <button id="btoGuardarmunicipio" name="btoGuardarmunicipio" class="btn btn-primary" type="submit" >Guardar</button>
</div>
</form>