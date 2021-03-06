<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eko\FeedBundle\Item\Writer\RoutedItemInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SuperClassArticle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\SuperClassArticleRepository")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"article" = "Article", "publication" = "Publication"})
 */
abstract class SuperClassArticle implements RoutedItemInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $titre
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
	 * @Assert\NotBlank()
     */
    private $titre;
    
    /**
     * @var string $resume
     *
     * @ORM\Column(name="resume", type="text", nullable=false)
	 * @Assert\NotBlank()
     */
    private $resume;
    
    /**
     * @var string $contenu
     *
     * @ORM\Column(name="contenu", type="text", nullable=false)
	 * @Assert\NotBlank()
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
     * @var \DateTime $datePublication
     *
     * @ORM\Column(name="datePublication", type="datetime", nullable=false)
     */
    private $datePublication;
    
    /**
     * @var boolean $actif
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;
    
    /**
     * @var string $alias
     *
     * @ORM\Column(name="alias", type="string", length=255)
     */
    private $alias;

    
    public function __construct()
    {
    	$this->dateCreation = new \Datetime();
        $this->datePublication = new \Datetime();
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
    	if($this->isArticle())
    		return 'collectif_front_article';
    	else 
    		return 'collectif_front_publication';
    }
    
    public function getFeedItemRouteParameters() {
    	return array('alias' => $this->alias);
    }
    
    public function getFeedItemUrlAnchor() {
    	return '';
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return SuperClassArticle
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
     * @return SuperClassArticle
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
     * @return SuperClassArticle
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
     * @return SuperClassArticle
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
     * @return SuperClassArticle
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
     * Set datePublication
     *
     * @param \DateTime $datePublication
     * @return SuperClassArticle
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
    
        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime 
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return SuperClassArticle
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
     * Set alias
     *
     * @param string $alias
     * @return SuperClassArticle
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
    
    public function isArticle() {
	    if($this instanceof Article) {
	    	return true;
	    } else {
	    	return false;
	    }
    }
}