<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver Sedes</li>
  </ol>
</nav>

<br>

<table class="table table-striped" id="tabla_admin_sedes" class="display" >
    <thead>
        <tr>
            <th>NOMBRE SEDE</th>
            <th>DEPARTAMENTO</th>
            <th>MUNICIPIO</th>
            <th>DIRECCION</th>
            <th>INDICACIONES</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>


    var json = VerSedes();

    $(document).ready(function () {
        $('#tabla_admin_sedes').DataTable({
            data: json
        });
    });

</script>
