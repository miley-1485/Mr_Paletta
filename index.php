<html>
<head>
    <meta charset="UTF-8">
    <title>MrPaletta</title>
    <script src="assets/jquery.js"></script>
    <link href="assets/bootstrap-5.3.3/dist/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <script src="assets/bootstrap-5.3.3/dist/js/bootstrap.js"></script>
    <style>

      .divider:after,
      .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
      }

    </style>
</head>

<body>

<!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <!-- Jumbotron -->
  <div class="container py-4" style="margin-top: 8%">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Inicio de sesión</h2>
            <form>
              <!-- 2 column grid layout with text inputs for the first and last names -->
             

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="correo" class="form-control"  placeholder="Ingrese su correo electronico"/>
                <label class="form-label" for="correo">Correo</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="clave" class="form-control" placeholder="Ingrese su contraseña"/>
                <label class="form-label" for="clave">Contraseña</label>
              </div>

            

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Sign up
              </button>

            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="assets/img/mr_paletica.png" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->

</body>
