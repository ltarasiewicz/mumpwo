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

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_users")
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Assert\Length(
     *      min=2,      
     *      max="15",
     *      minMessage="The first name should include at least 2 characters",
     *      maxMessage="The name should inclue the maximum of 15 characters",
     *      groups={"Registration", "Profile"}
     * )
     */
    protected $firstName;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Assert\Length(
     *      min=2,      
     *      max="15",
     *      minMessage="The last name should include at least 2 characters",
     *      maxMessage="The last name should include the maximum of 15 characters",
     *      groups={"Registration", "Profile"}
     * )
     */    
    protected $lastName;   
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *     
     * @Assert\Length(
     *      min=2,      
     *      max="25",
     *      groups={"Registration", "Profile"}
     * )
     */      
    protected $country;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Assert\Length(
     *      min=2,      
     *      max="15",
     *      groups={"Registration", "Profile"}
     * )
     */      
    protected $city;   
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Test")
     * @ORM\JoinTable(name="users_tests",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="test_id", referencedColumnName="id", unique=true)})
     */
    protected $tests;
    
       
    public function __construct()
    {
        parent::__construct();
        
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
        $this->lastName = $lastName;
    }          
     
    public function getCountry()
    {
        return $this->country;
    }
    
    public function setCountry($country)
    {
        $this->country = $country;
    }         
    
    public function getCity()
    {
        return $this->city;
    }
    
    public function setCity($city)
    {
        $this->city = $city;
    }      
    
}

