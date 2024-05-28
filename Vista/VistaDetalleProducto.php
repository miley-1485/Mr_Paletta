<?php
$id_producto = $_POST['id_producto'];

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver Detalle producto</li>
  </ol>
</nav>


<div class="card">
  <div class="card-header">
    Detalle del producto
  </div>
  <div class="card-body">
    <center><img src="" id="imagen" class="card-img-top" style="height: 300px; width: 300px;">
        <br>
        <br>
        <h5 class="card-title" id="titulo_producto"></h5>
    </center>
    <ul class="list-group list-group-flush" id="descripcion">
    
    </ul>
    
  </div>
</div>

<script>
    var datos;
    var producto = <?php echo $id_producto; ?>;
    

    $.ajax({
            type: "POST",
            url: "Controlador/ProductoControl.php",
            async: false,
            dataType: 'json',
            data: {
                opc: 'AddProducto',
                id_producto:producto

            },
            success: function (retu) {
                datos = retu;
            }
        });
    
    $("#imagen").attr("src","documentos/"+datos.foto+"");
    $("#titulo_producto").html(datos.nombre_producto); 

    var html = '<li class="list-group-item"><b>CANTIDAD O STOCK :</b> '+datos.cantidad+'</li>'+
    '<li class="list-group-item"><b>VALOR UNITARIO :</b> '+datos.valor_unitario+'</li>'+
    '<li class="list-group-item"><b>DESCRIPCION :</b> '+datos.descripcion+'</li>'+
    '<li class="list-group-item"><b>RECETA :</b> '+datos.receta+'</li>';

    $("#descripcion").html(html);


    
</script>
