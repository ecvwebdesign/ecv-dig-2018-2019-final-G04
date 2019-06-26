<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TunelAchatController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index()
    {
        return $this->render('tunel_achat/index.html.twig', [
            'controller_name' => 'TunelAchatController',
        ]);
    }
}
