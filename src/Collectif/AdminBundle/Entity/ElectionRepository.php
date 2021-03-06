<?php

namespace Collectif\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ElectionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ElectionRepository extends EntityRepository
{
	public function getVotes($id, $vote)
	{
		$param = array(
				'id' => $id, 
				'vote' => $vote
		);
		$qb = $this->createQueryBuilder('e');
		$qb->where('e.vote = :vote AND e.membre = :id')
		->setParameters($param);
		
	
		return $qb->getQuery()->getResult();
	}
	
	public function dejaVote($votantId, $candidatureId) {
		$param = array(
				'candidatureId' => $candidatureId,
				'votantId' => $votantId
		);
	
		$qb = $this->createQueryBuilder('e');
		$qb->where('e.candidature = :candidatureId AND e.votant = :votantId')
		->setParameters($param);
	
		$result = $qb->getQuery()->getResult();
		
		return sizeof($result) > 0 ? true : false; 
	}
}
