<?php
namespace Model;

class Produit {
    protected $id;
    protected $designation;
    protected $prixHt;
    protected $tva;

    public function donnePrixTtc(){
        return $this->prixHt+($this->prixHt*$this->tva/100);
    }

    /**
     * Get the value of designation
     */ 
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set the value of designation
     *
     * @return  self
     */ 
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get the value of prixHt
     */ 
    public function getPrixHt()
    {
        return $this->prixHt;
    }

    /**
     * Set the value of prixHt
     *
     * @return  self
     */ 
    public function setPrixHt($prixHt)
    {
        $this->prixHt = $prixHt;

        return $this;
    }

    /**
     * Get the value of tva
     */ 
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set the value of tva
     *
     * @return  self
     */ 
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
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
}