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
    public function home(): Response
    {   // Je fait appelle à Doctrine 
        $repo = $this->getDoctrine()->getRepository(Article::class);

        // Récupère tout les articles
        $articles = $repo->findAll();



        return $this->render("home/index.html.twig", [
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/show/{id}", name="show")
     */
    public function show($id): Response
    {   // Je fait appelle à Doctrine 
        $repo = $this->getDoctrine()->getRepository(Article::class);

        // Récupère un seul article
        $article = $repo->find($id);



        return $this->render("show/index.html.twig", [
            'article' => $article,
        ]);
    }
}
