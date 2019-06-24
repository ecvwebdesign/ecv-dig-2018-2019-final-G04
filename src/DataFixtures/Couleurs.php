<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Couleurs extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Bleu");
        $manager->persist($couleur);
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Noir");
        $manager->persist($couleur);
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Blanc");
        $manager->persist($couleur);
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Rouge");
        $manager->persist($couleur);
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Vert");
        $manager->persist($couleur);
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Orange");
        $manager->persist($couleur);
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Jaune");
        $manager->persist($couleur);
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Gris");
        $manager->persist($couleur);
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Violet");
        $manager->persist($couleur);
        $couleur = new \App\Entity\Couleurs();
        $couleur->setLibelle("Rose");
        $manager->persist($couleur);
        $manager->flush();
    }
}
