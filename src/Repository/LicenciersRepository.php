<?php

namespace App\Repository;

use App\Entity\Licenciers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Licenciers>
 *
 * @method Licenciers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Licenciers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Licenciers[]    findAll()
 * @method Licenciers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LicenciersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Licenciers::class);
    }

//    /**
//     * @return Licenciers[] Returns an array of Licenciers objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Licenciers
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
