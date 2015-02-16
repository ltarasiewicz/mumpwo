<?php

/*
 * A User entity that extends FOSUserBundle's BaseUser abstract class
 * 
 * @author Łukasz Tarasiewicz <lukasz.tarasiewicz@polcode.net>
 */

namespace Home\MumpwoBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Home\MumpwoBundle\Entity\Circle;



/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank(message="Imię jest wymagane", groups={"Registration", "Profile"})
     * @Assert\Length(
     *      min=2,      
     *      max="255",
     *      minMessage="Imię powinno zawierać minimum dwa znaki",
     *      maxMessage="Imię przekracza dozwoloną długość",
     *      groups={"Registration", "Profile"}
     * )
     */
    protected $firstName;
    
    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank(message="Nazwisko jest wymagane", groups={"Registration", "Profile"})
     * @Assert\Length(
     *      min=2,      
     *      max="255",
     *      minMessage="Nazwisko powinno zawierać minimum dwa znaki",
     *      maxMessage="Nazwisko przekracza dozwoloną długość",
     *      groups={"Registration", "Profile"}
     * )
     */    
    protected $lastName;
    
    
    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank(message="Miejsce zamieszkania jest wymagane", groups={"Registration", "Profile"})
     * @Assert\Length(
     *      min=2,      
     *      max="255",
     *      minMessage="Miejsce zamieszkania powinno zawierać minimum dwa znaki",
     *      maxMessage="Miejsce zamieszkania przekracza dozwoloną długość",
     *      groups={"Registration", "Profile"}
     * )
     */      
    protected $location;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Assert\Length(
     *      min=7,      
     *      max="15",
     *      minMessage="Miejsce zamieszkania powinno zawierać minimum dwa znaki",
     *      maxMessage="Miejsce zamieszkania przekracza dozwoloną długość",
     *      groups={"Registration", "Profile"}
     * )
     */      
    protected $phoneNumber;    
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Circle", mappedBy="users")
     */
    protected $circles;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->circles = new ArrayCollection();
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function setLastName($lastName)
    {
        $this->firstName = $lastName;
    }    
    
    public function getLocation()
    {
        return $this->location;
    }
    
    public function setLocation($location)
    {
        $this->location = $location;
    }    
    
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }    
    
    public function addCircle(Circle $circle)
    {        
        $this->circles[] = $circle;
        $circle->addUsers($this); // synchronously updating the inverse side
    }
}

