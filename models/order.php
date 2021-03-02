<?php
    include_once('queries.php');

    class Order extends Queries {
        private $id;
        private $userid;
        private $total;
        // private $date;

        public function __construct() {
            parent::__construct();
        }

        public function getUserOrders(int $idUser) {
            $this->userid = $idUser;
            $query = "SELECT id,total, DATE_FORMAT(fecha,'%d-%m-%Y') as fecha,estado FROM `pedido` WHERE id_usuario = $this->userid";
            $res = $this->selectAll($query);
            return $res;
        }

        public function getOrderDetails(int $id) {
            $this->id = $id;
            $query = "SELECT producto.imagen, producto.nombre, producto.precio, cantidad, (producto.precio * cantidad) as total FROM `pedido_producto` INNER JOIN producto ON pedido_producto.id_producto = producto.id WHERE id_pedido = $this->id";
            $res = $this->selectAll($query);
            return $res;
        }

        // public function getAllOrders(string $code) {
        //     $this->code = $code;
        //     $query = "SELECT id,estado,tipo,valor  FROM cupon WHERE codigo_cupon = $this->code";
        //     $res = $this->select($query);
        //     return $res;
        // }

        public function addOrder(int $idUser, float $total) {
            $this->userid = $idUser;
            $this->total = $total;
            $query = "INSERT INTO pedido(id_usuario, total, fecha) VALUES(?,?,NOW())";
            $arrData = [$this->userid,$this->total];
            $res = $this->insert($query,$arrData);
            return $res;
        }

        public function addOrderDetails(int $idOrder, float $idProduct, int $quantity) {
            $this->id = $idOrder;
            $query = "INSERT INTO pedido_producto(id_pedido, id_producto, cantidad) VALUES(?,?,?)";
            $arrData = [$this->id,$idProduct,$quantity];
            $res = $this->insert($query,$arrData);
            return $res;
        }
    }
?>