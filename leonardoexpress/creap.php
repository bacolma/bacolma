<?php session_start(); 
include_once("query.php");
include_once("class/conect.php");


?><html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalab scale=1.0">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.css" >
  <link rel="stylesheet" href="css/sticky-footer.css"> 
  <link rel="shortcut icon" href="img/lex.ico">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,900;1,900&display=swap" rel="stylesheet">
  <script type="text/javascript" src="js/bootstrap.js"></script> 
  <script type="text/javascript" src="js/datatables.min.js"></script>
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
  <title>Nuevo Pedido</title>
 </head>
 <body style="background-color: #002a46!important;">  
     <br><br><br><br>
   <div class="container" style="font-family: 'Montserrat', sans-serif;"> 
     <div class="card mb-4 shadow-sm" style="border-radius: 20px;">
            <div class="card-header" style="background-color: #009bdb;color:#fff;border-radius: 20px;">
                <h4 class="my-0 fw-normal">NUEVO PEDIDO</h4>
            </div>
            <div class="card-body" style="border-radius: 20px;">
                    <form method='post' id='pedido' name="pedido" action='creap_exec.php'> 
                    <?php include_once("msg.php");?>
                    <table class="table">
                        <tr>
                            <td>Cliente:</td>
                            <td><select id="cliente" name="cliente"><?php         
                                $id=0;
                                $db = new db();
                                $qr = new Query();
                                $db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	
                                $result= $db->get_query($qr->getClientes());
                                if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {        ?>                
                                    <option value="<?php echo $row["idclientes"]; ?>"><?php echo $row["nombres"]." ".$row["apellidos"]; ?></option>
                                    <?php }}?>
                              </select></td>
                            <td><a class="edit-link" href="creaclie.php" title="verificar"><button class="btn btn-primary" type="button" id="btn-add" data-toggle="tooltip" data-placement="bottom" title="detalle"><i class="fa fa-plus"></i></button></a></td>
                        </tr>
                        <tr>
                            <td>Serie:</td>
                            <td><input type='text' id='serie' name='serie' class='form-control'  placeholder="serie"></td>
                        </tr>
                        <tr>
                            <td>Guia:</td>
                            <td><input type='text' id='guia' name='guia' class='form-control'  placeholder="Guia"></td>
                        </tr>
                        <tr>
                            <td>Codigo:</td>
                            <td><input type='text' id='codigo' name='codigo' class='form-control'  placeholder="Codigo"></td>
                        </tr>
                        <tr>
                            <td>Origen:</td>
                            <td><select id="origen" name="origen"><?php         
                                $id=0;
                                $db = new db();
                                $qr = new Query();
                                $db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	
                                $result= $db->get_query($qr->getSucursales());

                    if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {        ?>                
                        <option value="<?php echo $row["idsucursal"]; ?>"><?php echo $row["nombre"]; ?></option>
                        <?php }}?>
                        </select></td>
                        </tr>
                        <tr>
                            <td>Destino:</td>
                            <td><select id="destino" name="destino"><?php         
                                $id=0;
                                $db = new db();
                                $qr = new Query();
                                $db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	
                                $result= $db->get_query($qr->getSucursales());

                    if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {        ?>                
                        <option value="<?php echo $row["idsucursal"]; ?>"><?php echo $row["nombre"]; ?></option>
                        <?php }}?>
                        </select></td>
                        </tr>
                        <tr>
                            <td>Descripcion:</td>
                            <td><textarea id="descripcion" name="descripcion" class='form-control'></textarea></td>
                        </tr>       
                        <tr>
                            <td colspan="2">
                            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">
                            <i class="fa fa-save"></i> Guardar 
                            </button>
                            <a class="edit-link" href="dashboard.php" title="verificar">
                            <button class="btn btn-primary" type="button" id="btn-update" data-toggle="tooltip" data-placement="bottom" title="detalle">
                            <i class="fa fa-backward"></i>
                            </button>
                            </a>
                            </td>
                        </tr> 
                    </table>
                </form>
            </div>
        </div>
</div>
</body>
</html>
<?php session_write_close();?>