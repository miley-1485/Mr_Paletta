
<table class="table-bordered" id="tabla_admin_docentes" class="display" >
    <thead>
        <tr>

            <th>NOMBRE PERFIL</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>


    var json = VerPerfiles();

    $(document).ready(function () {
        $('#tabla_admin_docentes').DataTable({
            data: json
        });
    });

</script>
