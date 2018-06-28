<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attraction
 *
 * @ORM\Table(name="attraction")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AttractionRepository")
 */
class Attraction
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="size", type="float", nullable=true)
     */
    private $size;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var Vice
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vice", inversedBy="attractions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $vice;

    /**
     * @var Nationality
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Nationality", inversedBy="attractions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $nationality;


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
     * @return Attraction
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
     * Set description
     *
     * @param string $description
     *
     * @return Attraction
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set size
     *
     * @param float $size
     *
     * @return Attraction
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return float
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Attraction
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return Attraction
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set vice
     *
     * @param string $vice
     *
     * @return Attraction
     */
    public function setVice($vice)
    {
        $this->vice = $vice;

        return $this;
    }

    /**
     * Get vice
     *
     * @return string
     */
    public function getVice()
    {
        return $this->vice;
    }
}

