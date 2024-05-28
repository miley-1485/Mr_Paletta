<script>
    $('#frm_reportes').validate({
        rules: {
            tipo_reporte: {required: true},
            fecha_inicial: {required: true},
            fecha_final: {required: true}
        },
        messages: {
            tipo_reporte: {required: 'Ingrese el tipo de reporte.'},
            fecha_inicial: {required: 'Ingrese la fecha inicial.'},
            fecha_final: {required: 'Ingrese la fecha final.'}
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            Seleccion();
        }
    });
</script>

<form id="frm_reportes">
<div class="card" >
  <div class="card-header">
    REPORTES
  </div>
  <div class="card-body">

    <center>
    <table class="table">
        <tr>
            <td>Seleccione el tipo de reporte</td>
            <td>
            <select id="tipo_reporte" name="tipo_reporte" class="form-select" aria-label="Default select example">
                <option value="">Seleccione el reporte</option>
                <option value="Vendedores">Ventas por vendedor</option>
            </select>
        </td>
        </tr>
        <tr>
            <td>Seleccione la fecha inicial : <input type="date" class="form-control"  id="fecha_inicial" name="fecha_inicial"></td>
            <td>Seleccione la fecha final : <input type="date" class="form-control"  id="fecha_final" name="fecha_final"></td>
        </tr>
        <tr>
            <td colspan="2">
                <center><input type="submit" class="btn btn-success" value="Ver reporte"></center>
            </td>
           
        </tr>      
    </table>
    
    
    <div id="repo_resultado">

    </div>

</center>  
    

  </div>
  
</div>
</form>