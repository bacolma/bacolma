<?php /*clase para conexion dela base de datos*/
  
class db
{
    protected $conexion;
    protected $dab;
    protected $conectar;
    
    public function dba_conect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE){
        $this->conexion = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
        if ($this->conexion ==0) DIE("Fallo conexion");
        $this->dab = mysql_select_db($DB_DATABASE);
        if ($this->dab==0)DIE("Fallo base de datos");
        return true;
    }
    
    public function dba_close(){
        if($this->conectar->conexion){
            mysql_close($this->conexion);
    }
   
    }
   
 }
  
?>

