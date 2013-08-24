<?php
 
namespace Collectif\LoggerBundle\Services;
use Collectif\LoggerBundle\Entity\Logger;
 
class LoggerService
{
	public function logAction($em, $user, $message) {
		$logger = new Logger();
		$logger->setDescription($message);
		$logger->setMembre($user);
		
		$em->persist($logger);
		$em->flush();
	}
}