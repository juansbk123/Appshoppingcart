<?php
include_once("queries.php");

class Product extends Queries{
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

    public function insert_product(string $name_product, string $description_product,float $price_product,string $ruta_imagen,int $stock_product) {
        $this->name_product=$name_product;
        $this->description_product=$description_product;
        $this->price_product=$price_product;
        $this->stock_product=$stock_product;
        $this->ruta_imagen=$ruta_imagen;

        $query="INSERT INTO producto(nombre,descripcion,precio,imagen,stock) VALUES(?,?,?,?,?)";
        $arrData=[$this->name_product,$this->description_product,$this->price_product, $this->ruta_imagen,$this->stock_product];
        $req=$this->insert($query,$arrData);
        return $req;
    }

    public function getProduct(int $idProduct) {
        $this->id = $idProduct;
        $query = "SELECT * FROM producto WHERE id = $this->id";
        $res = $this->select($query);
        return $res;
    }

    public function show_product(string $limit=null, string $pattern = null) {   
        $query = ($pattern != null) ? "SELECT * FROM  producto WHERE nombre like '%$pattern%' ORDER BY id DESC $limit" : "SELECT * FROM  producto ORDER BY id DESC $limit";
        $req=$this->selectAll($query);
        
        return $req;
     }

     public function updateProduct(int $id, string $name_product, string $description_product,float $price_product,string $ruta_imagen,int $stock_product){
        $this->id = $id; 
        $this->name_product=$name_product;
        $this->description_product=$description_product;
        $this->price_product=$price_product;
        $this->stock_product=$stock_product;
        $this->ruta_imagen=$ruta_imagen;
        $query = "UPDATE producto SET nombre = ?, descripcion = ?, precio =?, imagen = ?, stock = ? WHERE id = $this->id";
        $arrData=[$this->name_product,$this->description_product,$this->price_product, $this->ruta_imagen,$this->stock_product];
        $res = $this->update($query,$arrData);
        return $res;
     }

    }
?>