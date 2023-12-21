<?php
class BillDetail {
    protected $id;
    protected $idProduct;
    protected $model;
    protected $name;
    protected $idBill;
    protected $quantity;
    protected $price;
    protected $total;

    public function __construct($id, $idProduct, $model, $name, $idBill, $quantity, $price, $total)
    {
        $this->id = $id;
        $this->idProduct = $idProduct;
        $this->model = $model;
        $this->name = $name;
        $this->idBill = $idBill;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->total = $total;
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
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of idBill
     */ 
    public function getIdBill()
    {
        return $this->idBill;
    }

    /**
     * Set the value of idBill
     *
     * @return  self
     */ 
    public function setIdBill($idBill)
    {
        $this->idBill = $idBill;
        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }
}
?>