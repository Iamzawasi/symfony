<?php
namespace AppBundle\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserNameType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('userName'
        );
        $builder->add('password', PasswordType::class);
        $builder->add('email', EmailType::class, [
            'row_attr' => [
                'class' => 'input_group'
            ],
        ]);
        $builder->add('gender', ChoiceType::class, [
            'choices' => [
                'Male'=>false, 
                'Female' => true
            ]
        ]);
    }
}