<?php
    include_once('queries.php');

    class Coupon extends Queries {
        private $id;
        private $code;
        private $type;
        private $val;

        public function __construct() {
            parent::__construct();
        }

        public function getCoupon(string $code) {
            $this->code = $code;
            $query = "SELECT id,estado,tipo,valor  FROM cupon WHERE codigo_cupon = $this->code";
            $res = $this->select($query);
            return $res;
        }

        public function getAllCoupons() {
            $query = "SELECT id,codigo_cupon,estado,tipo,valor  FROM cupon";
            $res = $this->selectAll($query);
            return $res;
        }

        public function redeemCoupon(string $id) {
            $this->id = $id;
            $query = "UPDATE cupon SET estado = ? WHERE id = $this->id";
            $arrData = ['canjeado'];
            $req = $this->update($query,$arrData);
            return $req;
        }

        public function addCoupon(string $code, string $type, string $val) {
            $this->code = $code;
            $this->type = $type;
            $this->val = $val;
            $query = "INSERT INTO cupon(codigo_cupon, tipo, valor) VALUES(?,?,?)";
            $arrData = [$this->code,$this->type,$this->val];
            $req = $this->insert($query,$arrData);
            return $req;
        }
    }
?>