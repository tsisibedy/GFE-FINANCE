<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employer
 *
 * @ORM\Table(name="employer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployerRepository")
 */
class Employer
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
     * @ORM\Column(name="employer_nom", type="string", length=255)
     */
    private $employerNom;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_prenom", type="string", length=255)
     */
    private $employerPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_date_naissance", type="string", length=255)
     */
    private $employerDateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_lieu_naissance", type="string", length=255)
     */
    private $employerLieuNaissance;


    /**
     * @var string
     *
     * @ORM\Column(name="employer_sexe", type="string", length=255)
     */
    private $employerSexe;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_situation", type="string", length=255)
     */
    private $employerSituation;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_addresse", type="string", length=255)
     */
    private $employerAddresse;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_cin", type="string", length=255)
     */
    private $employerCin;


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
     * Set employerNom
     *
     * @param string $employerNom
     *
     * @return Employer
     */
    public function setEmployerNom($employerNom)
    {
        $this->employerNom = $employerNom;

        return $this;
    }

    /**
     * Get employerNom
     *
     * @return string
     */
    public function getEmployerNom()
    {
        return $this->employerNom;
    }

    /**
     * Set employerPrenom
     *
     * @param string $employerPrenom
     *
     * @return Employer
     */
    public function setEmployerPrenom($employerPrenom)
    {
        $this->employerPrenom = $employerPrenom;

        return $this;
    }

    /**
     * Get employerPrenom
     *
     * @return string
     */
    public function getEmployerPrenom()
    {
        return $this->employerPrenom;
    }

    /**
     * Set employerDateNaissance
     *
     * @param \DateTime $employerDateNaissance
     *
     * @return Employer
     */
    public function setEmployerDateNaissance($employerDateNaissance)
    {
        $this->employerDateNaissance = $employerDateNaissance;

        return $this;
    }

    /**
     * Get employerDateNaissance
     *
     * @return \DateTime
     */
    public function getEmployerDateNaissance()
    {
        return $this->employerDateNaissance;
    }

    /**
     * Set employerCin
     *
     * @param string $employerCin
     *
     * @return Employer
     */
    public function setEmployerCin($employerCin)
    {
        $this->employerCin = $employerCin;

        return $this;
    }

    /**
     * Get employerCin
     *
     * @return string
     */
    public function getEmployerCin()
    {
        return $this->employerCin;
    }

    /**
     * Set employerLieuNaissance
     *
     * @param string $employerLieuNaissance
     *
     * @return Employer
     */
    public function setEmployerLieuNaissance($employerLieuNaissance)
    {
        $this->employerLieuNaissance = $employerLieuNaissance;

        return $this;
    }

    /**
     * Get employerLieuNaissance
     *
     * @return string
     */
    public function getEmployerLieuNaissance()
    {
        return $this->employerLieuNaissance;
    }

    /**
     * Set employerSexe
     *
     * @param string $employerSexe
     *
     * @return Employer
     */
    public function setEmployerSexe($employerSexe)
    {
        $this->employerSexe = $employerSexe;

        return $this;
    }

    /**
     * Get employerSexe
     *
     * @return string
     */
    public function getEmployerSexe()
    {
        return $this->employerSexe;
    }

    /**
     * Set employerSituation
     *
     * @param string $employerSituation
     *
     * @return Employer
     */
    public function setEmployerSituation($employerSituation)
    {
        $this->employerSituation = $employerSituation;

        return $this;
    }

    /**
     * Get employerSituation
     *
     * @return string
     */
    public function getEmployerSituation()
    {
        return $this->employerSituation;
    }

    /**
     * Set employerAddresse
     *
     * @param string $employerAddresse
     *
     * @return Employer
     */
    public function setEmployerAddresse($employerAddresse)
    {
        $this->employerAddresse = $employerAddresse;

        return $this;
    }

    /**
     * Get employerAddresse
     *
     * @return string
     */
    public function getEmployerAddresse()
    {
        return $this->employerAddresse;
    }
}
