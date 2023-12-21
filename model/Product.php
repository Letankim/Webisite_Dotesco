<?php
class Product {
    protected $id;
    protected $modelID;
    protected $name;
    protected $description;
    protected $price;
    protected $priceSale;
    protected $idCategory;
    protected $idOrigin;
    protected $createAt;
    protected $modifiedAt;
    protected $createBy;
    protected $modifiedBy;
    protected $status;
    protected $priority;
    protected $view;
    protected $img;

    public function __construct($id, $modelID, $name, $description, $price, $priceSale, $idCategory, $idOrigin, $createAt, $modifiedAt, $createBy, $modifiedBy, $status, $priority, $view, $img)
    {
        $this->id = $id;
        $this->modelID = $modelID;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->priceSale = $priceSale;
        $this->idCategory = $idCategory;
        $this->idOrigin = $idOrigin;
        $this->createAt = $createAt;
        $this->modifiedAt = $modifiedAt;
        $this->createBy = $createBy;
        $this->modifiedBy = $modifiedBy;
        $this->status = $status;
        $this->priority = $priority;
        $this->view = $view;
        $this->img = $img;
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
     * Get the value of modelID
     */ 
    public function getModelID()
    {
        return $this->modelID;
    }

    /**
     * Set the value of modelID
     *
     * @return  self
     */ 
    public function setModelID($modelID)
    {
        $this->modelID = $modelID;

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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of priceSale
     */ 
    public function getPriceSale()
    {
        return $this->priceSale;
    }

    /**
     * Set the value of priceSale
     *
     * @return  self
     */ 
    public function setPriceSale($priceSale)
    {
        $this->priceSale = $priceSale;

        return $this;
    }

    /**
     * Get the value of idCategory
     */ 
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set the value of idCategory
     *
     * @return  self
     */ 
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get the value of idOrigin
     */ 
    public function getIdOrigin()
    {
        return $this->idOrigin;
    }

    /**
     * Set the value of idOrigin
     *
     * @return  self
     */ 
    public function setIdOrigin($idOrigin)
    {
        $this->idOrigin = $idOrigin;

        return $this;
    }

    /**
     * Get the value of createAt
     */ 
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set the value of createAt
     *
     * @return  self
     */ 
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get the value of modifiedAt
     */ 
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set the value of modifiedAt
     *
     * @return  self
     */ 
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get the value of createBy
     */ 
    public function getCreateBy()
    {
        return $this->createBy;
    }

    /**
     * Set the value of createBy
     *
     * @return  self
     */ 
    public function setCreateBy($createBy)
    {
        $this->createBy = $createBy;

        return $this;
    }

    /**
     * Get the value of modifiedBy
     */ 
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set the value of modifiedBy
     *
     * @return  self
     */ 
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of priority
     */ 
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set the value of priority
     *
     * @return  self
     */ 
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get the value of view
     */ 
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @return  self
     */ 
    public function setView($view)
    {
        $this->view = $view;

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
}

?>