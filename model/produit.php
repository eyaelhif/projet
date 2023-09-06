<?php 
class produit
{
    private ?int $idp = null;
    private ?string $nom = null;
    private ?string $img = null;
    private ?int $prix = null;
    private ?int $nombre = null;
    private ?int $idc = null;

    public function __construct($idp = null, $nom,$img, $prix,$nombre,$idc)
    {
        $this->idp = $idp;
        $this->nom = $nom;
        $this->img = $img;
        $this->prix= $prix;
        $this->nombre= $nombre;
        $this->idc=$idc;
    }
    /**
     * Get the value of id
     */
    public function getidp()
    {
        return $this->idp;
    }

    public function setidp($idp)
    {
        $this->idp = $idp;

        return $this;
    }


    /**
     * Get the value of productname
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of productname
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
     /**
     * Get the image
     */
    public function getimg()
    {
        return $this->img;
    }

    /**
     * Set the image
     *
     * @return  self
     */
    public function setimg($img)
    {
        $this->img = $img;

        return $this;
    }
   
    /**
     * Get the value of quantity
     */
    public function getprix()
    {
        return $this->prix;
    }

        /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
/**
     * Get the value of price
     */
    public function getnombre()
    {
        return $this->nombre;
    }

        /**
     * Set the value of price
     *
     * @return  self
     */
    public function setnombre($nombre)
    {
        $this->nombre= $nombre;

        return $this;
    }
  
    public function getidc()
    {
        return $this->idc;
    }

        /**
     * Set the value of dot
     *
     * @return  self
     */
    public function setidc($idc)
    {
        $this->idc = $idc;

        return $this;
    }
    
}
?>