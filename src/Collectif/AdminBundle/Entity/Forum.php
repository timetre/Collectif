<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Collectif\AdminBundle\Entity\Forum
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\ForumRepository")
 */
class Forum
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
    
    /**
     * @var boolean $actif
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;
    
    /**
     * @var \DateTime $dateCreation
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;
    
    
    /**
     * @ORM\OneToMany(targetEntity="SousForum", cascade={"remove"}, mappedBy="forum")
     */
    private $sousForums;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sousForums = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateCreation = new \DateTime();
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
     * @return integer
     */
    public function getTitre()
    {
    	return $this->titre;
    }

    /**
     * Add sousForums
     *
     * @param Collectif\AdminBundle\Entity\SousForum $sousForums
     * @return Forum
     */
    public function addSousForum(\Collectif\AdminBundle\Entity\SousForum $sousForums)
    {
        $this->sousForums[] = $sousForums;
    
        return $this;
    }

    /**
     * Remove sousForums
     *
     * @param Collectif\AdminBundle\Entity\SousForum $sousForums
     */
    public function removeSousForum(\Collectif\AdminBundle\Entity\SousForum $sousForums)
    {
        $this->sousForums->removeElement($sousForums);
    }

    /**
     * Get sousForums
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSousForums()
    {
        return $this->sousForums;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return Forum
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
     * @return Forum
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
}