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
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Post", cascade={"persist"}, mappedBy="sousForum")
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    private $posts;
    
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
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add posts
     *
     * @param Collectif\AdminBundle\Entity\Post $posts
     * @return SousForum
     */
    public function addPost(\Collectif\AdminBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    
        return $this;
    }

    /**
     * Remove posts
     *
     * @param Collectif\AdminBundle\Entity\Post $posts
     */
    public function removePost(\Collectif\AdminBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
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
}