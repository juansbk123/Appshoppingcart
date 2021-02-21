<?php
class Conexion {
    private $driver;
    private $host, $user, $pass, $database, $charset;
   
    public function __construct() {
        $db_cfg = require_once 'config.php';
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
    }
     
    public function conect(){        
        $connectionString = $this->driver.":host=".$this->host.";dbname=".$this->database.";charset=".$this->charset; 
        try {
            $pdo = new PDO($connectionString,$this->user,$this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERROR: ".$e->getMessage();
        }
        return $pdo;
    }
}
?>