<?php




namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        $articles = [new Article(0, "pommes"), new Article(1, "poires"), new Article(2, "pêches")];
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController', 'articles' => $articles,
        ]);
    }


    /**
     * @Route("/article/{id}", name="article_detail") */
    public function getArticle($id)
    {
        $articles = [new Article(0, 'pommes'), new Article(1, 'poires'), new Article(2, 'pêches')];
        $article = $articles[$id];
        return $this->render('article/detail.html.twig', [
            'controller_name' => 'ArticleController', 'article' => $article,
        ]);



        try {
            $article = $articles[$id];
            return $this->render('article/detail.html.twig', [
                'controller_name' => 'ArticleController',
                'article' => $article,
            ]);
        } catch (\ErrorException $e) {
            return $this->render('article/index.html.twig', [
                'controller_name' => 'ArticleController',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
