<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ParametersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ParametersRepository extends EntityRepository
{
	public function getParameters()
	{
	    $qb = $this->createQueryBuilder('p');

	    return $qb->getQuery()->getSingleResult();
	}
}
