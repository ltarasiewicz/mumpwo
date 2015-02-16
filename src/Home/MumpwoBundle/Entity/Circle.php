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
 * @ORM\Table(name="circles")
 */
class Circle
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected $location;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="circles")
     * @ORM\JoinTable(name="circles_users")
     */
    protected $users;
          
    public function __construct()
    {
        $this->users = new ArrayCollection();

    }
    
    public function addUsers(User $user)
    {
        $this->users[] = $user;
        $this->location = $user->getLocation();
        $user->addCircle($this); // synchronously updating the inverse side
    }
    
}

