<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Candidature
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\CandidatureRepository")
 */
class Candidature
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
     * @var boolean $pending
     *
     * @ORM\Column(name="pending", type="boolean")
     */
    private $pending;
    
    /**
     * @ORM\OneToMany(targetEntity="Collectif\AdminBundle\Entity\Post", cascade={"remove"}, mappedBy="candidature")
     * @ORM\OrderBy({"dateCreation" = "DESC"})
     */
    private $posts;
    
    /**
     * @ORM\OneToOne(targetEntity="Collectif\UserBundle\Entity\User", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Assert\NotBlank()
	 */
    private $membre;
    
    /**
     * @ORM\OneToMany(targetEntity="Election", cascade={"persist"}, mappedBy="candidature")
     */
    private $elections;

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
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pending = true;
    }
    
    /**
     * Add posts
     *
     * @param \Collectif\AdminBundle\Entity\Post $posts
     * @return Candidature
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
     * @return Candidature
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
     * Set pending
     *
     * @param boolean $pending
     * @return Candidature
     */
    public function setPending($pending)
    {
        $this->pending = $pending;
    
        return $this;
    }

    /**
     * Get pending
     *
     * @return boolean 
     */
    public function getPending()
    {
        return $this->pending;
    }

    /**
     * Add votants
     *
     * @param \Collectif\UserBundle\Entity\User $votants
     * @return Candidature
     */
    public function addVotant(\Collectif\UserBundle\Entity\User $votants)
    {
        $this->votants[] = $votants;
    
        return $this;
    }

    /**
     * Remove votants
     *
     * @param \Collectif\UserBundle\Entity\User $votants
     */
    public function removeVotant(\Collectif\UserBundle\Entity\User $votants)
    {
        $this->votants->removeElement($votants);
    }

    /**
     * Get votants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVotants()
    {
        return $this->votants;
    }

    /**
     * Add elections
     *
     * @param \Collectif\AdminBundle\Entity\Election $elections
     * @return Candidature
     */
    public function addElection(\Collectif\AdminBundle\Entity\Election $elections)
    {
        $this->elections[] = $elections;
    
        return $this;
    }

    /**
     * Remove elections
     *
     * @param \Collectif\AdminBundle\Entity\Election $elections
     */
    public function removeElection(\Collectif\AdminBundle\Entity\Election $elections)
    {
        $this->elections->removeElement($elections);
    }

    /**
     * Get elections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getElections()
    {
        return $this->elections;
    }
    
	public function getPositiveVotes() {
    	$votes = array();
    	foreach ($this->elections as $election) {
    		if($election->getVote())
    			$votes[] = $election;
    	}
    	
    	return $votes;
    }
    
    public function getNegativeVotes() {
    	$votes = array();
    	foreach ($this->elections as $election) {
    		if(!$election->getVote())
    			$votes[] = $election;
    	}
    	 
    	return $votes;
    }
}