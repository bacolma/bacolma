<?php /*clase para conexion de la base de datos*/
  include_once("../config/config.php");


class db
{

    public function dba_conect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE){
        $this->conexion = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }
        if ($result = mysqli_query($this->conexion, "SELECT DATABASE()")) {
            $row = mysqli_fetch_row($result);
            //echo "Default database is " . $row[0];
            mysqli_free_result($result);
          }
        
         mysqli_select_db($this->conexion, $DB_DATABASE);
        return true;
    }
    
    public function dba_close(){
        if($this->conectar->conexion){
            mysqli_close($this->conexion);
    }
    }

    public function get_query($sql){
        if($sql){
            $result=mysqli_query($this->conexion, $sql);
            return $result;
        }  return false;
 }
} 
?>

