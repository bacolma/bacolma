<?php 	require_once('../class/conect.php');
        require_once('../control/query.php');
        require_once('../config/config.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Ramcolba</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="../css/pricing.css" rel="stylesheet">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    
<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
  <p class="h5 my-0 me-md-auto fw-normal">Ramcolba</p>
  <nav class="my-2 my-md-0 me-md-3">
    <a class="p-2 text-dark" href="#">Features</a>
    <a class="p-2 text-dark" href="#">Enterprise</a>
    <a class="p-2 text-dark" href="#">Support</a>
    <a class="p-2 text-dark" href="#">Pricing</a>
  </nav>
</header>

  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">En proceso: </h1>
    <a href="../leonardoexpress/"><p class="lead">Leonardoexpress.com.pe</p></a>
    <a href="../leonardoexpress/"><p class="lead">Proceso de Envios</p></a>
    <h1 class="display-4">Envios</h1>
    <p class="lead">Se desplegara una opcion aparte con link aparte debe existir un usuario para cada cede y un administrador</p>
    <p class="lead">para controlar las creaciones Proceso: el usuario encargado de la cede debe incluir la informacion del paquette</p>
    <p class="lead">con su origen y a donde se dirige una ves enviado modificar su estatus, una vez el paquette llegue a su destino</p>
    <p class="lead">debe ingresar y cambiar su estatus para completar el ciclo del envio.</p>
  
  
    </p>
  </div>


  <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
   
   
    <?php 
       $id=0;
       $db = new db();
       $qr = new query();
       $db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	
       $result= $db->get_query($qr->getfindlinks($id));

     if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          ?> 
        <div class="col">
       <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 fw-normal"><?php echo "Plantilla N° -".$row['idlinks']; ?></h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?php echo $row['name']; ?></h1>
       <a href="../<?php echo $row['url'].$row['view']; ?>"> <button type="button" class="w-100 btn btn-lg btn-outline-primary">vista previa</button></a>
      </div>
      </div>
      </div> 
    <?php }
     } ?> 
    </div>


  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
         <small class="d-block mb-3 text-muted">Ramcolba&copy; 2021</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Cool stuff</a></li>
          <li><a class="link-secondary" href="#">Random feature</a></li>
          <li><a class="link-secondary" href="#">Team feature</a></li>
          <li><a class="link-secondary" href="#">Stuff for developers</a></li>
          <li><a class="link-secondary" href="#">Another one</a></li>
          <li><a class="link-secondary" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Resource</a></li>
          <li><a class="link-secondary" href="#">Resource name</a></li>
          <li><a class="link-secondary" href="#">Another resource</a></li>
          <li><a class="link-secondary" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Team</a></li>
          <li><a class="link-secondary" href="#">Locations</a></li>
          <li><a class="link-secondary" href="#">Privacy</a></li>
          <li><a class="link-secondary" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
   
  </body>
</html>
