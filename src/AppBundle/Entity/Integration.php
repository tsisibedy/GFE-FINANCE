<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Integration
 *
 * @ORM\Table(name="integration")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IntegrationRepository")
 */
class Integration
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
     * @ORM\Column(name="integration_contact", type="string", length=255)
     */
    private $integrationContact;

    /**
     * @var string
     *
     * @ORM\Column(name="integration_corp", type="string", length=255)
     */
    private $integrationCorp;

    /**
     * @var string
     *
     * @ORM\Column(name="integration_post_cadre", type="string", length=255)
     */
    private $integrationPostCadre;

    
     /**
     * @var string
     *
     * @ORM\Column(name="integration_date_integration", type="string", length=255)
     */
    private $integrationDateIntegration;

    /**
     * @var string
     *
     * @ORM\Column(name="integration_lieu_integration", type="string", length=255)
     */
    private $integrationLieuIntegration;

    /**
     * @var string
     *
     * @ORM\Column(name="integration_cas_particulier", type="string", length=255)
     */
    private $integrationCasParticulier;

    
     /**
     * @var string
     *
     * @ORM\Column(name="integration_date_arret_integration", type="string", length=255)
     */
    private $integrationDateArretIntegration;
    
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
     * Set integrationContact
     *
     * @param string $integrationContact
     *
     * @return Integration
     */
    public function setIntegrationContact($integrationContact)
    {
        $this->integrationContact = $integrationContact;

        return $this;
    }

    /**
     * Get integrationContact
     *
     * @return string
     */
    public function getIntegrationContact()
    {
        return $this->integrationContact;
    }

    /**
     * Set integrationCorp
     *
     * @param string $integrationCorp
     *
     * @return Integration
     */
    public function setIntegrationCorp($integrationCorp)
    {
        $this->integrationCorp = $integrationCorp;

        return $this;
    }

    /**
     * Get integrationCorp
     *
     * @return string
     */
    public function getIntegrationCorp()
    {
        return $this->integrationCorp;
    }

    /**
     * Set integrationPostCadre
     *
     * @param string $integrationPostCadre
     *
     * @return Integration
     */
    public function setIntegrationPostCadre($integrationPostCadre)
    {
        $this->integrationPostCadre = $integrationPostCadre;

        return $this;
    }

    /**
     * Get integrationPostCadre
     *
     * @return string
     */
    public function getIntegrationPostCadre()
    {
        return $this->integrationPostCadre;
    }

    /**
     * Set integrationDateIntegration
     *
     * @param \DateTime $integrationDateIntegration
     *
     * @return Integration
     */
    public function setIntegrationDateIntegration($integrationDateIntegration)
    {
        $this->integrationDateIntegration = $integrationDateIntegration;

        return $this;
    }

    /**
     * Get integrationDateIntegration
     *
     * @return \DateTime
     */
    public function getIntegrationDateIntegration()
    {
        return $this->integrationDateIntegration;
    }

    /**
     * Set integrationLieuIntegration
     *
     * @param string $integrationLieuIntegration
     *
     * @return Integration
     */
    public function setIntegrationLieuIntegration($integrationLieuIntegration)
    {
        $this->integrationLieuIntegration = $integrationLieuIntegration;

        return $this;
    }

    /**
     * Get integrationLieuIntegration
     *
     * @return string
     */
    public function getIntegrationLieuIntegration()
    {
        return $this->integrationLieuIntegration;
    }

    /**
     * Set integrationCasParticulier
     *
     * @param string $integrationCasParticulier
     *
     * @return Integration
     */
    public function setIntegrationCasParticulier($integrationCasParticulier)
    {
        $this->integrationCasParticulier = $integrationCasParticulier;

        return $this;
    }

    /**
     * Get integrationCasParticulier
     *
     * @return string
     */
    public function getIntegrationCasParticulier()
    {
        return $this->integrationCasParticulier;
    }

    /**
     * Set integrationDateArretIntegration
     *
     * @param \DateTime $integrationDateArretIntegration
     *
     * @return Integration
     */
    public function setIntegrationDateArretIntegration($integrationDateArretIntegration)
    {
        $this->integrationDateArretIntegration = $integrationDateArretIntegration;

        return $this;
    }

    /**
     * Get integrationDateArretIntegration
     *
     * @return \DateTime
     */
    public function getIntegrationDateArretIntegration()
    {
        return $this->integrationDateArretIntegration;
    }


    /**
     * Set employerId
     *
     * @param string $employerId
     *
     * @return Integration
     */
    public function setEmployerId($employerId)
    {
        $this->employerId = $employerId;

        return $this;
    }

    /**
     * Get employerId
     *
     * @return string
     */
    public function getEmployerId()
    {
        return $this->employerId;
    }
}
