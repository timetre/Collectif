<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Collectif\AdminBundle\Entity\Publication
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\PublicationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Publication extends SuperClassArticle
{
    /**
     * @ORM\ManyToOne(targetEntity="Collectif\UserBundle\Entity\User", cascade={"persist"}, inversedBy="publications")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $membre;

    /**
     * Set membre
     *
     * @param Collectif\UserBundle\Entity\User $membre
     * @return Publication
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

}