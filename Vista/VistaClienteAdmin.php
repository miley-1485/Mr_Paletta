<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver clientes</li>
  </ol>
</nav>

<br>

<table class="table table-striped" id="tabla_admin_cliente" class="display" >
    <thead>
        <tr>
            <th>NOMBRE COMPLETO</th>
            <th>CORREO</th>
            <th>TELEFONO O CELULAR</th>
            <th>IDENTIFICACION</th>
            <th>SEXO</th>
            <th>DEPARTAMENTO/MUNICIPIO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>


    var json = VerClientes();

    $(document).ready(function () {
        $('#tabla_admin_cliente').DataTable({
            data: json
        });
    });

</script>
