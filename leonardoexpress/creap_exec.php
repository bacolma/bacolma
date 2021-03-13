<?php

include_once("query.php");
include_once("class/conect.php");

	session_start();

	$errmsg_arr = array();	

	$errflag = false;

    $db = new db();
    $qr = new Query();
    $db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	

	  $cliente = $_POST['cliente'];
    $serie = $_POST['serie'];
    $guia = $_POST['guia'];
    $codigo = $_POST['codigo'];
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $descripcion = $_POST['descripcion'];

    if($cliente == '') {
		$errmsg_arr[] = 'cliente invalido';
		$errflag = true;
	}
    if($serie == '') {
		$errmsg_arr[] = 'serie invalido';
		$errflag = true;
	}
    if($guia == '') {
		$errmsg_arr[] = 'guia invalido';
		$errflag = true;
	}
    if($codigo == '') {
		$errmsg_arr[] = 'codigo invalido';
		$errflag = true;
	}
  if($origen == '') {
		$errmsg_arr[] = 'codigo invalido';
		$errflag = true;
	}
    if($destino == '') {
		$errmsg_arr[] = 'destino invalido';
		$errflag = true;
	}
    if($descripcion == '') {
		$errmsg_arr[] = 'descripcion invalido';
		$errflag = true;
	}

	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
                header("location: creap.php");
               exit();
	}
        

    $pedidoExiste= $qr->getValipedido($serie, $guia);
    $rs= $db->get_query($pedidoExiste);  

    if($rs->num_rows > 0) {
      while($row = $rs->fetch_assoc()) { 
        $v = $row["d"];
      }
    } 


    if($v==0){
      $qry= $qr->setPedido($cliente, $serie, $guia, $codigo, $origen, $destino, $descripcion, 1); 
    }else{
      $errmsg_arr[] = 'Pedido ya existe';
    }

    $result= $db->get_query($qry);

    if($result) {
                $ok_arr[] = 'Creacion de Pedido Ok';
                $_SESSION['OK_ARR'] = $ok_arr;
                session_write_close();
                header("location: creap.php");
                exit();

        }else{
                $errmsg_arr[] = 'Error '.mysqli_error();
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("location: creap.php");
                exit();
      }

?>