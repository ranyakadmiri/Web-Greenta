<?php
class investissement
{
    private ?int $idinv = null;
    private ?string $lastName = null;
    private ?string $firstName = null;
    private ?string $address = null;
    private ?DateTime $dob = null;
    private ?int $category = null;

    public function __construct($id, $n, $p, $a, $d, $c)
    {
        $this->idinv = $id;
        $this->lastName = $p;
        $this->firstName = $n;
        $this->address = $a;
        $this->dob = $d;
        $this->category = $c;
    }

    /**
     * Get the value of idinv
     */
    public function getIdinv()
    {
        return $this->getIdinv;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

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
     * Get the value of dob
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getcategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setcategory($category)
    {
        $this->category = $category;

        return $this;
    }
}
