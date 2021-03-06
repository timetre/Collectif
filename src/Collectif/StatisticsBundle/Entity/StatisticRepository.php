<?php

namespace Collectif\StatisticsBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * StatisticRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StatisticRepository extends EntityRepository
{
	public function getStatistics($user)
	{
		return $this->createQueryBuilder('s')
		->select('COUNT(s)')
		->where('s.membre = :user')
		->setParameter('user', $user)
		->getQuery()
		->getSingleScalarResult();
	}
	
	public function getUniqueStatistics($user)
	{
		return $this->createQueryBuilder('s')
		->select('COUNT(DISTINCT s.ip)')
		->where('s.membre = :user')
		->setParameter('user', $user)
		->getQuery()
		->getSingleScalarResult();
	}
	
	public function getStatisticsDay($user)
	{
		$date = new \Datetime();
		$jour = date_format($date, "d");
		$mois = date_format($date, "m");
		$annee = date_format($date, "Y");
		return $this->createQueryBuilder('s')
		->select('COUNT(s.ip)')
		->where('s.membre = :user AND s.jour = :jour AND s.mois = :mois AND s.annee = :annee')
		->setParameter('user', $user)
		->setParameter('jour', $jour)
		->setParameter('mois', $mois)
		->setParameter('annee', $annee)
		->getQuery()
		->getSingleScalarResult();
	}
	
	public function getStatisticsWeek($user)
	{
		$date = new \Datetime();
		$semaine = date_format($date, "W");
		$annee = date_format($date, "Y");
		return $this->createQueryBuilder('s')
		->select('COUNT(s.ip)')
		->where('s.membre = :user AND s.annee = :annee AND s.semaine = :semaine')
		->setParameter('user', $user)
		->setParameter('semaine', $semaine)
		->setParameter('annee', $annee)
		->getQuery()
		->getSingleScalarResult();
	}
	
	public function getStatisticsMonth($user)
	{
		$date = new \Datetime();
		$mois = date_format($date, "m");
		$annee = date_format($date, "Y");
		return $this->createQueryBuilder('s')
		->select('COUNT(s.ip)')
		->where('s.membre = :user AND s.mois = :mois AND s.annee = :annee')
		->setParameter('user', $user)
		->setParameter('mois', $mois)
		->setParameter('annee', $annee)
		->getQuery()
		->getSingleScalarResult();
	}
	
	public function getStatisticsYear($user)
	{
		$date = new \Datetime();
		$annee = date_format($date, "Y");
		return $this->createQueryBuilder('s')
		->select('COUNT(s.ip)')
		->where('s.membre = :user AND s.annee = :annee')
		->setParameter('user', $user)
		->setParameter('annee', $annee)
		->getQuery()
		->getSingleScalarResult();
	}
	
	public function getStatisticsActive($user)
	{
		$date = new \Datetime();
		
		$seconde = date_format($date, "s");
		$minute = date_format($date, "i");
		$heure = date_format($date, "H");
		$jour = date_format($date, "d");
		$mois = date_format($date, "m");
		$annee = date_format($date, "Y");
		
		$date1 = $date->modify('-5 minutes');
		$minute1 = date_format($date, "i");
		
		
		
		return $this->createQueryBuilder('s')
		->select('COUNT(s.ip)')
		->where('s.membre = :user AND s.heure = :heure AND s.jour = :jour AND s.mois = :mois AND s.annee = :annee AND s.minute between :minute1 and :minute')
		->setParameter('user', $user)
		->setParameter('minute', $minute)
		->setParameter('minute1', $minute1)
		->setParameter('heure', $heure)
		->setParameter('jour', $jour)
		->setParameter('mois', $mois)
		->setParameter('annee', $annee)
		->getQuery()
		->getSingleScalarResult();
	}
}
