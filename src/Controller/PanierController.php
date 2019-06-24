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
        $commandes = $manager->getRepository(Commande::class)->findBy(
            ['user' => $user],
            ['id' => 'DESC'],
            ['setMAxResults' => 1]
        );
        $lastCommande = $commandes[0];
        $userProduits = array();
        foreach($lastCommande->getArticles()[0]["produit"] as $articles){
            dd($articles);
            $userProduits[] = $articles;
        }
        dd($userProduits);
        return $this->render('panier/index.html.twig', [
            'userProduits' => $userProduits,
        ]);
    }
    /**
     * @Route("/panier/{id}", name="ajoutPanier")
     */
    public function ajouterAuPanier($id, Security $security, EntityManagerInterface $manager)
    {
        $user = $security->getUser();
        $produit = $manager->getRepository(Produit::class)->find($id);
        $commandes = $manager->getRepository(Commande::class)->findBy(
            ['user' => $user],
            ['id' => 'DESC'],
            ['setMAxResults' => 1]
        );
        $lastCommande = $commandes[0];
        $lastCommandeId = $commandes[0]->getId();
        $lastCommande->getArticles();
        $lastCommande->setArticles(array(array("quantite" => 5, "produit" => $produit)));
        foreach($lastCommande->getArticles() as $article){
        }
        $manager->persist($lastCommande);
        $manager->flush();
        dd($lastCommande);
        return $this->render('panier/index.html.twig', [

        ]);
//        return $this->redirectToRoute('homepage', [
//            'controller_name' => 'PanierController'
//        ]);
    }
}
