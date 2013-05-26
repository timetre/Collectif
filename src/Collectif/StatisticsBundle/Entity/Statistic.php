<?php

namespace Collectif\StatisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistic
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\StatisticsBundle\Entity\StatisticRepository")
 */
class Statistic
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=255)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(name="navigateur", type="string", length=255)
     */
    private $navigateur;

    /**
     * @var string
     *
     * @ORM\Column(name="referer", type="string", length=255)
     */
    private $referer;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="jour", type="integer")
     */
    private $jour;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="mois", type="integer")
     */
    private $mois;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer")
     */
    private $annee;
    
   
    /**
     * @ORM\ManyToOne(targetEntity="Collectif\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $membre;

    public function __construct()
    {
    	$this->date = new \Datetime();
    	$this->jour = date_format($this->date, "d");
    	$this->mois = date_format($this->date, "m");
    	$this->annee = date_format($this->date, "Y");
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
     * Set date
     *
     * @param \DateTime $date
     * @return Statistic
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Statistic
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return Statistic
     */
    public function setHost($host)
    {
        $this->host = $host;
    
        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set navigateur
     *
     * @param string $navigateur
     * @return Statistic
     */
    public function setNavigateur($navigateur)
    {
        $this->navigateur = $navigateur;
    
        return $this;
    }

    /**
     * Get navigateur
     *
     * @return string 
     */
    public function getNavigateur()
    {
        return $this->navigateur;
    }

    /**
     * Set referer
     *
     * @param string $referer
     * @return Statistic
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;
    
        return $this;
    }

    /**
     * Get referer
     *
     * @return string 
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set membre
     *
     * @param \Collectif\UserBundle\Entity\User $membre
     * @return Statistic
     */
    public function setMembre(\Collectif\UserBundle\Entity\User $membre = null)
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
     * Set mois
     *
     * @param integer $mois
     * @return Statistic
     */
    public function setMois($mois)
    {
        $this->mois = $mois;
    
        return $this;
    }

    /**
     * Get mois
     *
     * @return integer 
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     * @return Statistic
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    
        return $this;
    }

    /**
     * Get annee
     *
     * @return integer 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set jour
     *
     * @param integer $jour
     * @return Statistic
     */
    public function setJour($jour)
    {
        $this->jour = $jour;
    
        return $this;
    }

    /**
     * Get jour
     *
     * @return integer 
     */
    public function getJour()
    {
        return $this->jour;
    }
}