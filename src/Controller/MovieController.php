<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends ApiController
{
  /**
   * @Route("/movie", methods="GET")
   */
  public function index(MovieRepository $movieRepository)
  {
    $movies = $movieRepository->transformAll();

    return $this->respond($movies);
  }

  /**
   * @Route("/movie", methods="POST")
   */
  public function create(Request $request, MovieRepository $movieRepository, EntityManagerInterface $em)
  {
    $request = json_decode($request->getContent(), true);

    // todo: error handling

    $movie = new Movie();
    $movie->setTitle($request['title']);
    $movie->setCount(0);
    $em->persist($movie);
    $em->flush();

    return $this->respondCreated($movieRepository->transform($movie));
  }

}
