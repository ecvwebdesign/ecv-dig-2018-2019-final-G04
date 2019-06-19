<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(Security $security, EntityManagerInterface $manager)
    {
        $user = $security->getUser();
        $commande = $manager->getRepository(Commande::class)->findBy([
                'user' => $user
            ]
        );

        return $this->render('panier/index.html.twig', [
            'commande' => $commande,
        ]);
    }
    /**
     * @Route("/panier/{id}", name="ajoutPanier")
     */
    public function ajouterAuPanier($id, Security $security, EntityManagerInterface $manager)
    {
        $user = $security->getUser();
        $produit = $manager->getRepository(Produit::class)->find($id);
        $commande = new Commande();
        $commande->setCommandeType(1);
        $commande->setUser($user);
        $commande->addProduit($produit);
        $manager->persist($commande);
        $manager->flush();
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }
}
