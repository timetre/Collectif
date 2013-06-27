<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Offre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\OffreRepository")
 */
class Offre
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
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;
    
    /**
     * @var string $resume
     * @ORM\Column(name="resume", type="text", nullable=true)
     */
    private $resume;
    
    /**
     * @var string $contenu
     * @ORM\Column(name="contenu", type="text", nullable=true)
     */
    private $contenu;
    
    /**
     * @var \DateTime $dateCreation
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;
    
    /**
     * @var string $entreprise
     * @ORM\Column(name="entreprise", type="string", length=255, nullable=true)
     */
    private $entreprise;
    
    /**
     * @var string $ville
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;
    
    /**
     * @var string $contrat
     * @ORM\Column(name="contrat", type="string", length=255, nullable=true)
     */
    private $contrat;
    
    /**
     * @var string $experience
     * @ORM\Column(name="experience", type="string", length=255, nullable=true)
     */
    private $experience;
    
    /**
     * @var string $salaire
     * @ORM\Column(name="salaire", type="string", length=255, nullable=true)
     */
    private $salaire;
    
    /**
     * @var string $duree
     * @ORM\Column(name="duree", type="string", length=255, nullable=true)
     */
    private $duree;
    
    /**
     * @var string $contact
     * @ORM\Column(name="contact", type="string", length=255, nullable=true)
     */
    private $contact;
    
    /**
     * @ORM\ManyToOne(targetEntity="SousForum", cascade={"persist"}, inversedBy="offres")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $sousForum;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Post", cascade={"remove"}, mappedBy="message")
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    private $posts;
    
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
     * Set titre
     *
     * @param string $titre
     * @return Offre
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
     * @return Offre
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
     * @return Offre
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
     * @return Offre
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
     * Set sousForum
     *
     * @param \Collectif\AdminBundle\Entity\SousForum $sousForum
     * @return Offre
     */
    public function setSousForum(\Collectif\AdminBundle\Entity\SousForum $sousForum)
    {
        $this->sousForum = $sousForum;
    
        return $this;
    }

    /**
     * Get sousForum
     *
     * @return \Collectif\AdminBundle\Entity\SousForum 
     */
    public function getSousForum()
    {
        return $this->sousForum;
    }

    /**
     * Add posts
     *
     * @param \Collectif\AdminBundle\Entity\Post $posts
     * @return Offre
     */
    public function addPost(\Collectif\AdminBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    
        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Collectif\AdminBundle\Entity\Post $posts
     */
    public function removePost(\Collectif\AdminBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Set membre
     *
     * @param \Collectif\UserBundle\Entity\User $membre
     * @return Offre
     */
    public function setMembre(\Collectif\UserBundle\Entity\User $membre)
    {
        $this->membre = $membre;
    
        return $this;
    }

    /**
     * Get membre
     *
     * @return \Collectif\UserBundle\Entity\User 
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     * @return Offre
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    
        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string 
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Offre
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set contrat
     *
     * @param string $contrat
     * @return Offre
     */
    public function setContrat($contrat)
    {
        $this->contrat = $contrat;
    
        return $this;
    }

    /**
     * Get contrat
     *
     * @return string 
     */
    public function getContrat()
    {
        return $this->contrat;
    }

    /**
     * Set experience
     *
     * @param string $experience
     * @return Offre
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    
        return $this;
    }

    /**
     * Get experience
     *
     * @return string 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set salaire
     *
     * @param string $salaire
     * @return Offre
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    
        return $this;
    }

    /**
     * Get salaire
     *
     * @return string 
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set duree
     *
     * @param string $duree
     * @return Offre
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    
        return $this;
    }

    /**
     * Get duree
     *
     * @return string 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return Offre
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }
}
