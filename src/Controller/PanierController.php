<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\CommandeArticles;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class PanierController extends AbstractController
{
//    /**
//     * @Route("/panier", name="panier")
//     */
//    public function index(Security $security, EntityManagerInterface $manager)
//    {
//        $user = $security->getUser();
//        $commandes = $manager->getRepository(Commande::class)->findBy([
//                'user' => $user
//            ]
//        );
//        $userProduits = array();
//        foreach($commandes as $commande){
//            $userProduits[] = $commande->getProduit()->getValues();;
//        }
//
//        return $this->render('panier/index.html.twig', [
//            'userProduits' => $userProduits,
//        ]);
//    }
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
        $commandesArticles = $manager->getRepository(CommandeArticles::class)->findBy(
            ['commande' => $lastCommandeId]
        );
        dd($commandesArticles);
        if($lastCommande->getCommandeType() == 1){
            dd($lastCommande->getCommandeArticles()->getId);

            if(!empty($lastCommande->getProduit()->getValues())){
                foreach($lastCommande->getCommandeArticles()->getValues() as $newProduit){
                    if($newProduit->getId() == $produit->getId() && $newProduit){
                        dd($produit->getQuantite());
                    }else{
                        dd($newProduit);
                    }
                }
            }else{
                $commande = new Commande();
                $commande->setCommandeType(1);
                $commande->setUser($user);
                $commande->addProduit($produit);
            }
        }

        $userCommandes[] = $commande->getProduit()->getValues();

        dd($commandes, $commande);
        $manager->persist($commande);
        $manager->flush();
        return $this->render('panier/index.html.twig', [

        ]);
//        return $this->redirectToRoute('homepage', [
//            'controller_name' => 'PanierController'
//        ]);
    }
}
