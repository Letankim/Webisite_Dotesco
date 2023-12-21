<?php
class Image {
    protected $id;
    protected $idProduct;
    protected $src;

    public function __construct($id, $idProduct, $src)
    {
        $this->id = $id;
        $this->idProduct = $idProduct;
        $this->src = $src;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idProduct
     */ 
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * Set the value of idProduct
     *
     * @return  self
     */ 
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    /**
     * Get the value of src
     */ 
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Set the value of src
     *
     * @return  self
     */ 
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }
}
?>