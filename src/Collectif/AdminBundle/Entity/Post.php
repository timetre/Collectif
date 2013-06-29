<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Collectif\AdminBundle\Entity\Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\PostRepository")
 */
class Post
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
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var string $contenu
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime $dateCreation
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Message", cascade={"persist"}, inversedBy="posts")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Blank()
     */
    private $message;
    
    /**
     * @ORM\ManyToOne(targetEntity="Candidature", cascade={"persist"}, inversedBy="posts")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Blank()
     */
    private $candidature;
    
    /**
     * @ORM\ManyToOne(targetEntity="Visionneuse", cascade={"persist"}, inversedBy="posts")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Blank()
     */
    private $visionneuse;
    
    /**
     * @ORM\ManyToOne(targetEntity="Collectif\UserBundle\Entity\User", cascade={"persist"}, inversedBy="publications")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $membre;
    
    
    public function __construct()
    {
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
     * Set membre
     *
     * @param Collectif\UserBundle\Entity\User $membre
     * @return Post
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
     * Set titre
     *
     * @param string $titre
     * @return Post
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
     * Set contenu
     *
     * @param string $contenu
     * @return Post
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
     * @return Post
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
     * Set message
     *
     * @param \Collectif\AdminBundle\Entity\Message $message
     * @return Post
     */
    public function setMessage(\Collectif\AdminBundle\Entity\Message $message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return \Collectif\AdminBundle\Entity\Message 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set visionneuse
     *
     * @param \Collectif\AdminBundle\Entity\Visionneuse $visionneuse
     * @return Post
     */
    public function setVisionneuse(\Collectif\AdminBundle\Entity\Visionneuse $visionneuse)
    {
        $this->visionneuse = $visionneuse;
    
        return $this;
    }

    /**
     * Get visionneuse
     *
     * @return \Collectif\AdminBundle\Entity\Visionneuse 
     */
    public function getVisionneuse()
    {
        return $this->visionneuse;
    }

    /**
     * Set candidature
     *
     * @param \Collectif\AdminBundle\Entity\Candidature $candidature
     * @return Post
     */
    public function setCandidature(\Collectif\AdminBundle\Entity\Candidature $candidature = null)
    {
        $this->candidature = $candidature;
    
        return $this;
    }

    /**
     * Get candidature
     *
     * @return \Collectif\AdminBundle\Entity\Candidature 
     */
    public function getCandidature()
    {
        return $this->candidature;
    }
}