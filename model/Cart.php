<?php
class Cart {
    protected $id;
    protected $name;
    protected $model;
    protected $img;
    protected $price;
    protected $numberOfProduct;
    protected $total;

    public function __construct($id,$name, $model, $img, $price, $numberOfProduct,$total)
    {
        $this->id = $id;
        $this->name = $name;
        $this->model = $model;
        $this->numberOfProduct = $numberOfProduct;
        $this->img = $img;
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
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;
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
     * Get the value of numberOfProduct
     */ 
    public function getNumberOfProduct()
    {
        return $this->numberOfProduct;
    }

    /**
     * Set the value of numberOfProduct
     *
     * @return  self
     */ 
    public function setNumberOfProduct($numberOfProduct)
    {
        $this->numberOfProduct = $numberOfProduct;
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
}
?>