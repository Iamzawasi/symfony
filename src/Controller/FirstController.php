<?php

namespace App\Controller;

use App\Entity\User;
use AppBundle\Form\UserNameType;
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

class FirstController extends AbstractController
{
    /**
     *@Route("/main", name="register")
     */
    public function index(User $user, Request $request, ManagerRegistry $em)
    {
        $form = $this->createForm(UserNameType::class, $user, ['data_class' => User::class, 'method'=>'GET'] );
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword(password_hash($form->getData()->getPassword(), PASSWORD_ARGON2I));
            $entityManager = $em->getManager();
            $entityManager->persist($user);
            $entityManager->flush();  
        }
        return $this->render('index.html.twig',
            [
            'form' => $form->createView()
            ]);
    }

}