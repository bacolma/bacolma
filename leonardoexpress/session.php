<?php

session_start();

if(!isset($_SESSION['usuario'])){
    if(isset($_POST['usuario'])){
        $db = new mysqli("localhost", "root", "", "leonardoexpress_app");
        $stmt = $db->prepare("SELECT usuario FROM users WHERE usuario = ? AND clave = ?");
        $stmt->bind_param('ss', $_POST['usuario'], $_POST['clave']);
        $stmt->execute();
        $stmt->store_result();
        echo $stmt->num_rows();
        if($stmt->num_rows() == 1){
            $stmt->bind_result($username);
            $stmt->fetch();
            $_SESSION['usuario'] = $username;
            header("Location: plantillas.php");
        }
    }
}
?>