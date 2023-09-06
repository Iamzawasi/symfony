<?php

namespace App\Controller;

use AppBundle\Form\UserNameType;
use Random\Engine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormRendererEngineInterface;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{   
    // private FormFactoryInterface $formFactory;
    // private FormRendererEngineInterface $enginInterface;

    /**
     * @Route("/createAccount", name="userName")
     */
    public function index()
    {
        $form = $this->createForm(UserNameType::class);

        // return $this->render('index.html.twig',[
        // ]);

      return $this->render('index.html.twig',
      [
        'form' => $form->createView()
      ]);
    }
}
