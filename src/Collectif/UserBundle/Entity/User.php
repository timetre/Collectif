<?php

namespace Collectif\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Collectif\AdminBundle\Entity\Domaine;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Collectif\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
     /**
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string $prenom
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime $dateNaissance
     *
     * @ORM\Column(name="dateNaissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var boolean $membreBureau
     *
     * @ORM\Column(name="membreBureau", type="boolean", nullable=true)
     */
    private $membreBureau;

    /**
     * @var string $fonctionBureau
     *
     * @ORM\Column(name="fonctionBureau", type="string", length=255, nullable=true)
     */
    private $fonctionBureau;

    /**
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;
	
	/**
     * @Assert\File(maxSize="6000000")
     * @ORM\Column(nullable=true)
     */
    public $file;

    /**
     * @var \DateTime $contenuPage
     *
     * @ORM\Column(name="contenuPage", type="string", nullable=true)
     */
    private $contenuPage;
	
	/**
     * @var \DateTime $dateCreation
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var boolean $actif
     *
     * @ORM\Column(name="actif", type="boolean", nullable=true)
     */
    private $actif;
    
    /**
     * @ORM\ManyToOne(targetEntity="Collectif\AdminBundle\Entity\Domaine")
     * @ORM\JoinColumn(nullable=true)
     */    
    private $domaine;
	
	/**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Publication", cascade={"persist"}, mappedBy="membre")
     */
    private $publications;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Post", cascade={"persist"}, mappedBy="membre")
     */
    private $posts;
	
    
    public function __construct()
    {
    	parent::__construct();
        $this->dateCreation = new \Datetime();
        $this->addRole("ROLE_ADMIN");
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
    

    public function getAbsolutePath()
    {
    	return null === $this->path
    	? null
    	: $this->getUploadRootDir().'/'.$this->path;
    }
    
    public function getWebPath()
    {
    	return null === $this->path
    	? null
    	: $this->getUploadDir().'/'.$this->path;
    }
    
    protected function getUploadRootDir()
    {
    	// the absolute directory path where uploaded
    	// documents should be saved
    	return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    protected function getUploadDir()
    {
    	// get rid of the __DIR__ so it doesn't screw up
    	// when displaying uploaded doc/image in the view.
    	return 'upload/Membres';
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
    	if (null !== $this->file) {
    		// do whatever you want to generate a unique name
    		$filename = sha1(uniqid(mt_rand(), true));
    		$this->path = $filename.'.'.$this->file->guessExtension();
    	}
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
    	if (null === $this->file) {
    		return;
    	}
    
    	// if there is an error when moving the file, an exception will
    	// be automatically thrown by move(). This will properly prevent
    	// the entity from being persisted to the database on error
    	$this->file->move($this->getUploadRootDir(), $this->path);
    
    	unset($this->file);
    }
    
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
    	if ($file = $this->getAbsolutePath()) {
    		unlink($file);
    	}
    }
    
    /**
     * Set path
     *
     * @param string $path
     * @return Domaine
     */
    public function setPath($path)
    {
    	$this->path = $path;
    
    	return $this;
    }
    
    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
    	return $this->path;
    }


    /**
     * Set nom
     *
     * @param string $nom
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return User
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    
        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set membreBureau
     *
     * @param boolean $membreBureau
     * @return User
     */
    public function setMembreBureau($membreBureau)
    {
        $this->membreBureau = $membreBureau;
    
        return $this;
    }

    /**
     * Get membreBureau
     *
     * @return boolean 
     */
    public function getMembreBureau()
    {
        return $this->membreBureau;
    }

    /**
     * Set fonctionBureau
     *
     * @param string $fonctionBureau
     * @return User
     */
    public function setFonctionBureau($fonctionBureau)
    {
        $this->fonctionBureau = $fonctionBureau;
    
        return $this;
    }

    /**
     * Get fonctionBureau
     *
     * @return string 
     */
    public function getFonctionBureau()
    {
        return $this->fonctionBureau;
    }

    /**
     * Set contenuPage
     *
     * @param string $contenuPage
     * @return User
     */
    public function setContenuPage($contenuPage)
    {
        $this->contenuPage = $contenuPage;
    
        return $this;
    }

    /**
     * Get contenuPage
     *
     * @return string 
     */
    public function getContenuPage()
    {
        return $this->contenuPage;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return User
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
     * @return User
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
     * @return User
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
     * Set domaine
     *
     * @param $domaine
     * @return User
     */
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;
    
        return $this;
    }

    /**
     * Get domaine
     *
     * @return Domaine 
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Add publications
     *
     * @param Collectif\AdminBundle\Entity\Publication $publications
     * @return User
     */
    public function addPublication(\Collectif\AdminBundle\Entity\Publication $publications)
    {
        $this->publications[] = $publications;
    
        return $this;
    }

    /**
     * Remove publications
     *
     * @param Collectif\AdminBundle\Entity\Publication $publications
     */
    public function removePublication(\Collectif\AdminBundle\Entity\Publication $publications)
    {
        $this->publications->removeElement($publications);
    }

    /**
     * Get publications
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPublications()
    {
        return $this->publications;
    }
    
    public function getFullName()
    {
    	return $this->nom . " " . $this->prenom;
    }
    

    /**
     * Set file
     *
     * @param string $file
     * @return User
     */
    public function setFile($file)
    {
        $this->file = $file;
    
        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Add posts
     *
     * @param Collectif\AdminBundle\Entity\Post $posts
     * @return User
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
}