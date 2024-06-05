<?php
class produit
{
    private ?int $idpr = null;
    private ?int $prix = null;
    private ?int $disponibilite = null;
    private ?string $nomp = null;
    private ?string $img = null;
    private ?string $idca = null;


    public function __construct($id = null, $a, $p, $d, $i, $idc)
    {
        $this->idpr = $id;
        $this->prix = $p;
        $this->disponibilite = $d;
        $this->nomp = $a;
        $this->img = $i;
        $this->idca = $idc;
    }

    /**
     * Get the value of idProduit
     */
    public function getidpr()
    {
        return $this->idpr;
    }

    /**
     * Get the value of prix
     */
    public function getprix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of disponibilite 
     */
    public function getdisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * Set the value of disponibilite 
     *
     * @return  self
     */
    public function setdisponibilite($disponibilite)
    {
        $this->disponibilite  = $disponibilite;

        return $this;
    }

    /**
     * Get the value of nomp

     */
    public function getnomp()
    {
        return $this->nomp;
    }

    /**
     * Set the value of nomp
     *
     * @return  self
     */
    public function setnomp($nomp)
    {
        $this->nomp = $nomp;

        return $this;
    }
    /**
     * Get the value of idpa
     */
    public function getimg()
    {
        return $this->img;
    }

    /**
     * Set the value of nomp
     *
     * @return  self
     */
    public function setimg($img)
    {
        $this->img = $img;

        return $this;
    }
    public function getidca()
    {
        return $this->idca;
    }

    /**
     * Set the value of nomp
     *
     * @return  self
     */
    public function setidca($idca)
    {
        $this->idca = $idca;

        return $this;
    }
}
