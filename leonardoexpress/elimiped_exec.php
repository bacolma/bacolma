<?php 
 session_start(); 
 include_once("query.php");
 include_once("class/conect.php");

 $errmsg_arr = array();	

 $errflag = false;

     $db = new db();
     $db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	

 $id = $_GET['id'];

 if($errflag) {
     $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
     session_write_close();
             header("location: dashboard.php");
            exit();
 }
     
     $qry="update leonardoexpress_app.pedidos  set  view=0 where idpedidos='$id'";
     $result=$db->get_query($qry);
 
 if($result) {
         $ok_arr[] = 'Eliminacion Exitosa';
         $_SESSION['OK_ARR'] = $ok_arr;
         session_write_close();
         header("location: dashboard.php");
         exit();
         
     }else{
                     $errmsg_arr[] = 'Error: '.mysqli_error();
                     $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                     session_write_close();
                     header("location: dashboard.php");
                     exit();
         
     }





?>