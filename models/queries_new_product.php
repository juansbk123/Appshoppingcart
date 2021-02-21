<?php
include_once("queries.php");

class Queries_new_product extends Queries{
    private $id;
    private $name_product;
    private $description_product;
    private $price_product;
    private $ruta_imagen;
    private $stock_product;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_product(string $name_product, string $description_product,float $price_product,string $ruta_imagen,string $stock_product)
    {
        $this->name_product=$name_product;
        $this->description_product=$description_product;
        $this->price_product=$price_product;
        $this->stock_product=$stock_product;
        $this->ruta_imagen=$ruta_imagen;

        $query="INSERT INTO producto(nombre,descripcion,precio,ruta_imagen,stock) VALUES(?,?,?,?,?)";
        $arrData=[$this->name_product,$this->description_product,$this->price_product, $this->ruta_imagen,$this->stock_product];
        $req=$this->insert($query,$arrData);
        return $req;
    }

        public function show_product()
    {
            $query="SELECT * FROM  producto";
            $req=$this->selectAll($query);
        
        return $req;
     }
    }
?>