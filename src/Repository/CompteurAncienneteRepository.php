<?php

namespace App\Repository;

use App\Entity\CompteurAnciennete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompteurAnciennete>
 *
 * @method CompteurAnciennete|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompteurAnciennete|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompteurAnciennete[]    findAll()
 * @method CompteurAnciennete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteurAncienneteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompteurAnciennete::class);
    }

    public function add(CompteurAnciennete $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CompteurAnciennete $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CompteurAnciennete[] Returns an array of CompteurAnciennete objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CompteurAnciennete
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
