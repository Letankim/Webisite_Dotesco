<?php
class Category {
    protected $id;
    protected $name;
    protected $createAt;
    protected $modifiedAt;
    protected $createBy;
    protected $modifiedBy;
    protected $status;

    public function __construct($id, $name, $createAt, $modifiedAt, $createBy, $modifiedBy, $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->createAt = $createAt;
        $this->modifiedAt = $modifiedAt;
        $this->createBy = $createBy;
        $this->modifiedBy = $modifiedBy;
        $this->status = $status;
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
}
?>