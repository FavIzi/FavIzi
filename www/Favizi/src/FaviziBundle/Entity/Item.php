<?php

namespace FaviziBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="FaviziBundle\Repository\ItemRepository")
 */
class Item
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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Url", type="string", length=255)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreation", type="datetime" , nullable=true)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDerniereModification", type="datetime", nullable=true)
     */
    private $dateDerniereModification;

	
	
	
	
	 /**
   * @ORM\ManyToOne(targetEntity="ItemPublic")
   * @ORM\JoinColumn(nullable=true)
   */
  private $itemPublic;
	
	
	 /**
   * @ORM\OneToOne(targetEntity="ItemPrive")
   * @ORM\JoinColumn(nullable=true)
   */
  private $itemPrive;
	
	
	 /**
   * @ORM\ManyToOne(targetEntity="Categorie")
   * @ORM\JoinColumn(nullable=true)
   */
  private $categorie;
	
	
	
	 /**
   * @ORM\ManyToOne(targetEntity="Utilisateur")
   */
  private $utilisateur;

  // … reste des attributs

  public function setUtilisateur(Utilisateur $utilisateur)
  {
    $this->utilisateur = $utilisateur;

    return $this;
  }

  public function getUtilisateur()
  {
    return $this->utilisateur;
  }

	
	
	

  // reste des attributs

  public function setCategorie(Categorie $categorie)
  {
    $this->categorie = $categorie;

    return $this;
  }

  public function getCategorie()
  {
    return $this->categorie;
  }

	
	
	

  // … reste des attributs

  public function setItemPublic(ItemPublic $itemPublic)
  {
    $this->itemPublic = $itemPublic;

    return $this;
  }
  
  

  public function supprItemPublic()
  {
    $this->itemPublic = null;
    return $this;
  }

  public function getItemPublic()
  {
    return $this->itemPublic;
  }

	

  // … reste des attributs

  public function setItemPrive(ItemPrive $itemPrive)
  {
    $this->itemPrive = $itemPrive;

    return $this;
  }

  public function supprItemPrive()
  {
    $this->itemPrive = null;
    return $this;
  }

  public function getItemPrive()
  {
    return $this->itemPrive;
  }

	
	
	
	
	
	
	
	
	
	
	

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Item
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Item
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Item
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateDerniereModification
     *
     * @param \DateTime $dateDerniereModification
     *
     * @return Item
     */
    public function setDateDerniereModification($dateDerniereModification)
    {
        $this->dateDerniereModification = $dateDerniereModification;

        return $this;
    }

    /**
     * Get dateDerniereModification
     *
     * @return \DateTime
     */
    public function getDateDerniereModification()
    {
        return $this->dateDerniereModification;
    }
}

