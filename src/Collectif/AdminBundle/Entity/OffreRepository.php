<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * OffreRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OffreRepository extends EntityRepository
{
	public function getOffres($limit=null)
	{
	    $qb = $this->createQueryBuilder('o');

	    $qb->orderBy('o.dateCreation', 'DESC')
		   ->setMaxResults( $limit );
	
	    return $qb->getQuery()->getResult();
	}
}
