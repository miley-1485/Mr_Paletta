<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver Productos</li>
  </ol>
</nav>

<br>

<table class="table table-striped" id="tabla_admin_productos" class="display" >
    <thead>
        <tr>
            <th>NOMBRE PRODUCTO</th>
            <th>CANTIDAD</th>
            <th>VALOR UNITARIO</th>
            <th>DESCRIPCION</th>
            <th>RECETA</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>


    var json = VerProductos();

    $(document).ready(function () {
        $('#tabla_admin_productos').DataTable({
            data: json
        });
    });

</script>
