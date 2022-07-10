<?php

namespace App\Repository;

use App\Entity\ImageImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageImage[]    findAll()
 * @method ImageImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageImage::class);
    }

    // /**
    //  * @return ImageImage[] Returns an array of ImageImage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageImage
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
