<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Collectif\AdminBundle\Entity\Domaine
 *
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\DomaineRepository")
 */

class Domaine
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
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string $titrePage
     *
     * @ORM\Column(name="titrePage", type="string", length=255)
     */
    private $titrePage;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

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
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;
    
    /**
     * @ORM\Column(name="ordre", type="integer", length=255)
     */
    private $ordre;
    
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
    public $file;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\UserBundle\Entity\User", cascade={"persist"}, mappedBy="domaine")
     */
    private $users;
    

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
     * Set nom
     *
     * @param string $nom
     * @return Domaine
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
     * Set titrePage
     *
     * @param string $titrePage
     * @return Domaine
     */
    public function setTitrePage($titrePage)
    {
        $this->titrePage = $titrePage;
    
        return $this;
    }

    /**
     * Get titrePage
     *
     * @return string 
     */
    public function getTitrePage()
    {
        return $this->titrePage;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Domaine
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Domaine
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
     * @return Domaine
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
     * @return Domaine
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
     * Set ordre
     *
     * @param integer $ordre
     * @return Domaine
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    
        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer 
     */
    public function getOrdre()
    {
        return $this->ordre;
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
        return 'upload/Domaines';
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
     * Add users
     *
     * @param \Collectif\UserBundle\Entity\User $users
     * @return Domaine
     */
    public function addUser(\Collectif\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Collectif\UserBundle\Entity\User $users
     */
    public function removeUser(\Collectif\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}