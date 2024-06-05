<?php
class pannier
{
    private ?int $idpa = null;
    private ?int $quantite = null;
    private ?int $total = null;


    public function __construct($id = null, $q, $t)
    {
        $this->idpa = $id;
        $this->quantite = $q;
        $this->total = $t;
    }

    /**
     * Get the value of idpannier
     */
    public function getid_pa()
    {
        return $this->idpa;
    }

    /**
     * Get the value of quantite
     */
    public function getquantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */
    public function setprix($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function gettotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total 
     *
     * @return  self
     */
    public function settotal($total)
    {
        $this->total  = $total;

        return $this;
    }
}
