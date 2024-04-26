<?php 

session_start();

if(isset($_SESSION['usr'])){

    $usuario = $_SESSION['usr'][0];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>MrPaletta</title>
    <script src="assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/jquery.js"></script>
    <link href="assets/bootstrap-5.3.3/dist/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <script src="Ajax/Perfil.js"></script>
    <script src="Ajax/Departamento.js"></script>
    <script src="Ajax/Municipio.js"></script>
    <script src="assets/Datatable/datatables.min.js"></script>
    <link href="assets/css/datatable.css" rel="stylesheet"></script>
    <script src="assets/js/jquery_validate.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg" style="background-color:#ffd91a">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img
        src="assets/img/mr_paletta_nombre.png"
        class="me-2"
        height="50"
        alt="mr paletta Logo"
        loading="lazy"
      />
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
       
     
        <li class="nav-item dropdown" style="margin-right: 100px">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $usuario["nombre_completo"];?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Editar mi informacion</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesion</a></li>
          </ul>
        </li>
       
      </ul>
     
    </div>
  </div>
</nav>


<div class="container-fluid" style="margin-top: 3%">
<div class="row">
    <div class="col-3">
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        Usuario
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
       <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <button type="button" class="btn btn-link">
                    Crear usuario
                </button>
            </li>
            <li class="list-group-item">
                <button type="button" class="btn btn-link">Ver usuarios</button>
            </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- INICIA UN ITEM DEL ACORDEON -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Perfil
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      
      <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <button type="button" class="btn btn-link" onclick="VistaPerfilAdmin()">
                    Ver Perfiles
                </button>
            </li>
            <li class="list-group-item">
                <button type="button" class="btn btn-link" onclick="VistaCrearPerfil()">
                    Crear Perfiles
                </button>
            </li>
      </ul>
      

      </div>
    </div>
  </div>
  <!-- FINALIZA UN ITEM DEL ACORDEON -->


    <!-- INICIA UN ITEM DEL ACORDEON -->
    <div class="accordion-item">
    <h2 class="accordion-header" id="headingdepto">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsedepto" aria-expanded="false" aria-controls="collapsedepto">
        Departamentos
      </button>
    </h2>
    <div id="collapsedepto" class="accordion-collapse collapse" aria-labelledby="headingdepto" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      
      <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <button type="button" class="btn btn-link" onclick="VistaDepartamentoAdmin()">
                    Ver departamentos
                </button>
            </li>
            <li class="list-group-item">
                <button type="button" class="btn btn-link" onclick="VistaCrearDepartamento()">
                    Crear departamentos
                </button>
            </li>
      </ul>
      

      </div>
    </div>
  </div>
  <!-- FINALIZA UN ITEM DEL ACORDEON -->



  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Sede
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="col-9">
     

    <div class="card">
            <div class="card-body" id="contenido">
            Bienvenido al sistema de gestion de MR Paletta
            </div>
    </div>   



    </div>
</row>
</div>


</body>
</html>

<?php } else { 


header('Location: index.php');
die();

}?>