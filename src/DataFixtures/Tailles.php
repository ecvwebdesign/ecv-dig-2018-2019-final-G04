<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Tailles extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 35");
        $taille->setShort("35");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 36");
        $taille->setShort("36");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 37");
        $taille->setShort("37");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 38");
        $taille->setShort("38");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 39");
        $taille->setShort("39");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 40");
        $taille->setShort("40");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 41");
        $taille->setShort("41");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 42");
        $taille->setShort("42");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 43");
        $taille->setShort("43");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 44");
        $taille->setShort("44");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Chaussure - 45");
        $taille->setShort("45");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Vetement - XS");
        $taille->setShort("XS");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Vetement - S");
        $taille->setShort("S");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Vetement - M");
        $taille->setShort("M");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Vetement - L");
        $taille->setShort("L");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Vetement - XL");
        $taille->setShort("XL");
        $manager->persist($taille);
        $taille = new \App\Entity\Taille();
        $taille->setLibelle("Vetement - XXL");
        $taille->setShort("XXL");
        $manager->persist($taille);
        $manager->flush();
    }
}
