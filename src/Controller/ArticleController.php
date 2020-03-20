<?php




namespace App\Controller;


use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


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
     * @Route("/fill", name="app_new") 
     */
    public function new(): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $produit1 = new Article();
        $produit2 = new Article();
        $produit3 = new Article();

        $produit1->setLibelle('ROUGE');
        $produit2->setLibelle('BLEU');
        $produit3->setLibelle('VERT');

        $entityManager->persist($produit1);
        $entityManager->persist($produit2);
        $entityManager->persist($produit3);

        $entityManager->flush();

        return new Response('Produit ajouté de couleur ' . $produit1->getLibelle() . ' et ' . $produit2->getLibelle() . ' et ' . $produit3->getLibelle());
        //return new Response('Produit ajouté' . $produit1->getLibelle());

    }


    /**
     * @Route("/all" , name="app_getAll") 
     */
    public function getAll()
    {



        $repository = $this->getDoctrine()->getRepository(Article::class);
        $article = $repository->findAll();
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController', 'article' => $article,
        ]);
    }
}
