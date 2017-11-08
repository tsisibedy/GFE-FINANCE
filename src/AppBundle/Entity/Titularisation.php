<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titularisation
 *
 * @ORM\Table(name="titularisation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TitularisationRepository")
 */
class Titularisation
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
     * @ORM\Column(name="titularisation_post_cadre", type="string", length=255)
     */
    private $titularisationPostCadre;

    /**
     * @var string
     *
     * @ORM\Column(name="titularisation_corp", type="string", length=255)
     */
    private $titularisationCorp;

    /**
     * @var string
     *
     * @ORM\Column(name="titularisation_status", type="string", length=255)
     */
    private $titularisationStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="titularisation_lieu", type="string", length=255)
     */
    private $titularisationLieu;

    /**
     * @var string
     *
     * @ORM\Column(name="titularisation_date_debut", type="string", length=255)
     */
    private $titularisationDateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="titularisation_date_fin", type="string", length=255)
     */
    private $titularisationDateFin;

    /**
     * @var int
     *
     * @ORM\Column(name="employer_id", type="integer")
     */
    private $employerId;


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
     * Set titularisationPostCadre
     *
     * @param string $titularisationPostCadre
     *
     * @return Titularisation
     */
    public function setTitularisationPostCadre($titularisationPostCadre)
    {
        $this->titularisationPostCadre = $titularisationPostCadre;

        return $this;
    }

    /**
     * Get titularisationPostCadre
     *
     * @return string
     */
    public function getTitularisationPostCadre()
    {
        return $this->titularisationPostCadre;
    }

    /**
     * Set titularisationCorp
     *
     * @param string $titularisationCorp
     *
     * @return Titularisation
     */
    public function setTitularisationCorp($titularisationCorp)
    {
        $this->titularisationCorp = $titularisationCorp;

        return $this;
    }

    /**
     * Get titularisationCorp
     *
     * @return string
     */
    public function getTitularisationCorp()
    {
        return $this->titularisationCorp;
    }

    /**
     * Set titularisationStatus
     *
     * @param string $titularisationStatus
     *
     * @return Titularisation
     */
    public function setTitularisationStatus($titularisationStatus)
    {
        $this->titularisationStatus = $titularisationStatus;

        return $this;
    }

    /**
     * Get titularisationStatus
     *
     * @return string
     */
    public function getTitularisationStatus()
    {
        return $this->titularisationStatus;
    }

    /**
     * Set titularisationLieu
     *
     * @param string $titularisationLieu
     *
     * @return Titularisation
     */
    public function setTitularisationLieu($titularisationLieu)
    {
        $this->titularisationLieu = $titularisationLieu;

        return $this;
    }

    /**
     * Get titularisationLieu
     *
     * @return string
     */
    public function getTitularisationLieu()
    {
        return $this->titularisationLieu;
    }

    /**
     * Set titularisationDateDebut
     *
     * @param string $titularisationDateDebut
     *
     * @return Titularisation
     */
    public function setTitularisationDateDebut($titularisationDateDebut)
    {
        $this->titularisationDateDebut = $titularisationDateDebut;

        return $this;
    }

    /**
     * Get titularisationDateDebut
     *
     * @return string
     */
    public function getTitularisationDateDebut()
    {
        return $this->titularisationDateDebut;
    }

    /**
     * Set titularisationDateFin
     *
     * @param string $titularisationDateFin
     *
     * @return Titularisation
     */
    public function setTitularisationDateFin($titularisationDateFin)
    {
        $this->titularisationDateFin = $titularisationDateFin;

        return $this;
    }

    /**
     * Get titularisationDateFin
     *
     * @return string
     */
    public function getTitularisationDateFin()
    {
        return $this->titularisationDateFin;
    }

    /**
     * Set employerId
     *
     * @param integer $employerId
     *
     * @return Titularisation
     */
    public function setEmployerId($employerId)
    {
        $this->employerId = $employerId;

        return $this;
    }

    /**
     * Get employerId
     *
     * @return integer
     */
    public function getEmployerId()
    {
        return $this->employerId;
    }
}
