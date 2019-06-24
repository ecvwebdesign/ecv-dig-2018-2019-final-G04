<?php

namespace App\Controller;

use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index(EntityManagerInterface $manager)
    {
        $produits = $manager->getRepository(Produit::class)->findAll();
        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
        ]);
    }

    /**
     * @Route("/produit/{id}", name="singleProduit")
     */
    public function singleProduit($id, EntityManagerInterface $manager){
        $produit = $manager->getRepository(Produit::class)->find($id);
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $produitsSimilaires = $repository->findBy([
                'produitType' => $produit->getProduitType()->getId()
            ]
        );
        return $this->render('produit/singleProduit.html.twig', ["produit" => $produit, "produitsSimilaires" => $produitsSimilaires]);
    }
}

