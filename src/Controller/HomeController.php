<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {   // Je fait appelle à Doctrine 
        $repo = $this->getDoctrine()->getRepository(Article::class);

        // Récupère tout les articles
        $articles = $repo->findAll();



        return $this->render("home/index.html.twig", [
            'articles' => $articles,
        ]);
    }
}
