<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Produit;
use App\Entity\ProduitType;
use App\Entity\Couleurs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
        if($commandes){
            $lastCommande = $commandes[0];
            $lastCommandeId = $commandes[0]->getId();
            $lastCommande->getArticles();
            $lastCommande->setArticles(array(array("quantite" => 5, "produit" => $produit)));
            foreach($lastCommande->getArticles() as $article){
            }
            $manager->persist($lastCommande);
            $manager->flush();
        }
        return $this->render('panier/ajout.html.twig', [
            "produit" => $produit,
            "allCouleurs" => $allCouleurs,
        ]);
    }
    /**
 * @Route("/add/{id}/", name="choix")
 */
    public function choixProduit($id, Security $security, EntityManagerInterface $manager ){

        $produit = $manager->getRepository(Produit::class)->find($id);
        $produitTypeId = $manager->getRepository(ProduitType::class)->find($produit->getProduitType()->getId());
        $allCouleurs = $manager->getRepository(Produit::class)->findBy([
            'produitType' => $produitTypeId
        ]);
        $couleurs = [];
        foreach ($allCouleurs as $couleur){
            $couleurs[] = ($couleur->getCouleur()->getId());
        }
        $couleurs = array_unique($couleurs);

        $couleursImages = [];
        foreach($couleurs as $couleur){
            $couleursImages[] = $manager->getRepository(Produit::class)->findBy(
                ['couleur' => $couleur],
                ['id' => 'DESC'],
                ['setMAxResults' => 1]
            )[0]->getImage();
        }


        $commande = new Commande();
        $form = $this->createFormBuilder($commande)
            ->add('save', SubmitType::class, ['label' => 'Ajouter au panier'])
            ->getForm();
        return $this->render('panier/choix.html.twig', [
            "produit" => $produit,
            "couleursImages" => $couleursImages,
            "form" => $form->createView(),
        ]);
    }

    /**
     * @Route("/produit/options", name="checkProduit")
     */
    public function checkProduit(){

        return $this->render('panier/choix.html.twig');
    }

    /**
     * @Route("/produit/add", name="popUpProduit")
     */
    public function popUpProduit()
    {
        return $this->render('produit/popUpProduit.html.twig');
    }

    /**
     * @Route("/produit/checkproduit", name="popUpValidation")
     */
    public function popUpValidation()
    {
        return $this->render('tunel_achat/popUpValidation.html.twig');
    }
}
