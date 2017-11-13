<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Retraite
 *
 * @ORM\Table(name="retraite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RetraiteRepository")
 */
class Retraite
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
     * @ORM\Column(name="retraite_chapitre", type="string", length=255)
     */
    private $retraiteChapitre;

    /**
     * @var string
     *
     * @ORM\Column(name="retraite_derniere_situation", type="string", length=255)
     */
    private $retraiteDerniereSituation;

    /**
     * @var string
     *
     * @ORM\Column(name="retraite_cas_particulier", type="string", length=255)
     */
    private $retraiteCasParticulier;

    /**
     * @var string
     *
     * @ORM\Column(name="retraite_date_debut", type="string", length=255)
     */
    private $retraiteDateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="retraite_status", type="string", length=255)
     */
    private $retraiteStatus;

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
     * Set retraiteChapitre
     *
     * @param string $retraiteChapitre
     *
     * @return Retraite
     */
    public function setRetraiteChapitre($retraiteChapitre)
    {
        $this->retraiteChapitre = $retraiteChapitre;

        return $this;
    }

    /**
     * Get retraiteChapitre
     *
     * @return string
     */
    public function getRetraiteChapitre()
    {
        return $this->retraiteChapitre;
    }

    /**
     * Set retraiteDerniereSituation
     *
     * @param string $retraiteDerniereSituation
     *
     * @return Retraite
     */
    public function setRetraiteDerniereSituation($retraiteDerniereSituation)
    {
        $this->retraiteDerniereSituation = $retraiteDerniereSituation;

        return $this;
    }

    /**
     * Get retraiteDerniereSituation
     *
     * @return string
     */
    public function getRetraiteDerniereSituation()
    {
        return $this->retraiteDerniereSituation;
    }

    /**
     * Set retraiteCasParticulier
     *
     * @param string $retraiteCasParticulier
     *
     * @return Retraite
     */
    public function setRetraiteCasParticulier($retraiteCasParticulier)
    {
        $this->retraiteCasParticulier = $retraiteCasParticulier;

        return $this;
    }

    /**
     * Get retraiteCasParticulier
     *
     * @return string
     */
    public function getRetraiteCasParticulier()
    {
        return $this->retraiteCasParticulier;
    }

    /**
     * Set employerId
     *
     * @param integer $employerId
     *
     * @return Retraite
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

    /**
     * Set retraiteDateDebut
     *
     * @param string $retraiteDateDebut
     *
     * @return Retraite
     */
    public function setRetraiteDateDebut($retraiteDateDebut)
    {
        $this->retraiteDateDebut = $retraiteDateDebut;

        return $this;
    }

    /**
     * Get retraiteDateDebut
     *
     * @return string
     */
    public function getRetraiteDateDebut()
    {
        return $this->retraiteDateDebut;
    }

    /**
     * Set retraiteStatus
     *
     * @param string $retraiteStatus
     *
     * @return Retraite
     */
    public function setRetraiteStatus($retraiteStatus)
    {
        $this->retraiteStatus = $retraiteStatus;

        return $this;
    }

    /**
     * Get retraiteStatus
     *
     * @return string
     */
    public function getRetraiteStatus()
    {
        return $this->retraiteStatus;
    }
}
