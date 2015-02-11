<?php

namespace Home\MumpwoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * A default controller that renders only a homepage
 */
class DefaultController extends Controller
{
    /**
     * Render a hompe page
     * 
     * @return Response A Response instance
     */
    public function indexAction()
    {
        return $this->render('HomeMumpwoBundle:Default:index.html.twig');
    }
}
