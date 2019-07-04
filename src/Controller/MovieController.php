<?php

namespace App\Controller;

use App\Repository\MovieRepository;
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

}
