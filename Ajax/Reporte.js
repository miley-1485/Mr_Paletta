function VistaReporteAdmin(){

    var data;
    
    $.ajax({
        type: "POST",
        url: "Vista/VistaReporteAdmin.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
     });
    
    $("#contenido").html(data);
    
}

function Seleccion(){

    var tipo_reporte = $("#tipo_reporte").val();
    if(tipo_reporte == 'Vendedores'){
        Vendedores();
    }

}

function Vendedores(){

    var datos;
    $.ajax({
        type: "POST",
        url: "Controlador/ReporteControl.php",
        async: false,
        dataType: 'json',
        data: {
            opc: 'Vendedores',
            fecha_inicial:$("#fecha_inicial").val(),
            fecha_final:$("#fecha_final").val()
        },
        success: function (retu) {
            datos = retu;
        }
    });
    
    var html = "<table class='table table-dark table-striped'>"+
                "<thead><tr>"+
                    "<th>Vendedor</th>"+
                    "<th>Numero de ventas</th>"+
                    "<th>Total vendido en pesos</th>"+
                "</tr></thead><tbody>";

    $.each( datos, function( key, value ) {

        html+= "<tr>"+
                    "<td>"+value.vendedor+"</td>"+
                    "<td>"+value.numero_ventas+"</td>"+
                    "<td>"+value.total+"</td>"+
               "</tr>";

    });            

    html+= "</tbody></table>";
    
    $("#repo_resultado").html(html);

    
}