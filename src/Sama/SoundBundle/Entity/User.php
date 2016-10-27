<?php

namespace Sama\SoundBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User", indexes={@ORM\Index(name="fk_User_typeUser1_idx", columns={"typeUser_idtypeUser"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="idUser", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="mdpasse", type="string", length=45, nullable=false)
     */
    private $mdpasse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscription", type="datetime", nullable=false)
     */
    private $inscription;

    /**
     * @var string
     *
     * @ORM\Column(name="produit", type="string", length=8, nullable=true)
     */
    private $produit;

    /**
     * @var boolean
     *
     * @ORM\Column(name="private", type="boolean", nullable=false)
     */
    private $private;

    /**
     * @var \Typeuser
     *
     * @ORM\ManyToOne(targetEntity="Typeuser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typeUser_idtypeUser", referencedColumnName="idtypeUser")
     * })
     */
    private $typeusertypeuser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Musique", mappedBy="useruser")
     */
    private $musiquemusique;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->musiquemusique = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get iduser
     *
     * @return string 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set mdpasse
     *
     * @param string $mdpasse
     * @return User
     */
    public function setMdpasse($mdpasse)
    {
        $this->mdpasse = $mdpasse;

        return $this;
    }

    /**
     * Get mdpasse
     *
     * @return string 
     */
    public function getMdpasse()
    {
        return $this->mdpasse;
    }

    /**
     * Set inscription
     *
     * @param \DateTime $inscription
     * @return User
     */
    public function setInscription($inscription)
    {
        $this->inscription = $inscription;

        return $this;
    }

    /**
     * Get inscription
     *
     * @return \DateTime 
     */
    public function getInscription()
    {
        return $this->inscription;
    }

    /**
     * Set produit
     *
     * @param string $produit
     * @return User
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return string 
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set private
     *
     * @param boolean $private
     * @return User
     */
    public function setPrivate($private)
    {
        $this->private = $private;

        return $this;
    }

    /**
     * Get private
     *
     * @return boolean 
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * Set typeusertypeuser
     *
     * @param \Sama\SoundBundle\Entity\Typeuser $typeusertypeuser
     * @return User
     */
    public function setTypeusertypeuser(\Sama\SoundBundle\Entity\Typeuser $typeusertypeuser = null)
    {
        $this->typeusertypeuser = $typeusertypeuser;

        return $this;
    }

    /**
     * Get typeusertypeuser
     *
     * @return \Sama\SoundBundle\Entity\Typeuser 
     */
    public function getTypeusertypeuser()
    {
        return $this->typeusertypeuser;
    }

    /**
     * Add musiquemusique
     *
     * @param \Sama\SoundBundle\Entity\Musique $musiquemusique
     * @return User
     */
    public function addMusiquemusique(\Sama\SoundBundle\Entity\Musique $musiquemusique)
    {
        $this->musiquemusique[] = $musiquemusique;

        return $this;
    }

    /**
     * Remove musiquemusique
     *
     * @param \Sama\SoundBundle\Entity\Musique $musiquemusique
     */
    public function removeMusiquemusique(\Sama\SoundBundle\Entity\Musique $musiquemusique)
    {
        $this->musiquemusique->removeElement($musiquemusique);
    }

    /**
     * Get musiquemusique
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMusiquemusique()
    {
        return $this->musiquemusique;
    }
}
