<?php

namespace Home\MumpwoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * A controller that manages user-related functionality
 */
class UserController extends Controller
{
    /**
     * Registart a user
     * 
     * @return Response A Response instance
     */
    public function registerAction()
    {
        return $this->render('HomeMumpwoBundle:Default:index.html.twig');
    }
}
