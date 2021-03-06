<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PartenaireRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PartenaireRepository extends EntityRepository
{
	public function getAll()
	{
		$qb = $this->createQueryBuilder('p');
	
		$qb->orderBy('p.ordre', 'ASC');
	
		return $qb->getQuery()->getResult();
	}
}
