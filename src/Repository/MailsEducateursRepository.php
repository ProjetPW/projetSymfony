<?php

namespace App\Repository;

use App\Entity\MailsEducateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MailsEducateurs>
 *
 * @method MailsEducateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method MailsEducateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method MailsEducateurs[]    findAll()
 * @method MailsEducateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MailsEducateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MailsEducateurs::class);
    }

//    /**
//     * @return MailsEducateurs[] Returns an array of MailsEducateurs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MailsEducateurs
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
