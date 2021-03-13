<?php  session_start(); 
include_once("query.php");
include_once("class/conect.php");
?><html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalab scale=1.0">
  <link rel="Shortcut Icon"  href="img/mr.ico" type="image/x-icon" />
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.css" >
  <link rel="stylesheet" href="css/sticky-footer.css"> 
  <link rel="stylesheet" href="css/leonardoexpress.css">
  <link rel="shortcut icon" href="img/lex.ico">
  <script type="text/javascript" src="js/bootstrap.js"></script> 
  <script type="text/javascript" src="js/datatables.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,900;1,900&display=swap" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
            $('#permisos').DataTable();
            $('#permisos')
            .removeClass( 'display' )
            .addClass('table table-bordered');
    });
    </script>

  <title>Consulta de Pedidos</title>
 </head>
<body style="background-color: #002a46!important;"> <br><br> 
  <div class="container-dest"   style="font-family: 'Montserrat', sans-serif;"> 
       <div class="card mb-4 shadow-sm" style="border-radius: 20px;">
                <div class="card-header" style="background-color:  #009bdb; color:#fff;border-radius: 20px;">
                    <h4 class="my-0 fw-normal">PEDIDOS</h4>
                </div>
                <div class="card-body"  style="border-radius: 20px;">
                    <hr>NUEVOS PEDIDOS:  <a class="edit-link" href="creap.php" title="verificar"><button class="btn btn-primary" type="button" id="btn-add" data-toggle="tooltip" data-placement="bottom" title="detalle"><i class="fa fa-plus"></i></button></a>
                    <hr>
                    <div class="content-loader">
                        <table cellspacing="0"  id="permisos" class="table table-striped table-hover table-responsive">
                            <thead style="background-color:  #009bdb;!important; color:#fff;">
                              <tr >
                                <th>ID</th>
                                <th>CLIENTE</th>
                                <th>SERIE</th>
                                <th>GUIA</th>
                                <th>CODIGO</th>
                                <th>ORIGEN</th>
                                <th>DESTINO</th>
                                <th>FECHACREACION</th>
                                <th>DESCRIPCION</th>
                                <th>MODIFICA</th>
                                <th>ELIMINA</th>
                              </tr>
                            </thead>
                              <tbody>
                                  <?php
                                    $id=0;
                                    $db = new db();
                                    $qr = new Query();
                                    $db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	
                                    $result= $db->get_query($qr->getPedidos());

                                  if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {?>
                                      <tr>
                                          <td><?php echo $row["idpedidos"]; ?></td>
                                          <td><?php echo $row["idclientes"]; ?></td>
                                          <td><?php echo $row["serie"]; ?></td>
                                          <td><?php echo $row["guia"]; ?></td>
                                          <td><?php echo $row["codigo"]; ?></td>
                                          <td><?php echo $row["origen"]; ?></td>
                                          <td><?php echo $row["destino"]; ?></td>
                                          <td><?php echo $row["fechacreacion"]; ?></td>
                                          <td><?php echo $row["descripcion"]; ?></td>
                                          <td><a class="edit-link" 
                                                      href="modped.php?id=<?php echo $row['idpedidos']; ?>" 
                                                      title="verificar"><button class="btn btn-primary" type="button" id="btn-add" data-toggle="tooltip" data-placement="bottom" title="detalle"><i class="fa fa-pencil"></i></button></a>
                                            </td>
                                            <td><a class="edit-link" 
                                                      href="elimiped_exec.php?id=<?php echo $row['idpedidos']; ?>"  
                                                      title="verificar"><button class="btn btn-danger" type="button" id="btn-add" data-toggle="tooltip" data-placement="bottom" title="detalle"><i class="fa fa-times"></i></button></a>
                                            </td>
                                      </tr>
                                            <?php  } } 
                                                    session_write_close();?>
                              </tbody>               
                        </table>
                    </div>            
                </div>
       </div>
  </div> 
</body>
</html>

