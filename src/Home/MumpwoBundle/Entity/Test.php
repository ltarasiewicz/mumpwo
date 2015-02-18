<?php

/*
 * A User entity that extends FOSUserBundle's BaseUser abstract class
 * 
 * @author Łukasz Tarasiewicz <lukasz.tarasiewicz@polcode.net>
 */

namespace Home\MumpwoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Home\MumpwoBundle\Entity\User;



/**
 * @ORM\Entity
 * @ORM\Table(name="tests")
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
        
    protected $user;
    
    protected $category;
    
    protected $questions;
          
    public function __construct()
    {
        $this->questions = new ArrayCollection();

    }
    
}

