<?php

namespace Collectif\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CollectifUserBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }

}