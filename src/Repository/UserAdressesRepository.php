<?php

namespace App\Repository;

use App\Entity\UserAdresses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserAdresses|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAdresses|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAdresses[]    findAll()
 * @method UserAdresses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserAdressesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserAdresses::class);
    }

    // /**
    //  * @return UserAdresses[] Returns an array of UserAdresses objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserAdresses
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
