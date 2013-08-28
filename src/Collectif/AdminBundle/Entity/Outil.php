<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Entity
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\OutilRepository")
 */
class Outil
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
     * @var string $lien
     * @ORM\Column(name="lien", type="text", nullable=true)
     */
    private $lien;
    
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
     * @ORM\ManyToOne(targetEntity="SousForum", cascade={"persist"}, inversedBy="outils")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $sousForum;
    
    /**
     * @ORM\ManyToOne(targetEntity="Collectif\UserBundle\Entity\User", cascade={"persist"}, inversedBy="publications")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $membre;
    
    /**
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;
    
    /**
     * @Assert\Image(
     * maxSize="6000000",
     * mimeTypes = {
     *   "image/png",
     *   "image/pjpeg",
     *   "image/jpeg",
     *   "image/gif"
     * },
     * mimeTypesMessage = "Votre image ne correspond pas au format autorisé (jpeg, gif ou png)",
     * maxSizeMessage = "Votre image ne doit pas dépasser les 6 mo"
     *)
     *
     */
    protected $file;
    
    
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
     * @return Outil
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
     * Set lien
     *
     * @param string $lien
     * @return Outil
     */
    public function setLien($lien)
    {
        $this->lien = $lien;
    
        return $this;
    }

    /**
     * Get lien
     *
     * @return string 
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Outil
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
     * @return Outil
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
     * @return Outil
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
     * Set membre
     *
     * @param \Collectif\UserBundle\Entity\User $membre
     * @return Outil
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
    	return __DIR__.'/../../../../www/'.$this->getUploadDir();
    }
    
    protected function getUploadDir()
    {
    	// get rid of the __DIR__ so it doesn't screw up
    	// when displaying uploaded doc/image in the view.
    	return 'upload/Outils';
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
     * @return MonCv
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
     * Set file
     *
     * @param string $file
     * @return Brand
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
}