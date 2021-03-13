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
  <title>NUEVO CLIENTE</title>
 </head>
 <body style="background-color: #002a46!important;"><?php 	$errmsg_arr = array();
                $errflag = false; 
?>  
     <br><br><br><br>
   <div class="container" style="font-family: 'Montserrat', sans-serif;"> 
     <div class="card mb-4 shadow-sm" style="border-radius: 20px;">
     <div class="card-header" style="background-color:  #009bdb; color:#fff;border-radius: 20px;">
                <h4 class="my-0 fw-normal">NUEVO CLIENTE</h4>
            </div>
            <div class="card-body"  >
                <form method='post' id="addclie" name="addclie" action="creaclie_exec.php"> 
                <?php include_once("msg.php");?>
                     <table class="table">
                        <tr>
                            <td>Tipo Documento:</td>
                            <td><select id="tipod" name="tipod" required>
                                    <option value="DNI">DNI</option>
                                    <option value="CE">Carnet de extranjeria</option>
                                    <option value="PAS">Pasaporte</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>N° Documento:</td>
                            <td><input type='text' id='doc' name='doc' class='form-control'  placeholder="N° de documento" required></td>
                        </tr>
                        <tr>
                            <td>Nombres:</td>
                            <td><input type='text' id='nombres' name='nombres' class='form-control'  placeholder="Nombres" required></td>
                        </tr>
                        <tr>
                            <td>Apellidos:</td>
                            <td><input type='text' id='apellidos' name='apellidos' class='form-control'  placeholder="Apellidos" required></td>
                        </tr> 
                        <tr>
                            <td>Telefono:</td>
                            <td><input type='text' id='telefono' name='telefono' class='form-control'  placeholder="Telefono" required></td>
                        </tr> 
                        <tr>
                            <td>Email:</td>
                            <td><input type='email' id='email' name='email' class='form-control'  placeholder="Email" required></td>
                        </tr>     
                        <tr>
                            <td colspan="2">
                            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">
                            <i class="fa fa-save"></i> Guardar 
                            </button>
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