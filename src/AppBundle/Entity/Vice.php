<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vice
 *
 * @ORM\Table(name="vice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ViceRepository")
 */
class Vice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Personnage", mappedBy="vice")
     */
    private $personnages;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Attraction", mappedBy="vice")
     */
    private $attractions;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Vice
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPersonnages()
    {
        return $this->personnages;
    }

    /**
     * @param mixed $personnages
     */
    public function setPersonnages($personnages)
    {
        $this->personnages = $personnages;
    }

    /**
     * @return mixed
     */
    public function getAttractions()
    {
        return $this->attractions;
    }

    /**
     * @param mixed $attractions
     */
    public function setAttractions($attractions)
    {
        $this->attractions = $attractions;
    }
}

