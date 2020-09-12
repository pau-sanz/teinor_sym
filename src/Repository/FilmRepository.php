<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Film|null find($id, $lockMode = null, $lockVersion = null)
 * @method Film|null findOneBy(array $criteria, array $orderBy = null)
 * @method Film[]    findAll()
 * @method Film[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

    public function findAllFilms(): Array
    {
        return $this->createQueryBuilder('f')
            ->orderBy('f.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findFilmByTitle(string $title): Array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.title LIKE :title')
            ->setParameter('title', '%'.$title.'%')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findFilmByYear(string $year): Array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.year = :year')
            ->setParameter('year', $year."-01-01")
            ->getQuery()
            ->getResult()
            ;
    }
}
