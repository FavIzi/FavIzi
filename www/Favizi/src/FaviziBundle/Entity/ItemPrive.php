<?php

namespace FaviziBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemPrive
 *
 * @ORM\Table(name="item_prive")
 * @ORM\Entity(repositoryClass="FaviziBundle\Repository\ItemPriveRepository")
 */
class ItemPrive
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
     * @ORM\Column(name="NombreVisitesPrive", type="integer", nullable=true)
     */
    private $nombreVisitesPrive;

    /**
     * @var string
     *
     * @ORM\Column(name="Commentaire", type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCommentaire", type="datetime", nullable=true)
     */
    private $dateCommentaire;

	
	
	
	
	
	
	
	
	
	
	
	

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
     * Set nombreVisitesPrive
     *
     * @param integer $nombreVisitesPrive
     *
     * @return ItemPrive
     */
    public function setNombreVisitesPrive($nombreVisitesPrive)
    {
        $this->nombreVisitesPrive = $nombreVisitesPrive;

        return $this;
    }

    /**
     * Get nombreVisitesPrive
     *
     * @return int
     */
    public function getNombreVisitesPrive()
    {
        return $this->nombreVisitesPrive;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return ItemPrive
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set dateCommentaire
     *
     * @param \DateTime $dateCommentaire
     *
     * @return ItemPrive
     */
    public function setDateCommentaire($dateCommentaire)
    {
        $this->dateCommentaire = $dateCommentaire;

        return $this;
    }

    /**
     * Get dateCommentaire
     *
     * @return \DateTime
     */
    public function getDateCommentaire()
    {
        return $this->dateCommentaire;
    }
}

