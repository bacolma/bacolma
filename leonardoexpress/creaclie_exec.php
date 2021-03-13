<?php

include_once("query.php");
include_once("class/conect.php");

	session_start();

	$errmsg_arr = array();	

	$errflag = false;

    $db = new db();
    $qr = new Query();
    $db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	

	$tipod = $_POST['tipod'];
    $doc = $_POST['doc'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    if($tipod == '') {
		$errmsg_arr[] = 'Tipo de documento invalido';
		$errflag = true;
	}
    if($doc == '') {
		$errmsg_arr[] = 'Documento invalido';
		$errflag = true;
	}
    if($nombres == '') {
		$errmsg_arr[] = 'Nombre invalido';
		$errflag = true;
	}
    if($apellidos == '') {
		$errmsg_arr[] = 'Apellidos invalido';
		$errflag = true;
	}
    if($telefono == '') {
		$errmsg_arr[] = 'Telefono invalido';
		$errflag = true;
	}
    if($email == '') {
		$errmsg_arr[] = 'email invalido';
		$errflag = true;
	}

    echo $tipod."<br>";
    echo $doc."<br>";
    echo $nombres."<br>";
    echo $apellidos."<br>";
    echo $telefono."<br>";
    echo $email."<br>";

	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
                header("location: creaclie.php");
               exit();
	}
        

    $clienteExiste= $qr->getValicli($doc);
    $rs= $db->get_query($clienteExiste);  
    if($rs->num_rows > 0) {
      while($row = $rs->fetch_assoc()) { 
        $v = $row["d"];
      }
    } 

    if($v==0){
      $qry= $qr->setCliente($tipod, $doc, $nombres, $apellidos, $telefono, $email);  
    }else{
      $errmsg_arr[] = 'Cliente ya existe';
    }
      
    $result= $db->get_query($qry);

    if($result) {
                $ok_arr[] = 'Creacion de Cliente Ok';
                $_SESSION['OK_ARR'] = $ok_arr;
                session_write_close();
                header("location: creap.php");
                exit();

        }else{
                $errmsg_arr[] = 'Error'.mysqli_error();
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("location: creap.php");
                exit();
      }

?>