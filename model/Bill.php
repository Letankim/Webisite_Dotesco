<?php
class Bill {
    protected $id;
    protected $name;
    protected $address;
    protected $detailAddress;
    protected $phone;
    protected $email;
    protected $idUser;
    protected $createAt;
    protected $modifiedAt;
    protected $modifiedBy;
    protected $status;
    protected $payment;
    protected $transactionCode;
    protected $total;
    protected $note;

    public function __construct($id = null, $name = null, $address = null, $detailAddress = null, $phone = null, $email=null,$idUser = null,
     $createAt = null, $modifiedAt=null, $modifiedBy=null, $status=null, $payment=null, $transactionCode=null,$total=null, $note=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->detailAddress = $detailAddress;
        $this->phone = $phone;
        $this->email = $email;
        $this->idUser = $idUser;
        $this->createAt = $createAt;
        $this->modifiedAt = $modifiedAt;
        $this->modifiedBy = $modifiedBy;
        $this->status = $status;
        $this->payment = $payment;
        $this->transactionCode = $transactionCode;
        $this->total = $total;
        $this->note = $note;
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
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Get the value of detailAddress
     */ 
    public function getDetailAddress()
    {
        return $this->detailAddress;
    }

    /**
     * Set the value of detailAddress
     *
     * @return  self
     */ 
    public function setDetailAddress($detailAddress)
    {
        $this->detailAddress = $detailAddress;
        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
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
     * Get the value of payment
     */ 
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Set the value of payment
     *
     * @return  self
     */ 
    public function setPayment($payment)
    {
        $this->payment = $payment;
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
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Get the value of transactionCode
     */ 
    public function getTransactionCode()
    {
        return $this->transactionCode;
    }

    /**
     * Set the value of transactionCode
     *
     * @return  self
     */ 
    public function setTransactionCode($transactionCode)
    {
        $this->transactionCode = $transactionCode;

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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
?>