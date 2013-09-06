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
		$link = $this->urlTreatment($url);
		$logger->setUrl($link);
		
		$em->persist($logger);
		$em->flush();
	}

	private function urlTreatment($link) {
		$hasAppDev = false;

		if(null !== $link) {
            $begin = substr($link, 0, 12);
            
            if($begin == '/app_dev.php') {
                $hasAppDev = true;
            }  
        }

        if($hasAppDev == true && null !== $link)
        	$link = substr($link, 12);
            
        return $link;
	}
}