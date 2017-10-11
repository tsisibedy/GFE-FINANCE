<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Information
 *
 * @ORM\Table(name="information")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InformationRepository")
 */
class Information
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
     * @var int
     *
     * @ORM\Column(name="information_im", type="integer")
     */
    private $informationIm;

    /**
     * @var string
     *
     * @ORM\Column(name="information_corp", type="string", length=255)
     */
    private $informationCorp;

    /**
     * @var string
     *
     * @ORM\Column(name="information_grade", type="string", length=255)
     */
    private $informationGrade;

    /**
     * @var int
     *
     * @ORM\Column(name="information_indice", type="integer")
     */
    private $informationIndice;

    /**
     * @var string
     *
     * @ORM\Column(name="information_emploi_occuper", type="string", length=255)
     */
    private $informationEmploiOccuper;

    /**
     * @var string
     *
     * @ORM\Column(name="information_formation", type="string", length=255)
     */
    private $informationFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="information_fonction", type="string", length=255)
     */
    private $informationFonction;

    /**
     * @var string
     *
     * @ORM\Column(name="information_statut", type="string", length=255)
     */
    private $informationStatut;

    /**
     * @var string
     *
     * @ORM\Column(name="information_titre_honorifique", type="string", length=255)
     */
    private $informationTitreHonorifique;

    /**
     * @var string
     *
     * @ORM\Column(name="information_qualite_diplome", type="string", length=255)
     */
    private $informationQualiteDiplome;

    /**
     * @var string
     *
     * @ORM\Column(name="information_classe", type="string", length=255)
     */
    private $informationClasse;

    /**
     * @var string
     *
     * @ORM\Column(name="information_echelon", type="string", length=255)
     */
    private $informationEchelon;

    /**
     * @var string
     *
     * @ORM\Column(name="information_categorie", type="string", length=255)
     */
    private $informationCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="information_date_effet", type="string", length=255)
     */
    private $informationDateEffet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="information_date_entre", type="datetime")
     */
    private $informationDateEntre;


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
     * Set informationIm
     *
     * @param integer $informationIm
     *
     * @return Information
     */
    public function setInformationIm($informationIm)
    {
        $this->informationIm = $informationIm;

        return $this;
    }

    /**
     * Get informationIm
     *
     * @return int
     */
    public function getInformationIm()
    {
        return $this->informationIm;
    }

    /**
     * Set informationCorp
     *
     * @param string $informationCorp
     *
     * @return Information
     */
    public function setInformationCorp($informationCorp)
    {
        $this->informationCorp = $informationCorp;

        return $this;
    }

    /**
     * Get informationCorp
     *
     * @return string
     */
    public function getInformationCorp()
    {
        return $this->informationCorp;
    }

    /**
     * Set informationGrade
     *
     * @param string $informationGrade
     *
     * @return Information
     */
    public function setInformationGrade($informationGrade)
    {
        $this->informationGrade = $informationGrade;

        return $this;
    }

    /**
     * Get informationGrade
     *
     * @return string
     */
    public function getInformationGrade()
    {
        return $this->informationGrade;
    }

    /**
     * Set informationIndice
     *
     * @param integer $informationIndice
     *
     * @return Information
     */
    public function setInformationIndice($informationIndice)
    {
        $this->informationIndice = $informationIndice;

        return $this;
    }

    /**
     * Get informationIndice
     *
     * @return int
     */
    public function getInformationIndice()
    {
        return $this->informationIndice;
    }

    /**
     * Set informationEmploiOccuper
     *
     * @param string $informationEmploiOccuper
     *
     * @return Information
     */
    public function setInformationEmploiOccuper($informationEmploiOccuper)
    {
        $this->informationEmploiOccuper = $informationEmploiOccuper;

        return $this;
    }

    /**
     * Get informationEmploiOccuper
     *
     * @return string
     */
    public function getInformationEmploiOccuper()
    {
        return $this->informationEmploiOccuper;
    }

    /**
     * Set informationFormation
     *
     * @param string $informationFormation
     *
     * @return Information
     */
    public function setInformationFormation($informationFormation)
    {
        $this->informationFormation = $informationFormation;

        return $this;
    }

    /**
     * Get informationFormation
     *
     * @return string
     */
    public function getInformationFormation()
    {
        return $this->informationFormation;
    }

    /**
     * Set informationFonction
     *
     * @param string $informationFonction
     *
     * @return Information
     */
    public function setInformationFonction($informationFonction)
    {
        $this->informationFonction = $informationFonction;

        return $this;
    }

    /**
     * Get informationFonction
     *
     * @return string
     */
    public function getInformationFonction()
    {
        return $this->informationFonction;
    }

    /**
     * Set informationStatut
     *
     * @param string $informationStatut
     *
     * @return Information
     */
    public function setInformationStatut($informationStatut)
    {
        $this->informationStatut = $informationStatut;

        return $this;
    }

    /**
     * Get informationStatut
     *
     * @return string
     */
    public function getInformationStatut()
    {
        return $this->informationStatut;
    }

    /**
     * Set informationTitreHonorifique
     *
     * @param string $informationTitreHonorifique
     *
     * @return Information
     */
    public function setInformationTitreHonorifique($informationTitreHonorifique)
    {
        $this->informationTitreHonorifique = $informationTitreHonorifique;

        return $this;
    }

    /**
     * Get informationTitreHonorifique
     *
     * @return string
     */
    public function getInformationTitreHonorifique()
    {
        return $this->informationTitreHonorifique;
    }

    /**
     * Set informationQualiteDiplome
     *
     * @param string $informationQualiteDiplome
     *
     * @return Information
     */
    public function setInformationQualiteDiplome($informationQualiteDiplome)
    {
        $this->informationQualiteDiplome = $informationQualiteDiplome;

        return $this;
    }

    /**
     * Get informationQualiteDiplome
     *
     * @return string
     */
    public function getInformationQualiteDiplome()
    {
        return $this->informationQualiteDiplome;
    }

    /**
     * Set informationClasse
     *
     * @param string $informationClasse
     *
     * @return Information
     */
    public function setInformationClasse($informationClasse)
    {
        $this->informationClasse = $informationClasse;

        return $this;
    }

    /**
     * Get informationClasse
     *
     * @return string
     */
    public function getInformationClasse()
    {
        return $this->informationClasse;
    }

    /**
     * Set informationEchelon
     *
     * @param string $informationEchelon
     *
     * @return Information
     */
    public function setInformationEchelon($informationEchelon)
    {
        $this->informationEchelon = $informationEchelon;

        return $this;
    }

    /**
     * Get informationEchelon
     *
     * @return string
     */
    public function getInformationEchelon()
    {
        return $this->informationEchelon;
    }

    /**
     * Set informationCategorie
     *
     * @param string $informationCategorie
     *
     * @return Information
     */
    public function setInformationCategorie($informationCategorie)
    {
        $this->informationCategorie = $informationCategorie;

        return $this;
    }

    /**
     * Get informationCategorie
     *
     * @return string
     */
    public function getInformationCategorie()
    {
        return $this->informationCategorie;
    }

    /**
     * Set informationDateEffet
     *
     * @param string $informationDateEffet
     *
     * @return Information
     */
    public function setInformationDateEffet($informationDateEffet)
    {
        $this->informationDateEffet = $informationDateEffet;

        return $this;
    }

    /**
     * Get informationDateEffet
     *
     * @return string
     */
    public function getInformationDateEffet()
    {
        return $this->informationDateEffet;
    }

    /**
     * Set informationDateEntre
     *
     * @param \DateTime $informationDateEntre
     *
     * @return Information
     */
    public function setInformationDateEntre($informationDateEntre)
    {
        $this->informationDateEntre = $informationDateEntre;

        return $this;
    }

    /**
     * Get informationDateEntre
     *
     * @return \DateTime
     */
    public function getInformationDateEntre()
    {
        return $this->informationDateEntre;
    }
}

