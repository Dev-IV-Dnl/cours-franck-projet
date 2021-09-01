<?php

namespace Model;

class produit
{
    protected $id_produit;
    protected $nom_produit;
    protected $image_produit;
    protected $description_produit;
    protected $prix_produit;
    protected $date_publication;
    protected $id_categorie;

    /**
     * Get the value of idProduit
     */ 
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * Set the value of idProduit
     *
     * @return  self
     */ 
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get the value of nomProduit
     */ 
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * Set the value of nomProduit
     *
     * @return  self
     */ 
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    /**
     * Get the value of imageProduit
     */ 
    public function getImageProduit()
    {
        return $this->imageProduit;
    }

    /**
     * Set the value of imageProduit
     *
     * @return  self
     */ 
    public function setImageProduit($imageProduit)
    {
        $this->imageProduit = $imageProduit;

        return $this;
    }

    /**
     * Get the value of descriptionProduit
     */ 
    public function getDescriptionProduit()
    {
        return $this->descriptionProduit;
    }

    /**
     * Set the value of descriptionProduit
     *
     * @return  self
     */ 
    public function setDescriptionProduit($descriptionProduit)
    {
        $this->descriptionProduit = $descriptionProduit;

        return $this;
    }

    /**
     * Get the value of prixProduit
     */ 
    public function getPrixProduit()
    {
        return $this->prixProduit;
    }

    /**
     * Set the value of prixProduit
     *
     * @return  self
     */ 
    public function setPrixProduit($prixProduit)
    {
        $this->prixProduit = $prixProduit;

        return $this;
    }

    /**
     * Get the value of datePublication
     */ 
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set the value of datePublication
     *
     * @return  self
     */ 
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get the value of idCategorie
     */ 
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set the value of idCategorie
     *
     * @return  self
     */ 
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }
}
