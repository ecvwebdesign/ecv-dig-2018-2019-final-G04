<?php

namespace App\Repository;

use App\Entity\CommandeAdresses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommandeAdresses|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandeAdresses|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandeAdresses[]    findAll()
 * @method CommandeAdresses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeAdressesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommandeAdresses::class);
    }

    // /**
    //  * @return CommandeAdresses[] Returns an array of CommandeAdresses objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommandeAdresses
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
