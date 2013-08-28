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
     * @Assert\NotBlank()
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string $prenom
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
	 * @Assert\NotBlank()
     */
    private $prenom;
    
    /**
     * @var string $telephone
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;
    
    /**
     * @var string $alias
     *
     * @ORM\Column(name="alias", type="string", length=255)
     */
    private $alias;

    /**
     * @var boolean $membreBureau
     *
     * @ORM\Column(name="membreBureau", type="boolean", nullable=true)
     */
    private $membreBureau;

    /**
     * @var boolean $webmaster
     *
     * @ORM\Column(name="webmaster", type="boolean", nullable=true)
     */
    private $webmaster;

    /**
     * @var string $fonctionBureau
     *
     * @ORM\Column(name="fonctionBureau", type="string", length=255, nullable=true)
     */
    private $fonctionBureau;

    /**
     * @var string $latitude
     *
     * @ORM\Column(name="latitude", type="string", length=255, nullable=true)
     */
    private $latitude;

    /**
     * @var string $longitude
     *
     * @ORM\Column(name="longitude", type="string", length=255, nullable=true)
     */
    private $longitude;

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

    /**
     * @var \DateTime $contenuPage
     *
     * @ORM\Column(name="contenuPage", type="text", nullable=true)
     */
    private $contenuPage;

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
     * @ORM\ManyToOne(targetEntity="Collectif\AdminBundle\Entity\Domaine", inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */    
    private $domaine;

	/**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Publication", cascade={"remove"}, mappedBy="membre")
     * @ORM\OrderBy({"datePublication" = "DESC"})
     */
    private $publications;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Experience", cascade={"remove"}, mappedBy="membre")
     * @ORM\OrderBy({"ordre" = "ASC"})
     */
    private $experiences;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Formation", cascade={"remove"}, mappedBy="membre")
     * @ORM\OrderBy({"ordre" = "ASC"})
     */
    private $formations;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Competence", cascade={"remove"}, mappedBy="membre")
     * @ORM\OrderBy({"ordre" = "ASC"})
     */
    private $competences;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Interet", cascade={"remove"}, mappedBy="membre")
     * @ORM\OrderBy({"ordre" = "ASC"})
     */
    private $interets;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Post", cascade={"remove"}, mappedBy="membre")
     */
    private $posts;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\StatisticsBundle\Entity\Statistic", cascade={"remove"}, mappedBy="membre")
     */
    private $statistics;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\MonCv", cascade={"remove"}, mappedBy="membre")
     */
    private $mesCvs;
	
	/**
     * @ORM\OneToMany(targetEntity="Collectif\LoggerBundle\Entity\Logger", cascade={"remove"}, mappedBy="membre")
	 * @ORM\OrderBy({"date" = "DESC"})
     */
    private $loggers;
    
    /**
     * @var string $path
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;
    
    /**
     * @var string $activiteNumerique
     *
     * @ORM\Column(name="activiteNumerique", type="text", nullable=true)
     */
    private $activiteNumerique;
    
    /**
     * @var string $lieu
     *
     * @ORM\Column(name="lieu", type="text", nullable=true)
     */
    private $lieu;
    
    /**
     * @var string $statut
     *
     * @ORM\Column(name="statut", type="text", nullable=true)
     */
    private $statut;
    
    /**
     * @var string $sujetRecherche
     *
     * @ORM\Column(name="sujetRecherche", type="text", nullable=true)
     */
    private $sujetRecherche;
    
    /**
     * @var string $structure
     *
     * @ORM\Column(name="structure", type="text", nullable=true)
     */
    private $structure;
    
    /**
     * @var string $twitter
     *
     * @ORM\Column(name="$twitter", type="text", nullable=true)
     */
    private $twitter;
    
    /**
     * @var string $facebook
     *
     * @ORM\Column(name="facebook", type="text", nullable=true)
     */
    private $facebook;

    /**
     * @var string $hypothese
     *
     * @ORM\Column(name="hypothese", type="text", nullable=true)
     */
    private $hypothese;
    
    /**
     * @var string $sitePersonnel
     *
     * @ORM\Column(name="sitePersonnel", type="text", nullable=true)
     */
    private $sitePersonnel;

    /**
     * @ORM\Column(name="ordreBureau", type="integer", nullable=true)
     */
    private $ordreBureau;
    
    /**
     * @var string $pageStructure
     *
     * @ORM\Column(name="pageStructure", type="text", nullable=true)
     */
    private $pageStructure;

    
    public function __construct()
    {
    	parent::__construct();
        $this->dateCreation = new \Datetime();
        $this->addRole("ROLE_ADMIN");
        $this->webmaster = false;
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
    	return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }
    
    public function getWebPath()
    {
    	return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }
    
    protected function getUploadRootDir()
    {
    	return __DIR__.'/../../../../www/'.$this->getUploadDir();
    }
    
    protected function getUploadDir()
    {
    	return 'upload/Membres';
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
    	if (null !== $this->file) {
    		$this->path = sha1(uniqid(mt_rand(), true)).'.'.$this->file->guessExtension();
    	}
    	
    	$this->formatFields();
    }
    
    private function formatFields()
    {
    	if (null !== $this->nom && null !== $this->prenom) {
    		$this->alias = $this->clear_str($this->prenom)."-".$this->clear_str($this->nom);
    		$this->prenom = ucfirst ($this->prenom);
    		$this->nom = strtoupper($this->nom);
    	} else {
    		$this->alias = sha1(uniqid(mt_rand(), true));
    	}
    	 
    	if(null !== $this->email)
    		$this->username = $this->email;
    	else
    		$this->username = sha1(uniqid(mt_rand(), true));
    	
    	$this->facebook = $this->putHttp($this->facebook);
    	$this->twitter = $this->putHttp($this->twitter);
    	$this->pageStructure = $this->putHttp($this->pageStructure);
    	$this->sitePersonnel = $this->putHttp($this->sitePersonnel);
    	$this->activiteNumerique = $this->putHttp($this->activiteNumerique);

        if($this->lieu !== null) {
            $prepAddr = str_replace(' ','+',$this->lieu);
            $prepAddr .= "+France";
            $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
            $output= json_decode($geocode);
            $this->latitude = $output->results[0]->geometry->location->lat;
            $this->longitude = $output->results[0]->geometry->location->lng;
        }

    	
    }
    
    private function putHttp($field) {
        $hasHttp = false;

    	if(null !== $field) {
    		$begin = substr($field, 0, 7);
            
            if (strpos($begin,'http://') === false) {
                $hasHttp = true;
            }

            $begin = substr($field, 0, 8);
            if (strpos($begin,'https://') === false) {
                $hasHttp = true;
            }
    	}

        if($hasHttp == false && null !== $field)
            $field = "http://" . $field;
    	return $field;
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

    	$this->file->move($this->getUploadRootDir(), $this->path);
    
    	unset($this->file);
    }
    
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
    	if ($file = $this->getAbsolutePath()) {
    		if (file_exists($file)) {
    			unlink($file);
    		}
    	}
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
        $results = array();
        foreach($this->publications as $publication) {
            if($publication->getActif())
                $results[] = $publication;
        }
        return $results;
    }
    
    public function getFullName()
    {
    	return $this->nom . " " . $this->prenom;
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

    /**
     * Set path
     *
     * @param string $path
     * @return User
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
     * Set alias
     *
     * @param string $alias
     * @return User
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

    /**
     * Add experiences
     *
     * @param \Collectif\AdminBundle\Entity\Experience $experiences
     * @return User
     */
    public function addExperience(\Collectif\AdminBundle\Entity\Experience $experiences)
    {
        $this->experiences[] = $experiences;
    
        return $this;
    }

    /**
     * Remove experiences
     *
     * @param \Collectif\AdminBundle\Entity\Experience $experiences
     */
    public function removeExperience(\Collectif\AdminBundle\Entity\Experience $experiences)
    {
        $this->experiences->removeElement($experiences);
    }

    /**
     * Get experiences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Add formations
     *
     * @param \Collectif\AdminBundle\Entity\Formation $formations
     * @return User
     */
    public function addFormation(\Collectif\AdminBundle\Entity\Formation $formations)
    {
        $this->formations[] = $formations;
    
        return $this;
    }

    /**
     * Remove formations
     *
     * @param \Collectif\AdminBundle\Entity\Formation $formations
     */
    public function removeFormation(\Collectif\AdminBundle\Entity\Formation $formations)
    {
        $this->formations->removeElement($formations);
    }

    /**
     * Get formations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * Add competences
     *
     * @param \Collectif\AdminBundle\Entity\Competence $competences
     * @return User
     */
    public function addCompetence(\Collectif\AdminBundle\Entity\Competence $competences)
    {
        $this->competences[] = $competences;
    
        return $this;
    }

    /**
     * Remove competences
     *
     * @param \Collectif\AdminBundle\Entity\Competence $competences
     */
    public function removeCompetence(\Collectif\AdminBundle\Entity\Competence $competences)
    {
        $this->competences->removeElement($competences);
    }

    /**
     * Get competences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * Add interets
     *
     * @param \Collectif\AdminBundle\Entity\Interet $interets
     * @return User
     */
    public function addInteret(\Collectif\AdminBundle\Entity\Interet $interets)
    {
        $this->interets[] = $interets;
    
        return $this;
    }

    /**
     * Remove interets
     *
     * @param \Collectif\AdminBundle\Entity\Interet $interets
     */
    public function removeInteret(\Collectif\AdminBundle\Entity\Interet $interets)
    {
        $this->interets->removeElement($interets);
    }

    /**
     * Get interets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInterets()
    {
        return $this->interets;
    }

    /**
     * Set activiteNumerique
     *
     * @param string $activiteNumerique
     * @return User
     */
    public function setActiviteNumerique($activiteNumerique)
    {
        $this->activiteNumerique = $activiteNumerique;
    
        return $this;
    }

    /**
     * Get activiteNumerique
     *
     * @return string 
     */
    public function getActiviteNumerique()
    {
        return $this->activiteNumerique;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return User
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    
        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return User
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    
        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set sujetRecherche
     *
     * @param string $sujetRecherche
     * @return User
     */
    public function setSujetRecherche($sujetRecherche)
    {
        $this->sujetRecherche = $sujetRecherche;
    
        return $this;
    }

    /**
     * Get sujetRecherche
     *
     * @return string 
     */
    public function getSujetRecherche()
    {
        return $this->sujetRecherche;
    }

    /**
     * Set structure
     *
     * @param string $structure
     * @return User
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;
    
        return $this;
    }

    /**
     * Get structure
     *
     * @return string 
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return User
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    
        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return User
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    
        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set hypothese
     *
     * @param string $hypothese
     * @return User
     */
    public function setHypothese($hypothese)
    {
        $this->hypothese = $hypothese;
    
        return $this;
    }

    /**
     * Get hypothese
     *
     * @return string 
     */
    public function getHypothese()
    {
        return $this->hypothese;
    }
    
    public function getFormatedEmail() {
    	$formated = str_replace ( '@', '[arobase]', $this->email) ;
    	return $formated;	
    }

    /**
     * Add statistics
     *
     * @param \Collectif\StatisticsBundle\Entity\Statistic $statistics
     * @return User
     */
    public function addStatistic(\Collectif\StatisticsBundle\Entity\Statistic $statistics)
    {
        $this->statistics[] = $statistics;
    
        return $this;
    }

    /**
     * Remove statistics
     *
     * @param \Collectif\StatisticsBundle\Entity\Statistic $statistics
     */
    public function removeStatistic(\Collectif\StatisticsBundle\Entity\Statistic $statistics)
    {
        $this->statistics->removeElement($statistics);
    }

    /**
     * Get statistics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatistics()
    {
        return $this->statistics;
    }

    /**
     * Add mesCvs
     *
     * @param \Collectif\AdminBundle\Entity\MonCv $mesCvs
     * @return User
     */
    public function addMesCv(\Collectif\AdminBundle\Entity\MonCv $mesCvs)
    {
        $this->mesCvs[] = $mesCvs;
    
        return $this;
    }

    /**
     * Remove mesCvs
     *
     * @param \Collectif\AdminBundle\Entity\MonCv $mesCvs
     */
    public function removeMesCv(\Collectif\AdminBundle\Entity\MonCv $mesCvs)
    {
        $this->mesCvs->removeElement($mesCvs);
    }

    /**
     * Get mesCvs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesCvs()
    {
        return $this->mesCvs;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set sitePersonnel
     *
     * @param string $sitePersonnel
     * @return User
     */
    public function setSitePersonnel($sitePersonnel)
    {
        $this->sitePersonnel = $sitePersonnel;
    
        return $this;
    }

    /**
     * Get sitePersonnel
     *
     * @return string 
     */
    public function getSitePersonnel()
    {
        return $this->sitePersonnel;
    }

    /**
     * Set pageStructure
     *
     * @param string $pageStructure
     * @return User
     */
    public function setPageStructure($pageStructure)
    {
        $this->pageStructure = $pageStructure;
    
        return $this;
    }

    /**
     * Get pageStructure
     *
     * @return string 
     */
    public function getPageStructure()
    {
        return $this->pageStructure;
    }    
    

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return User
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return User
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set ordreBureau
     *
     * @param integer $ordreBureau
     * @return User
     */
    public function setOrdreBureau($ordreBureau)
    {
        $this->ordreBureau = $ordreBureau;
    
        return $this;
    }

    /**
     * Get ordreBureau
     *
     * @return integer 
     */
    public function getOrdreBureau()
    {
        return $this->ordreBureau;
    }

    /**
     * Set webmaster
     *
     * @param boolean $webmaster
     * @return User
     */
    public function setWebmaster($webmaster)
    {
        $this->webmaster = $webmaster;
    
        return $this;
    }

    /**
     * Get webmaster
     *
     * @return boolean 
     */
    public function getWebmaster()
    {
        return $this->webmaster;
    }

    /**
     * Add loggers
     *
     * @param \Collectif\LoggerBundle\Entity\Logger $loggers
     * @return User
     */
    public function addLogger(\Collectif\LoggerBundle\Entity\Logger $loggers)
    {
        $this->loggers[] = $loggers;
    
        return $this;
    }

    /**
     * Remove loggers
     *
     * @param \Collectif\LoggerBundle\Entity\Logger $loggers
     */
    public function removeLogger(\Collectif\LoggerBundle\Entity\Logger $loggers)
    {
        $this->loggers->removeElement($loggers);
    }

    /**
     * Get loggers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLoggers()
    {
        return $this->loggers;
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
