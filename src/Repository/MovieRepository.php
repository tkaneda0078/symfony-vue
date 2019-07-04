<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
  public function __construct(RegistryInterface $registry)
  {
    parent::__construct($registry, Movie::class);
  }

  /**
   * transform entity
   *
   * @param Movie $movie
   * @return array
   */
  public function transform(Movie $movie)
  {
    return [
        'id' => (int)$movie->getId(),
        'title' => (string)$movie->getTitle(),
        'count' => (int)$movie->getCount()
    ];
  }

  public function transformAll()
  {
    $movies = $this->findAll();

    $movieArray = [];
    foreach ($movies as $movie) {
      $movieArray[] = $this->transform($movie);
    }

    return $movieArray;
  }

}
