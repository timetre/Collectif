<?php

namespace Collectif\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
	public function getAll()
	{
		$qb = $this->createQueryBuilder('u');

		$qb->orderBy('u.nom', 'ASC');

		return $qb->getQuery()->getResult();
	}
	
	public function getActifEnabled($actif, $enabled)
	{
		$parameters = array(
			'actif' => $actif,
			'enabled' => $enabled
		);
		
		$qb = $this->createQueryBuilder('u');
		$qb->where('u.actif = :actif and u.enabled = :enabled')->setParameters($parameters);
		$qb->orderBy('u.nom', 'ASC');
	
		return $qb->getQuery()->getResult();
	}
	
	/**
	 * Permet de récupérer le nombre d'utilisateurs
	 */
	public function getNbUsers()
	{
	
		$query = $this->createQueryBuilder('u')
			->select('COUNT(u)');
	
		return $query->getQuery()->getSingleScalarResult();
	}
	
	
	public function getUsersBureau()
	{	
		$parameters = array(
			'membreBureau' => true
		);
		
		$qb = $this->createQueryBuilder('u');
		$qb->where('u.membreBureau = :membreBureau')->setParameters($parameters);
		$qb->orderBy('u.nom', 'ASC');
	
		return $qb->getQuery()->getResult();
	}
}
