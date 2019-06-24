<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProduitType extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $produitType = new \App\Entity\ProduitType();
        $produitType->setLibelle("Sneakers homme Tanjun Se");
        $produitType->setComposition("Coton");
        $produitType->setPoids("300");
        $produitType->setDescription("« Tanjun » signifie « simplicité » en japonais et la chaussure en est la parfaite illustration. Cette édition spéciale au design moderne à la fois pratique et confortable est ornée d'un logo Swoosh métallique pour un style sophistiqué.");
        $manager->persist($produitType);
        $produitType = new \App\Entity\ProduitType();
        $produitType->setLibelle("Veste à capuche homme Sportswear Ft Statement NIKE");
        $produitType->setComposition("82% coton ; 18% polyester");
        $produitType->setPoids(NULL);
        $produitType->setDescription("Le sweatshirt à capuche arbore le logo Swoosh qui enveloppe l’avant et la manche pour créer un style qui se démarque.");
        $manager->persist($produitType);
        $produitType = new \App\Entity\ProduitType();
        $produitType->setLibelle("Sneakers homme Nightgazer NIKE");
        $produitType->setComposition(NULL);
        $produitType->setPoids(NULL);
        $produitType->setDescription("La chaussure Nike Nightgazer est dotée d'une empeigne composée de plusieurs matières pour un look running old-school et une semelle intermédiaire en Phylon offrant un amorti ultra-confortable.");
        $manager->persist($produitType);
        $produitType = new \App\Entity\ProduitType();
        $produitType->setLibelle("Chaussures en toile homme El Distrito CONVERSE");
        $produitType->setComposition(NULL);
        $produitType->setPoids(NULL);
        $produitType->setDescription("Tige canvas
Doublure et intérieur textile
Semelle extérieure caoutchouc");
        $manager->persist($produitType);
        $manager->flush();
    }
}
