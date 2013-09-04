<?php
 
namespace Collectif\LoggerBundle\Services;
use Collectif\LoggerBundle\Entity\Logger;
use Collectif\LoggerBundle\Entity\ActiviteLogger;
 
class LoggerService
{
	public function logAction($em, $user, $message) {
		$logger = new Logger();
		$logger->setDescription($message);
		$logger->setMembre($user);
		
		$em->persist($logger);
		$em->flush();
	}

	public function logActiviteAction($em, $user, $message, $url) {
		$logger = new ActiviteLogger();
		$logger->setDescription($message);
		$logger->setMembre($user);
		$logger->setUrl($url);
		
		$em->persist($logger);
		$em->flush();
	}
}