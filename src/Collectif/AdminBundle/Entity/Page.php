<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Collectif\AdminBundle\Entity\Page
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\PageRepository")
 */
class Page
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $titre
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string $texteMenu
     *
     * @ORM\Column(name="texteMenu", type="string", length=255)
     */
    private $texteMenu;

    /**
     * @var string $contenu
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var string $alias
     *
     * @ORM\Column(name="alias", type="string", length=255)
     */
    private $alias;

    /**
     * @var boolean $actif
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;
    
    /**
     * @var boolean $clickable
     *
     * @ORM\Column(name="clickable", type="boolean")
     */
    private $clickable;

    /**
     * @var \DateTime $dateCreation
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime $dateModification
     *
     * @ORM\Column(name="dateModification", type="datetime")
     */
    private $dateModification;

    /**
     * @var string $lienRedirectionExterne
     *
     * @ORM\Column(name="lienRedirectionExterne", type="string", length=255, nullable=true)
     */
    private $lienRedirectionExterne;

    /**
     * @var string $lienRedirectionInterne
     *
     * @ORM\Column(name="lienRedirectionInterne", type="string", length=255, nullable=true)
     */
    private $lienRedirectionInterne;

    /**
     * @var string $seoDescription
     *
     * @ORM\Column(name="seoDescription", type="string", length=255, nullable=true)
     */
    private $seoDescription;
    
    /**
     * @ORM\Column(name="ordre", type="integer", length=255)
     */
    private $ordre;
    
    /**
     * @var boolean $defaut
     *
     * @ORM\Column(name="defaut", type="boolean", nullable=true)
     */
    private $defaut;
    
    /**
     * @ORM\ManyToOne(targetEntity="Collectif\AdminBundle\Entity\Page", cascade={"persist"}, inversedBy="enfants")
     */
    private $parent;
	
	
	/**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Page", cascade={"remove"}, mappedBy="parent")
     */
    private $enfants;
	
	/**
     * @ORM\ManyToOne(targetEntity="Categorie", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */    
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Collectif\GalleryBundle\Entity\Album", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */    
    private $album;
    
    /**
     * @var string $typePage
     *
     * @ORM\Column(name="typePage", type="string", length=255, nullable=true)
     */
    private $typePage;

	
	public function __construct()
    {
        $this->dateCreation = new \Datetime();
		$this->enfants = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Page
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set texteMenu
     *
     * @param string $texteMenu
     * @return Page
     */
    public function setTexteMenu($texteMenu)
    {
        $this->texteMenu = $texteMenu;
    
        return $this;
    }

    /**
     * Get texteMenu
     *
     * @return string 
     */
    public function getTexteMenu()
    {
        return $this->texteMenu;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Page
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    
        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Page
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    
        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return Page
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
    
        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Page
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
     * Set dateModification
     *
     * @param \DateTime $dateModification
     * @return Page
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;
    
        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set lienRedirectionExterne
     *
     * @param string $lienRedirectionExterne
     * @return Page
     */
    public function setLienRedirectionExterne($lienRedirectionExterne)
    {
        $this->lienRedirectionExterne = $lienRedirectionExterne;
    
        return $this;
    }

    /**
     * Get lienRedirectionExterne
     *
     * @return string 
     */
    public function getLienRedirectionExterne()
    {
        return $this->lienRedirectionExterne;
    }

    /**
     * Set lienRedirectionInterne
     *
     * @param string $lienRedirectionInterne
     * @return Page
     */
    public function setLienRedirectionInterne($lienRedirectionInterne)
    {
        $this->lienRedirectionInterne = $lienRedirectionInterne;
    
        return $this;
    }

    /**
     * Get lienRedirectionInterne
     *
     * @return string 
     */
    public function getLienRedirectionInterne()
    {
        return $this->lienRedirectionInterne;
    }

    /**
     * Set seoDescription
     *
     * @param string $seoDescription
     * @return Page
     */
    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;
    
        return $this;
    }

    /**
     * Get seoDescription
     *
     * @return string 
     */
    public function getSeoDescription()
    {
        return $this->seoDescription;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     * @return Page
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    
        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer 
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set defaut
     *
     * @param boolean $defaut
     * @return Page
     */
    public function setDefaut($defaut)
    {
        $this->defaut = $defaut;
    
        return $this;
    }

    /**
     * Get defaut
     *
     * @return boolean 
     */
    public function getDefaut()
    {
        return $this->defaut;
    }

    /**
     * Add parent
     *
     * @param Collectif\AdminBundle\Entity\Page $parent
     * @return Page
     */
    public function addParent(\Collectif\AdminBundle\Entity\Page $parent)
    {
        $this->parent[] = $parent;
    
        return $this;
    }

    /**
     * Remove parent
     *
     * @param Collectif\AdminBundle\Entity\Page $parent
     */
    public function removeParent(\Collectif\AdminBundle\Entity\Page $parent)
    {
        $this->parent->removeElement($parent);
    }

    /**
     * Get parent
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set parent
     *
     * @param Collectif\AdminBundle\Entity\Page $parent
     * @return Page
     */
    public function setParent(\Collectif\AdminBundle\Entity\Page $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Add enfants
     *
     * @param Collectif\AdminBundle\Entity\Page $enfants
     * @return Page
     */
    public function addEnfant(\Collectif\AdminBundle\Entity\Page $enfants)
    {
        $this->enfants[] = $enfants;
    
        return $this;
    }

    /**
     * Remove enfants
     *
     * @param Collectif\AdminBundle\Entity\Page $enfants
     */
    public function removeEnfant(\Collectif\AdminBundle\Entity\Page $enfants)
    {
        $this->enfants->removeElement($enfants);
    }

    /**
     * Get enfants
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEnfants()
    {
        $results = array();
        foreach($this->enfants as $enfant) {
            if($enfant->getActif())
                $results[] = $enfant;
        }
        return $results;
    }

    /**
     * Set categorie
     *
     * @param Collectif\AdminBundle\Entity\Categorie $categorie
     * @return Page
     */
    public function setCategorie(\Collectif\AdminBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return Collectif\AdminBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set clickable
     *
     * @param boolean $clickable
     * @return Page
     */
    public function setClickable($clickable)
    {
        $this->clickable = $clickable;
    
        return $this;
    }

    /**
     * Get clickable
     *
     * @return boolean 
     */
    public function getClickable()
    {
        return $this->clickable;
    }

    /**
     * Set typePage
     *
     * @param string $typePage
     * @return Page
     */
    public function setTypePage($typePage)
    {
        $this->typePage = $typePage;
    
        return $this;
    }

    /**
     * Get typePage
     *
     * @return string 
     */
    public function getTypePage()
    {
        return $this->typePage;
    }

    /**
     * Set album
     *
     * @param \Collectif\GalleryBundle\Entity\Album $album
     * @return Page
     */
    public function setAlbum(\Collectif\GalleryBundle\Entity\Album $album = null)
    {
        $this->album = $album;
    
        return $this;
    }

    /**
     * Get album
     *
     * @return \Collectif\GalleryBundle\Entity\Album 
     */
    public function getAlbum()
    {
        return $this->album;
    }
}
