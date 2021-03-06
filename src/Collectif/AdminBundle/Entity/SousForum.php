<?php

namespace Collectif\AdminBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Collectif\AdminBundle\Entity\SousForum
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\SousForumRepository")
 */
class SousForum
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
     * @var \DateTime $dateCreation
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var boolean $isRss
     * @ORM\Column(name="isRss", type="boolean", nullable=true)
     */
    private $isRss;

    /**
     * @var string $urlFlux
     * @ORM\Column(name="urlFlux", type="string", length=255, nullable=true)
     */
    private $urlFlux;

    /**
     * @var string $description
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="Forum", cascade={"persist"}, inversedBy="sousForums")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $forum;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Message", cascade={"remove"}, mappedBy="sousForum")
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    private $messages;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Outil", cascade={"remove"}, mappedBy="sousForum")
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    private $outils;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Offre", cascade={"remove"}, mappedBy="sousForum")
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    private $offres;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Visionneuse", cascade={"remove"}, mappedBy="sousForum")
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    private $visionneuses;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Feed", cascade={"remove"}, mappedBy="sousForum")
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    private $feeds;
    
    /**
     * @var string $typeTopic
     *
     * @ORM\Column(name="typeTopic", type="string", length=255, nullable=true)
     */
    private $typeTopic;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set forum
     *
     * @param Collectif\AdminBundle\Entity\Forum $forum
     * @return SousForum
     */
    public function setForum(\Collectif\AdminBundle\Entity\Forum $forum)
    {
        $this->forum = $forum;
    
        return $this;
    }

    /**
     * Get forum
     *
     * @return Collectif\AdminBundle\Entity\Forum 
     */
    public function getForum()
    {
        return $this->forum;
    }

    

    /**
     * Set titre
     *
     * @param string $titre
     * @return SousForum
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return SousForum
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
     * Set isRss
     *
     * @param boolean $isRss
     * @return SousForum
     */
    public function setIsRss($isRss)
    {
        $this->isRss = $isRss;
    
        return $this;
    }

    /**
     * Get isRss
     *
     * @return boolean 
     */
    public function getIsRss()
    {
        return $this->isRss;
    }

    /**
     * Set urlFlux
     *
     * @param string $urlFlux
     * @return SousForum
     */
    public function setUrlFlux($urlFlux)
    {
        $this->urlFlux = $urlFlux;
    
        return $this;
    }

    /**
     * Get urlFlux
     *
     * @return string 
     */
    public function getUrlFlux()
    {
        return $this->urlFlux;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return SousForum
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set typeTopic
     *
     * @param string $typeTopic
     * @return SousForum
     */
    public function setTypeTopic($typeTopic)
    {
        $this->typeTopic = $typeTopic;
    
        return $this;
    }

    /**
     * Get typeTopic
     *
     * @return string 
     */
    public function getTypeTopic()
    {
        return $this->typeTopic;
    }

    /**
     * Add messages
     *
     * @param \Collectif\AdminBundle\Entity\Message $messages
     * @return SousForum
     */
    public function addMessage(\Collectif\AdminBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;
    
        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Collectif\AdminBundle\Entity\Message $messages
     */
    public function removeMessage(\Collectif\AdminBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add outils
     *
     * @param \Collectif\AdminBundle\Entity\Outil $outils
     * @return SousForum
     */
    public function addOutil(\Collectif\AdminBundle\Entity\Outil $outils)
    {
        $this->outils[] = $outils;
    
        return $this;
    }

    /**
     * Remove outils
     *
     * @param \Collectif\AdminBundle\Entity\Outil $outils
     */
    public function removeOutil(\Collectif\AdminBundle\Entity\Outil $outils)
    {
        $this->outils->removeElement($outils);
    }

    /**
     * Get outils
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOutils()
    {
        return $this->outils;
    }

    /**
     * Add offres
     *
     * @param \Collectif\AdminBundle\Entity\Offre $offres
     * @return SousForum
     */
    public function addOffre(\Collectif\AdminBundle\Entity\Offre $offres)
    {
        $this->offres[] = $offres;
    
        return $this;
    }

    /**
     * Remove offres
     *
     * @param \Collectif\AdminBundle\Entity\Offre $offres
     */
    public function removeOffre(\Collectif\AdminBundle\Entity\Offre $offres)
    {
        $this->offres->removeElement($offres);
    }

    /**
     * Get offres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOffres()
    {
        return $this->offres;
    }

    /**
     * Add visionneuses
     *
     * @param \Collectif\AdminBundle\Entity\Visionneuse $visionneuses
     * @return SousForum
     */
    public function addVisionneus(\Collectif\AdminBundle\Entity\Visionneuse $visionneuses)
    {
        $this->visionneuses[] = $visionneuses;
    
        return $this;
    }

    /**
     * Remove visionneuses
     *
     * @param \Collectif\AdminBundle\Entity\Visionneuse $visionneuses
     */
    public function removeVisionneus(\Collectif\AdminBundle\Entity\Visionneuse $visionneuses)
    {
        $this->visionneuses->removeElement($visionneuses);
    }

    /**
     * Get visionneuses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisionneuses()
    {
        return $this->visionneuses;
    }

    /**
     * Add feeds
     *
     * @param \Collectif\AdminBundle\Entity\Feed $feeds
     * @return SousForum
     */
    public function addFeed(\Collectif\AdminBundle\Entity\Feed $feeds)
    {
        $this->feeds[] = $feeds;
    
        return $this;
    }

    /**
     * Remove feeds
     *
     * @param \Collectif\AdminBundle\Entity\Feed $feeds
     */
    public function removeFeed(\Collectif\AdminBundle\Entity\Feed $feeds)
    {
        $this->feeds->removeElement($feeds);
    }

    /**
     * Get feeds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFeeds()
    {
        return $this->feeds;
    }
}
