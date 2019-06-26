<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TunelAchatController extends AbstractController
{
    /**
     * @Route("/tunel/achat", name="tunel_achat")
     */
    public function index()
    {
        return $this->render('tunel_achat/index.html.twig', [
            'controller_name' => 'TunelAchatController',
        ]);
    }
}
