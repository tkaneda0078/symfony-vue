<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  /**
   * @Route("/home", name="home")
   */
  public function index()
  {
    $words = ['sky', 'cloud', 'breeze'];
    return $this->render('home/index.html.twig', [
        'words' => $words
    ]);
  }
}
