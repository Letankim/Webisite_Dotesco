<?php
class Province {
    protected $province_id;
    protected $name;

    public function __construct($province_id, $name)
    {
        $this->province_id = $province_id;
        $this->name = $name;
    }

    /**
     * Get the value of province_id
     */ 
    public function getProvince_id()
    {
        return $this->province_id;
    }

    /**
     * Set the value of province_id
     *
     * @return  self
     */ 
    public function setProvince_id($province_id)
    {
        $this->province_id = $province_id;
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
}
?>