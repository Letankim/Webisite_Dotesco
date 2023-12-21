<?php
class Statistical {
    protected $id;
    protected $date;
    protected $soluongdonhang;
    protected $doanhthu;
    protected $soluongsanpham;

    public function __construct($id, $date, $soluongdonhang, $doanhthu, $soluongsanpham)
    {
        $this->id = $id;
        $this->date = $date;
        $this->soluongdonhang = $soluongdonhang;
        $this->doanhthu = $doanhthu;
        $this->soluongsanpham = $soluongsanpham;
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
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of soluongdonhang
     */ 
    public function getSoluongdonhang()
    {
        return $this->soluongdonhang;
    }

    /**
     * Set the value of soluongdonhang
     *
     * @return  self
     */ 
    public function setSoluongdonhang($soluongdonhang)
    {
        $this->soluongdonhang = $soluongdonhang;

        return $this;
    }

    /**
     * Get the value of doanhthu
     */ 
    public function getDoanhthu()
    {
        return $this->doanhthu;
    }

    /**
     * Set the value of doanhthu
     *
     * @return  self
     */ 
    public function setDoanhthu($doanhthu)
    {
        $this->doanhthu = $doanhthu;

        return $this;
    }

    /**
     * Get the value of soluongsanpham
     */ 
    public function getSoluongsanpham()
    {
        return $this->soluongsanpham;
    }

    /**
     * Set the value of soluongsanpham
     *
     * @return  self
     */ 
    public function setSoluongsanpham($soluongsanpham)
    {
        $this->soluongsanpham = $soluongsanpham;

        return $this;
    }
}

?>