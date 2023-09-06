<?php
namespace AppBundle\Form;

use App\Entity\Account;
use DateTime;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use Proxies\__CG__\App\Entity\Currency;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Twig\Node\Expression\Test\NullTest;

class AccountType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('HolderName');
        $builder->add('createdDate', TypeDateType::class, [
            'widget' => 'single_text',
            'data' =>  new DateTime()
        ]);
        $builder->add('accountType');
        $builder->add('accountShort');
        $builder->add('currency', EntityType::class, [
            'class'=> Currency::class,
            'choice_label' => function($currency){
                return $currency->getCurrencyShort()." ".$currency->getRemark() ?? "";
            },
        ]);
        // $builder->add('currency', EntityType::class, [
        //     'class'=> Currency::class,
        //     'choice_label' => 'CurrencyShort',
        // ]);
    }
}