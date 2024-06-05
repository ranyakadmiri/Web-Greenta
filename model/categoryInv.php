<?php
class categoryInv
{
    private ?int $idCateg = null;
    private ?string $nomCateg = null;
    private ?string $descriptionCateg = null;

    public function __construct($idCateg, $nomCateg, $descriptionCateg)
    {
        $this->idCateg = $idCateg;
        $this->nomCateg = $nomCateg;
        $this->descriptionCateg = $descriptionCateg;
    }

    /**
     * Get the value of idCateg
     */
    public function getidCateg()
    {
        return $this->idCateg;
    }

    /**
     * Get the value of nomCateg
     */
    public function getnomCateg()
    {
        return $this->nomCateg;
    }

    /**
     * Set the value of nomCateg
     *
     * @return  self
     */
    public function setnomCateg($nomCateg)
    {
        $this->nomCateg = $nomCateg;

        return $this;
    }

    /**
     * Get the value of descriptionCateg
     */
    public function getdescriptionCateg()
    {
        return $this->descriptionCateg;
    }

    /**
     * Set the value of descriptionCateg
     *
     * @return  self
     */
    public function setdescriptionCateg($descriptionCateg)
    {
        $this->descriptionCateg = $descriptionCateg;

        return $this;
    }

    
}
