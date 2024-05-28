<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver departamentos</li>
  </ol>
</nav>

<br>

<div class="table-responsive">
<table class="table table-striped" id="tabla_admin_departamento" class="display" >
    <thead>
        <tr>
            <th>NOMBRE DEPARTAMENTO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</div>

<script>


    var json = VerDepartamentos();

    $(document).ready(function () {
        $('#tabla_admin_departamento').DataTable({
            data: json
        });
    });

</script>
