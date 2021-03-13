<?php  

include_once("query.php");
include_once("class/conect.php");

$serie = $_POST['serie']; 
$guia = $_POST['guia']; 
$codigo = $_POST['codigo']; 

$db = new db();
$qr = new Query();
$db ->dba_conect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	
$result= $db->get_query($qr->getFindEnvios($serie, $guia, $codigo));

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            print_r("<div class='row'>");
            print_r("<div class='col'>Numero de Serie: ".$row['serie']."</div>");
            print_r("<div class='col'>Numero de Guia: ".$row['guia']."</div>");
            print_r("<div class='col'>Codigo: ".$row['codigo']."</div>");
            print_r("</div>");
    }
}else{
           print_r("no se encontro envios con esa informacion.");   
}

?>