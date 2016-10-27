<?php

namespace Sama\SoundBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Musique
 *
 * @ORM\Table(name="Musique")
 * @ORM\Entity
 */
class Musique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMusique", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmusique;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=45, nullable=true)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="album", type="string", length=45, nullable=true)
     */
    private $album;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=45, nullable=true)
     */
    private $photo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sortie", type="date", nullable=true)
     */
    private $sortie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="musiquemusique")
     * @ORM\JoinTable(name="deposer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Musique_idMusique", referencedColumnName="idMusique")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="User_idUser", referencedColumnName="idUser")
     *   }
     * )
     */
    private $useruser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->useruser = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
