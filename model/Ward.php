<?php
class Ward {
    protected $wards_id;
    protected $district_id;
    protected $name;

    public function __construct($wards_id, $district_id, $name)
    {
        $this->wards_id = $wards_id;
        $this->district_id = $district_id;
        $this->name = $name;
    }

    /**
     * Get the value of wards_id
     */ 
    public function getWards_id()
    {
        return $this->wards_id;
    }

    /**
     * Set the value of wards_id
     *
     * @return  self
     */ 
    public function setWards_id($wards_id)
    {
        $this->wards_id = $wards_id;
        return $this;
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