<?php
    include_once('conection.php');

    class Queries extends Conexion {
        private $conexion;
        private $strquery;
        private $arrValues;

        function __construct() {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        public function insert(string $query, array $arrValues) {
            $this->strquery = $query;
            $this->arrValues = $arrValues;
            $insert = $this->conexion->prepare($this->strquery);
            $res = $insert->execute($this->arrValues);
            $lastInsert = ($res) ? $this->conexion->lastInsertId() : 0;
            return $lastInsert;
        }

        public function select(string $query) {
            $this->strquery = $query;
            $res = $this->conexion->prepare($this->strquery);
            $res->execute();
            $data = $res->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

       public function selectAll(string $query) {
           $this->strquery = $query;
           $res = $this->conexion->prepare($this->strquery);
           $res->execute();
           return $res->fetchAll(PDO::FETCH_ASSOC);
       }

       public function update(string $query, array $arrValues) {
           $this->strquery = $query;
           $this->arrValues = $arrValues;
           $update = $this->conexion->prepare($this->strquery);
           $res = $update->execute($this->arrValues);
           return $res; 
       }

       public function delete(string $query) {
           $this->strquery = $query;
           $res = $this->conexion->prepare($this->strquery);
           $res->execute();
           return $res;
       }
    }
?>