<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PublicationRepository")
 */
class Publication
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
     * @ORM\Column(name="publication_contenu", type="text")
     */
    private $publicationContenu;

    /**
     * @var string
     *
     * @ORM\Column(name="publication_date", type="string", length=255)
     */
    private $publicationDate;


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
     * Set publicationContenu
     *
     * @param string $publicationContenu
     *
     * @return Publication
     */
    public function setPublicationContenu($publicationContenu)
    {
        $this->publicationContenu = $publicationContenu;

        return $this;
    }

    /**
     * Get publicationContenu
     *
     * @return string
     */
    public function getPublicationContenu()
    {
        return $this->publicationContenu;
    }

    /**
     * Set publicationDate
     *
     * @param string $publicationDate
     *
     * @return Publication
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return string
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }
}
