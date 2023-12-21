<?php
class District {
    protected $district_id;
    protected $province_id;
    protected $name;

    public function __construct($district_id, $province_id, $name)
    {
        $this->district_id = $district_id;
        $this->province_id = $province_id;
        $this->name = $name;
    }

    /**
     * Get the value of district_id
     */ 
    public function getDistrict_id()
    {
        return $this->district_id;
    }

    /**
     * Set the value of district_id
     *
     * @return  self
     */ 
    public function setDistrict_id($district_id)
    {
        $this->district_id = $district_id;
        return $this;
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