<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maintient
 *
 * @ORM\Table(name="maintient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MaintientRepository")
 */
class Maintient
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
     * @ORM\Column(name="maintient_corp", type="string", length=255)
     */
    private $maintientCorp;

    /**
     * @var string
     *
     * @ORM\Column(name="maintient_deniere_situation", type="string", length=255)
     */
    private $maintientDeniereSituation;

    /**
     * @var string
     *
     * @ORM\Column(name="maintient_status", type="string", length=255)
     */
    private $maintientStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="maintient_date_debut", type="string", length=255)
     */
    private $maintientDateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="maintient_durer", type="string", length=255)
     */
    private $maintientDurer;

    /**
     * @var string
     *
     * @ORM\Column(name="maintient_date_fin", type="string", length=255)
     */
    private $maintientDateFin;

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
     * Set maintientCorp
     *
     * @param string $maintientCorp
     *
     * @return Maintient
     */
    public function setMaintientCorp($maintientCorp)
    {
        $this->maintientCorp = $maintientCorp;

        return $this;
    }

    /**
     * Get maintientCorp
     *
     * @return string
     */
    public function getMaintientCorp()
    {
        return $this->maintientCorp;
    }

    /**
     * Set maintientDeniereSituation
     *
     * @param string $maintientDeniereSituation
     *
     * @return Maintient
     */
    public function setMaintientDeniereSituation($maintientDeniereSituation)
    {
        $this->maintientDeniereSituation = $maintientDeniereSituation;

        return $this;
    }

    /**
     * Get maintientDeniereSituation
     *
     * @return string
     */
    public function getMaintientDeniereSituation()
    {
        return $this->maintientDeniereSituation;
    }

    /**
     * Set maintientStatus
     *
     * @param string $maintientStatus
     *
     * @return Maintient
     */
    public function setMaintientStatus($maintientStatus)
    {
        $this->maintientStatus = $maintientStatus;

        return $this;
    }

    /**
     * Get maintientStatus
     *
     * @return string
     */
    public function getMaintientStatus()
    {
        return $this->maintientStatus;
    }

    /**
     * Set maintientDateDebut
     *
     * @param string $maintientDateDebut
     *
     * @return Maintient
     */
    public function setMaintientDateDebut($maintientDateDebut)
    {
        $this->maintientDateDebut = $maintientDateDebut;

        return $this;
    }

    /**
     * Get maintientDateDebut
     *
     * @return string
     */
    public function getMaintientDateDebut()
    {
        return $this->maintientDateDebut;
    }

    /**
     * Set maintientDurer
     *
     * @param string $maintientDurer
     *
     * @return Maintient
     */
    public function setMaintientDurer($maintientDurer)
    {
        $this->maintientDurer = $maintientDurer;

        return $this;
    }

    /**
     * Get maintientDurer
     *
     * @return string
     */
    public function getMaintientDurer()
    {
        return $this->maintientDurer;
    }

    /**
     * Set maintientDateFin
     *
     * @param string $maintientDateFin
     *
     * @return Maintient
     */
    public function setMaintientDateFin($maintientDateFin)
    {
        $this->maintientDateFin = $maintientDateFin;

        return $this;
    }

    /**
     * Get maintientDateFin
     *
     * @return string
     */
    public function getMaintientDateFin()
    {
        return $this->maintientDateFin;
    }

    /**
     * Set employerId
     *
     * @param integer $employerId
     *
     * @return Maintient
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