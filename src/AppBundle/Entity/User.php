<?php
// src/AppBundle/Entity/User.php
namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * @var array
     */
    protected $roles;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set employerNom
     *
     * @param string $employerNom
     *
     * @return User
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
     * @return User
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
     * @param string $employerDateNaissance
     *
     * @return User
     */
    public function setEmployerDateNaissance($employerDateNaissance)
    {
        $this->employerDateNaissance = $employerDateNaissance;

        return $this;
    }

    /**
     * Get employerDateNaissance
     *
     * @return string
     */
    public function getEmployerDateNaissance()
    {
        return $this->employerDateNaissance;
    }

    /**
     * Set employerLieuNaissance
     *
     * @param string $employerLieuNaissance
     *
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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

    /**
     * Set employerCin
     *
     * @param string $employerCin
     *
     * @return User
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
}
