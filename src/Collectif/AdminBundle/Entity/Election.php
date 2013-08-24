<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Election
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\ElectionRepository")
 */
class Election
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
     * @var boolean
     *
     * @ORM\Column(name="vote", type="boolean")
     */
    private $vote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateVote", type="datetime")
     */
    private $dateVote;
    
    /**
     * @ORM\ManyToOne(targetEntity="Collectif\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $membre;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Collectif\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $votant;
    
    /**
     * @ORM\ManyToOne(targetEntity="Candidature", cascade={"remove"}, inversedBy="elections")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $candidature;


    public function __construct()
    {
    	$this->dateVote = new \DateTime();
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
     * Set vote
     *
     * @param boolean $vote
     * @return Election
     */
    public function setVote($vote)
    {
        $this->vote = $vote;
    
        return $this;
    }

    /**
     * Get vote
     *
     * @return boolean 
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * Set dateVote
     *
     * @param \DateTime $dateVote
     * @return Election
     */
    public function setDateVote($dateVote)
    {
        $this->dateVote = $dateVote;
    
        return $this;
    }

    /**
     * Get dateVote
     *
     * @return \DateTime 
     */
    public function getDateVote()
    {
        return $this->dateVote;
    }

    /**
     * Set membre
     *
     * @param \Collectif\UserBundle\Entity\User $membre
     * @return Election
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
     * Set candidature
     *
     * @param \Collectif\AdminBundle\Entity\Candidature $candidature
     * @return Election
     */
    public function setCandidature(\Collectif\AdminBundle\Entity\Candidature $candidature)
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

    /**
     * Set votant
     *
     * @param \Collectif\UserBundle\Entity\User $votant
     * @return Election
     */
    public function setVotant(\Collectif\UserBundle\Entity\User $votant)
    {
        $this->votant = $votant;
    
        return $this;
    }

    /**
     * Get votant
     *
     * @return \Collectif\UserBundle\Entity\User 
     */
    public function getVotant()
    {
        return $this->votant;
    }
}