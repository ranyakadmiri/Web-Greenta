<?php
class categorie
{
    private ?int $idca = null;
    private ?string $nomc = null;



    public function __construct($id = null, $n)
    {
        $this->idca = $id;
        $this->nomc = $n;
    }

    /**
     * Get the value of idpannier
     */
    public function getidca()
    {
        return $this->idca;
    }


    public function setidca($id)
    {
        $this->idca = $id;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getnomc()
    {
        return $this->nomc;
    }

    /**
     * Set the value of total 
     *
     * @return  self
     */
    public function setnomc($n)
    {
        $this->nomc = $n;

        return $this;
    }
}
