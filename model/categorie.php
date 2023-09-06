<?php 
class categorie
{
    private ?int $idc = null;
    private ?string $genre = null;
    private ?string $type = null;

    public function __construct($idc = null, $genre,$type)
    {
        $this->idc = $idc;
        $this->genre = $genre;
        $this->type = $type;
    }
    /**
     * Get the value of id
     */
    public function getidc()
    {
        return $this->idc;
    }

    public function setidc($idc)
    {
        $this->idc = $idc;

        return $this;
    }


    /**
     * Get the value of productname
     */
    public function getgenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of productname
     *
     * @return  self
     */
    public function setgenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }
     /**
     * Get the image
     */
    public function gettype()
    {
        return $this->type;
    }

    /**
     * Set the image
     *
     * @return  self
     */
    public function settype($type)
    {
        $this->type = $type;

        return $this;
    } 
}
?>