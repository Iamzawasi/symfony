<?php

namespace App\Controller;

use App\Entity\Account;
use App\Entity\Currency;
use App\Entity\User;
use App\Repository\AccountRepository;
use App\Repository\CurrencyRepository;
use AppBundle\Form\AccountType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Random\Engine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormRendererEngineInterface;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     *@Route("/account", name="accountCreate")
     */
    public function index(Account $account, Request $request, ManagerRegistry $em)
    {
        $form = $this->createForm(AccountType::class, $account, ['data_class' => Account::class, 'method'=>'GET'] );
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $em->getManager();
            $entityManager->persist($account);
            $entityManager->flush();  
        }
        return $this->render('account.html.twig',[
            'form' => $form->createView(),
        ]);
    }

}