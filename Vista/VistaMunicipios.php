<?php
$nombre_departamento = $_POST['nombre_departamento'];
$id_departamento = $_POST['id_departamento'];
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
    <li class="breadcrumb-item"><a href="#" onclick="VistaDepartamentoAdmin()">Ver departamentos</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $nombre_departamento; ?></li>
  </ol>
</nav>

<br>

<div class="container text-center">
  <div class="row">
    <div class="col">
        <h4>Municipios del departamento : <?php echo $nombre_departamento;?></h4>
    </div>
    <div class="col">
        <button type="button" onclick="VistaCrearMunicipio('<?php echo $nombre_departamento;?>',<?php echo $id_departamento; ?>)" class="btn btn-primary">CREAR MUNICIPIO</button>
    </div>
  </div>
</div>

<br>

<table class="table table-striped" id="tabla_admin_municipios" class="display" >
    <thead>
        <tr>
            <th>NOMBRE MUNICIPIOS</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>

    var json = VerMunicipios(<?php echo $id_departamento; ?>);


$(document).ready(function () {
    $('#tabla_admin_municipios').DataTable({
        data: json
    });
});


</script>