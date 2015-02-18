<?php

namespace Home\MumpwoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder->add('firstName');
        $builder->add('lastName');
        $builder->add('country');
        $builder->add('city');        
    }
    
    public function getParent() 
    {
        return 'fos_user_registration';
    }
    
    public function getName()
    {
        return 'mumpwo_user_registration';
    }
}
