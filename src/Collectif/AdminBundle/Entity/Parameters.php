<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collectif\AdminBundle\Entity\Parameters
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\ParametersRepository")
 */
class Parameters
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
     * @var string $nomSite
     *
     * @ORM\Column(name="nomSite", type="string", length=255)
     */
    private $nomSite;

    /**
     * @var string $proprietaireSite
     *
     * @ORM\Column(name="proprietaireSite", type="string", length=255)
     */
    private $proprietaireSite;

    /**
     * @var string $adresseSite
     *
     * @ORM\Column(name="adresseSite", type="string", length=255)
     */
    private $adresseSite;

    /**
     * @var string $mailSite
     *
     * @ORM\Column(name="mailSite", type="string", length=255)
     */
    private $mailSite;
	
	/**
     * @var string $mailDebugger
     *
     * @ORM\Column(name="mailDebugger", type="string", length=255, nullable=true)
     */
    private $mailDebugger;

    /**
     * @var string $telephoneSite
     *
     * @ORM\Column(name="telephoneSite", type="string", length=255)
     */
    private $telephoneSite;

    /**
     * @var string $faxSite
     *
     * @ORM\Column(name="faxSite", type="string", length=255)
     */
    private $faxSite;

    /**
     * @var string $logoSite
     *
     * @ORM\Column(name="logoSite", type="string", length=255)
     */
    private $logoSite;

    /**
     * @var string $lienFacebook
     *
     * @ORM\Column(name="lienFacebook", type="string", length=255)
     */
    private $lienFacebook;

    /**
     * @var string $lienTwitter
     *
     * @ORM\Column(name="lienTwitter", type="string", length=255)
     */
    private $lienTwitter;
    
    /**
     * @var string $contactInfos
     *
     * @ORM\Column(name="contactInfos", type="string", length=255)
     */
    private $contactInfos;
	
	/**
     * @var boolean $debugger
     *
     * @ORM\Column(name="debugger", type="boolean", nullable=true)
     */
    private $debugger;

    /**
     * @var text $texteAccueil
     *
     * @ORM\Column(name="texteAccueil", type="text", nullable=true)
     */
    private $texteAccueil;


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
     * Set nomSite
     *
     * @param string $nomSite
     * @return Parameters
     */
    public function setNomSite($nomSite)
    {
        $this->nomSite = $nomSite;
    
        return $this;
    }

    /**
     * Get nomSite
     *
     * @return string 
     */
    public function getNomSite()
    {
        return $this->nomSite;
    }

    /**
     * Set proprietaireSite
     *
     * @param string $proprietaireSite
     * @return Parameters
     */
    public function setProprietaireSite($proprietaireSite)
    {
        $this->proprietaireSite = $proprietaireSite;
    
        return $this;
    }

    /**
     * Get proprietaireSite
     *
     * @return string 
     */
    public function getProprietaireSite()
    {
        return $this->proprietaireSite;
    }

    /**
     * Set adresseSite
     *
     * @param string $adresseSite
     * @return Parameters
     */
    public function setAdresseSite($adresseSite)
    {
        $this->adresseSite = $adresseSite;
    
        return $this;
    }

    /**
     * Get adresseSite
     *
     * @return string 
     */
    public function getAdresseSite()
    {
        return $this->adresseSite;
    }

    /**
     * Set mailSite
     *
     * @param string $mailSite
     * @return Parameters
     */
    public function setMailSite($mailSite)
    {
        $this->mailSite = $mailSite;
    
        return $this;
    }

    /**
     * Get mailSite
     *
     * @return string 
     */
    public function getMailSite()
    {
        return $this->mailSite;
    }

    /**
     * Set telephoneSite
     *
     * @param string $telephoneSite
     * @return Parameters
     */
    public function setTelephoneSite($telephoneSite)
    {
        $this->telephoneSite = $telephoneSite;
    
        return $this;
    }

    /**
     * Get telephoneSite
     *
     * @return string 
     */
    public function getTelephoneSite()
    {
        return $this->telephoneSite;
    }

    /**
     * Set faxSite
     *
     * @param string $faxSite
     * @return Parameters
     */
    public function setFaxSite($faxSite)
    {
        $this->faxSite = $faxSite;
    
        return $this;
    }

    /**
     * Get faxSite
     *
     * @return string 
     */
    public function getFaxSite()
    {
        return $this->faxSite;
    }

    /**
     * Set maintenanceSite
     *
     * @param boolean $maintenanceSite
     * @return Parameters
     */
    public function setMaintenanceSite($maintenanceSite)
    {
        $this->maintenanceSite = $maintenanceSite;
    
        return $this;
    }

    /**
     * Get maintenanceSite
     *
     * @return boolean 
     */
    public function getMaintenanceSite()
    {
        return $this->maintenanceSite;
    }

    /**
     * Set contenuMaintenanceSite
     *
     * @param string $contenuMaintenanceSite
     * @return Parameters
     */
    public function setContenuMaintenanceSite($contenuMaintenanceSite)
    {
        $this->contenuMaintenanceSite = $contenuMaintenanceSite;
    
        return $this;
    }

    /**
     * Get contenuMaintenanceSite
     *
     * @return string 
     */
    public function getContenuMaintenanceSite()
    {
        return $this->contenuMaintenanceSite;
    }

    /**
     * Set logoSite
     *
     * @param string $logoSite
     * @return Parameters
     */
    public function setLogoSite($logoSite)
    {
        $this->logoSite = $logoSite;
    
        return $this;
    }

    /**
     * Get logoSite
     *
     * @return string 
     */
    public function getLogoSite()
    {
        return $this->logoSite;
    }

    /**
     * Set lienFacebook
     *
     * @param string $lienFacebook
     * @return Parameters
     */
    public function setLienFacebook($lienFacebook)
    {
        $this->lienFacebook = $lienFacebook;
    
        return $this;
    }

    /**
     * Get lienFacebook
     *
     * @return string 
     */
    public function getLienFacebook()
    {
        return $this->lienFacebook;
    }

    /**
     * Set lienTwitter
     *
     * @param string $lienTwitter
     * @return Parameters
     */
    public function setLienTwitter($lienTwitter)
    {
        $this->lienTwitter = $lienTwitter;
    
        return $this;
    }

    /**
     * Get lienTwitter
     *
     * @return string 
     */
    public function getLienTwitter()
    {
        return $this->lienTwitter;
    }

    /**
     * Set contactInfos
     *
     * @param string $contactInfos
     * @return Parameters
     */
    public function setContactInfos($contactInfos)
    {
        $this->contactInfos = $contactInfos;
    
        return $this;
    }

    /**
     * Get contactInfos
     *
     * @return string 
     */
    public function getContactInfos()
    {
        return $this->contactInfos;
    }

    /**
     * Set debugger
     *
     * @param boolean $debugger
     * @return Parameters
     */
    public function setDebugger($debugger)
    {
        $this->debugger = $debugger;
    
        return $this;
    }

    /**
     * Get debugger
     *
     * @return boolean 
     */
    public function getDebugger()
    {
        return $this->debugger;
    }

    /**
     * Set mailDebugger
     *
     * @param string $mailDebugger
     * @return Parameters
     */
    public function setMailDebugger($mailDebugger)
    {
        $this->mailDebugger = $mailDebugger;
    
        return $this;
    }

    /**
     * Get mailDebugger
     *
     * @return string 
     */
    public function getMailDebugger()
    {
        return $this->mailDebugger;
    }

    /**
     * Set texteAccueil
     *
     * @param string $texteAccueil
     * @return Parameters
     */
    public function setTexteAccueil($texteAccueil)
    {
        $this->texteAccueil = $texteAccueil;

        return $this;
    }

    /**
     * Get texteAccueil
     *
     * @return string 
     */
    public function getTexteAccueil()
    {
        return $this->texteAccueil;
    }
}
