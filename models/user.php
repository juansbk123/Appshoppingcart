<?php
    include_once('queries.php');

    class User extends Queries {
        private $id;
        private $name;
        private $lastname;
        private $email;
        private $pass;
        private $role;
        private $birthdate;

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
            $query = "SELECT id, nombre, apellidos, email, contraseña, fecha_nac, rol FROM usuario WHERE id = $this->id";
            $res = $this->select($query);
            return $res;
        }

        public function registerUser(string $name, string $email, string $pass) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $query = "INSERT INTO usuario(nombre, email, contraseña, rol) VALUES(?,?,?,'Cliente')";
            $arrData = [$this->name,$this->email,$this->pass];
            $req = $this->insert($query,$arrData);
            return $req;
        }

        public function createUser(string $name, string $lastname, string $birthdate, string $email, string $pass, string $role) {
            $this->name = $name;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->pass = $pass;
            $this->birthdate = $birthdate;
            $this->role = $role;
            $query = "INSERT INTO usuario(nombre, apellidos, email, contraseña, fecha_nac, rol) VALUES(?,?,?,?,?,?)";
            $arrData = [$this->name,$this->lastname, $this->email,$this->pass, $this->birthdate, $this->role];
            $req = $this->insert($query,$arrData);
            return $req;
        }

        public function updateUser(int $idUser, string $name, string $lastname, string $birthdate, string $email) {
            $this->id = $idUser;
            $this->name = $name;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->birthdate = $birthdate;
            $query = "UPDATE usuario SET nombre = ?, apellidos = ?, email =?, fecha_nac = ? WHERE id = $this->id";
            $arrData = [$this->name,$this->lastname,$this->email,$this->birthdate];
            $req = $this->update($query,$arrData);
            return $req;
        }

        public function updatePass(int $idUser, string $pass) {
            $this->id = $idUser;
            $this->pass = $pass;
            $query = "UPDATE usuario SET contraseña = ? WHERE id = $this->id";
            $arrData = [$this->pass];
            $req = $this->update($query,$arrData);
            return $req;
        }

        public function getAllUsers() {
            $query = "SELECT * FROM usuario";
            $res = $this->selectAll($query);
            return $res;
        }
    }
?>