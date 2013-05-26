<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Collectif\AdminBundle\Entity\Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Collectif\AdminBundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Article extends SuperClassArticle
{
	/**
     * @ORM\ManyToOne(targetEntity="Categorie", cascade={"persist"}, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */    
    private $categorie;

    /**
     * Set categorie
     *
     * @param Collectif\AdminBundle\Entity\Categorie $categorie
     * @return Article
     */
    public function setCategorie(\Collectif\AdminBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return Collectif\AdminBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}