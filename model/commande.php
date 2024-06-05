<?php
class commande
{
    private ?int $idco = null;
    private ?int $idclient = null;
    private ?int $total = null;



    public function __construct($id = null, $q, $t)
    {
        $this->idco = $id;
        $this->idclient = $q;
        $this->total = $t;
    }

    /**
     * Get the value of idcommande
     */
    public function getidco()
    {
        return $this->idco;
    }

    /**
     * Get the value of quantite
     */
    public function getidclient()
    {
        return $this->idclient;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */
    public function setidclient($idclient)
    {
        $this->idclient = $idclient;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function gettot()
    {
        return $this->total;
    }

    /**
     * Set the value of total 
     *
     * @return  self
     */
    public function settot($total)
    {
        $this->total = $total;

        return $this;
    }
}
