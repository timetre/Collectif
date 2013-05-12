<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Collectif\AdminBundle\Entity\Publication
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\PublicationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Publication
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
     * @ORM\Column(name="dateCreation", type="date")
     */
    private $dateCreation;
    
    /**
     * @var \DateTime $datePublication
     *
     * @ORM\Column(name="datePublication", type="date")
     */
    private $datePublication;

    /**
     * @var \DateTime $dateModification
     *
     * @ORM\Column(name="dateModification", type="date")
     */
    private $dateModification;

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
    

    /**
     * @ORM\ManyToOne(targetEntity="Collectif\UserBundle\Entity\User", cascade={"persist"}, inversedBy="posts")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $membre;

	
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

    /**
     * Set titre
     *
     * @param string $titre
     * @return Publication
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
     * @return Publication
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
     * @return Publication
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
     * @return Publication
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
     * @return Publication
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
     * @return Publication
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
     * Set membre
     *
     * @param Collectif\UserBundle\Entity\User $membre
     * @return Publication
     */
    public function setMembre(\Collectif\UserBundle\Entity\User $membre)
    {
        $this->membre = $membre;
    
        return $this;
    }

    /**
     * Get membre
     *
     * @return Collectif\UserBundle\Entity\User 
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     * @return Publication
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