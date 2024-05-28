<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver Venta</li>
  </ol>
</nav>

<br>

<div class="table-responsive">
<table class="table table-striped" id="tabla_admin_ventas" class="display" >
    <thead>
        <tr>
            <th>ID VENTA</th>
            <th>FECHA VENTA</th>
            <th>TOTAL PRODUCTOS</th>
            <th>TOTAL VENTA</th>
            <th>FORMA PAGO</th>
            <th>CLIENTE</th>
            <th>VENDEDOR</th>
            <th>ESTADO</th>
            <th>ACCION</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</div>

<script>


    var json = VerVentas();

    $(document).ready(function () {
        $('#tabla_admin_ventas').DataTable({
            data: json
        });
    });

</script>
