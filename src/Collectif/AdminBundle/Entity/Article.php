<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Eko\FeedBundle\Item\Writer\RoutedItemInterface;

/**
 * Collectif\AdminBundle\Entity\Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Article implements RoutedItemInterface
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
     * @var string $resume
     *
     * @ORM\Column(name="resume", type="text")
     */
    private $resume;

    /**
     * @var string $contenu
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

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
     * @var boolean $actif
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;
	
	/**
     * @ORM\ManyToOne(targetEntity="Categorie", cascade={"persist"}, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */    
    private $categorie;
    
    /**
     * @var string $alias
     *
     * @ORM\Column(name="alias", type="string", length=255)
     */
    private $alias;
    

	public function __construct()
    {
        $this->dateCreation = new \Datetime();
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
     * @return Article
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
     * Set resume
     *
     * @param string $resume
     * @return Article
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    
        return $this;
    }

    /**
     * Get resume
     *
     * @return string 
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Article
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
     * @return Article
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
     * Set actif
     *
     * @param boolean $actif
     * @return Article
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
     * Set categorie
     *
     * @param Collectif\AdminBundle\Entity\Categorie $categorie
     * @return Article
     */
    public function setCategorie(\Collectif\AdminBundle\Entity\Categorie $categorie)
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
    
    public function getFeedItemTitle() {
    	return $this->titre;
    }
    
    public function getFeedItemDescription() {
    	return $this->contenu;
    }
    
    public function getFeedItemPubDate() {
    	return $this->dateCreation;
    }
    
    public function getFeedItemRouteName() {
    	return 'collectif_front_article';
    }
    
    public function getFeedItemRouteParameters() {
    	return array('id' => $this->id);
    }
    
    public function getFeedItemUrlAnchor() {
    	return '';
    }
    
    /**
     * Set alias
     *
     * @param string $alias
     * @return Publication
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
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function updateAlias()
    {
    	if (null !== $this->titre) {
    		/*if(null === $this->id) {
    		 $this->alias = mt_rand(100, 10000) . "-" . $this->clear_str($this->titre);
    		} else {
    		$this->alias = $this->id . "-" . $this->clear_str($this->titre);
    		}*/
    		$this->alias = $this->clear_str($this->titre);
    	} else {
    		$this->alias = sha1(uniqid(mt_rand(), true));
    	}
    }
    
    private function clear_str($text, $separator = '-', $charset = 'utf-8') {
    	// Pour l'encodage
    	$text = mb_convert_encoding($text,'HTML-ENTITIES',$charset);
    	$text = strtolower(trim($text));
    	// On vire les accents
    	$text = preg_replace(   array('/ß/','/&(..)lig;/', '/&([aouAOU])uml;/','/&(.)[^;]*;/'),
    			array('ss',"$1","$1".'e',"$1"),
    			$text);
    	// on vire tout ce qui n'est pas alphanumérique
    	$text_clear = preg_replace("[^a-z0-9_-]",' ',trim($text));// ^a-zA-Z0-9_-
    	// Nettoyage pour un espace maxi entre les mots
    	$array = explode(' ', $text_clear);
    	$str = '';
    	$i = 0;
    	foreach($array as $cle=>$valeur){
    		 
    		if(trim($valeur) != '' AND trim($valeur) != $separator AND $i > 0)
    			$str .= $separator.$valeur;
    		elseif(trim($valeur) != '' AND trim($valeur) != $separator AND $i == 0)
    		$str .= $valeur;
    		 
    		$i++;
    
    	}
    
    	//on renvoie la chaîne transformée
    	return $str;
    
    }
}