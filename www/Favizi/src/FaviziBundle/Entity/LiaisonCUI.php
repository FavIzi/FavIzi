<?php

namespace FaviziBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LiaisonCUI
 *
 * @ORM\Table(name="liaison_c_u_i")
 * @ORM\Entity(repositoryClass="FaviziBundle\Repository\LiaisonCUIRepository")
 */
class LiaisonCUI
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
     * @ORM\Column(name="Note", type="integer", nullable=true)
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDerniereVisite", type="datetime", nullable=true)
     */
    private $dateDerniereVisite;


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
     * Set note
     *
     * @param integer $note
     *
     * @return LiaisonCUI
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set dateDerniereVisite
     *
     * @param \DateTime $dateDerniereVisite
     *
     * @return LiaisonCUI
     */
    public function setDateDerniereVisite($dateDerniereVisite)
    {
        $this->dateDerniereVisite = $dateDerniereVisite;

        return $this;
    }

    /**
     * Get dateDerniereVisite
     *
     * @return \DateTime
     */
    public function getDateDerniereVisite()
    {
        return $this->dateDerniereVisite;
    }
}

