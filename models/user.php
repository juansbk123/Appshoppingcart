<?php
    include_once('queries.php');

    class User extends Queries {
        private $id;
        private $name;
        private $email;
        private $pass;

        public function __construct() {
            parent::__construct();
        }

        public function loginUser(string $email, string $pass) {
            $this->email = $email;
            $this->pass = $pass;
            $query = "SELECT id FROM usuario WHERE email = '$this->email' and contraseña ='$this->pass'";
            $req = $this->select($query);
            return $req;
        }

        public function sessionLogin(int $idUser) {
            $this->id = $idUser;
            $query = "SELECT id, nombre, apellidos, email, contraseña, fecha_nac FROM usuario WHERE id = $this->id";
            $res = $this->select($query);
            return $res;
        }

        public function registerUser(string $name, string $email, string $pass) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $query = "INSERT INTO usuario(nombre, email, contraseña) VALUES(?,?,?)";
            $arrData = [$this->name,$this->email,$this->pass];
            $req = $this->insert($query,$arrData);
            return $req;
        }
    }
?>