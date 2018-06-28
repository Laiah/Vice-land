<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personnage
 *
 * @ORM\Table(name="personnage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonnageRepository")
 */
class Personnage
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_url", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Nationality")
     * @ORM\JoinColumn(nullable=true)
     */
    private $nationality;

    /**
     * @var Vice
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vice", inversedBy="personnages")
     * @ORM\JoinColumn(nullable=true)
     */
    private $vice;

    /**
     * @var bool
     * @ORM\Column(name="gay", type="boolean", nullable=true)
     */
    private $gay;

    /**
     * @var string
     * @ORM\Column(name="gender", type="string", length=10)
     */
    private $gender;

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
     * Set description
     *
     * @param string $description
     *
     * @return Personnage
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
     * Set nationality
     *
     * @param string $nationality
     *
     * @return Personnage
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
     * @return Personnage
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

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return bool
     */
    public function isGay()
    {
        return $this->gay;
    }

    /**
     * @param bool $gay
     */
    public function setGay($gay)
    {
        $this->gay = $gay;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
}

