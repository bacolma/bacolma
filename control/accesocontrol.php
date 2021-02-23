<?php /* pagina de validacion de acceso*/
   
   $sess_id = rand();
	$nam = "S".rand();
	
	session_id($sess_id);
	session_name($nam);
	

	$sess_id=base64_encode($sess_id);
	$nam=base64_encode($nam);
	
	
	session_start();
	
	require_once('../config/config.php');
    require_once('../class/conect.php');
    require_once('../class/Inputs.php');
        
	$errmsg_arr = array();	
	$errflag = false;

    $db = new db();
    $db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	
	$In = new Input();	
	$login = $_POST['username'];
	$password =$_POST['clave'];
	
	if($login == '') {
		$errmsg_arr[] = 'Usuario no valido';
		$errflag = true;
	}

	if($password == '') {
		$errmsg_arr[] = 'clave no valida';
		$errflag = true;
	}

   	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
        header("location: ../index.html");
        exit();
	}
	
	$password_cod=  hash('sha256',$password);
	echo $password_cod;
	$qry="SELECT u.idusers, username, pasword, datecreation FROM ramcolba.users u where u.username='$login' and u.pasword='$password_cod'";
     echo "<br>".$qry;   
	$result= $db->get_query($qry);
  
	
	if($result) {
		if(mysqli_num_rows($result) == 1) {
	        //session_regenerate_id();
			$member = mysqli_fetch_assoc($result);		
			header("location: ../page/plantillas.php");
			exit();                        
		}else {
                     
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			header("location: ../index.html");
			exit();
		}
	}else {
		die("Query failed");
	}
?>
