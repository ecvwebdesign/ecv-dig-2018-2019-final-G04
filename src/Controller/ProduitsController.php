<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\ProduitType;
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
        $produitTypeId = $produit->getProduitType()->getId();
        $produitType = $manager->getRepository(ProduitType::class)->find($produitTypeId);
        $allProduitType = $manager->getRepository(Produit::class)->findBy([
            'produitType' => $produitTypeId
        ]);
        $oldNumber = $produit->getPrix();
        $newNumber = $produit->getPrixPromo();
        $reduction = round($oldNumber - $newNumber);
        return $this->render('produit/singleProduit.html.twig', ["produit" => $produit, "produitType" => $produitType, "allProduitType" => $allProduitType, "reduction" => $reduction]);
    }
}
