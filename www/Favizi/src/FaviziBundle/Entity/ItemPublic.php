<?php

namespace FaviziBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItemPublic
 *
 * @ORM\Table(name="item_public")
 * @ORM\Entity(repositoryClass="FaviziBundle\Repository\ItemPublicRepository")
 */
class ItemPublic
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
     * @ORM\Column(name="NombreVisitesGlobal", type="integer", nullable=true)
     */
    private $nombreVisitesGlobal;

	
	
	
  
  
  
	
	
	
	
	
	
	

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
     * Set nombreVisitesGlobal
     *
     * @param integer $nombreVisitesGlobal
     *
     * @return ItemPublic
     */
    public function setNombreVisitesGlobal($nombreVisitesGlobal)
    {
        $this->nombreVisitesGlobal = $nombreVisitesGlobal;

        return $this;
    }

    /**
     * Get nombreVisitesGlobal
     *
     * @return int
     */
    public function getNombreVisitesGlobal()
    {
        return $this->nombreVisitesGlobal;
    }
}

