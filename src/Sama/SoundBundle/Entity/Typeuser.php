<?php

namespace Sama\SoundBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeuser
 *
 * @ORM\Table(name="typeUser")
 * @ORM\Entity
 */
class Typeuser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtypeUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeuser;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;


}
