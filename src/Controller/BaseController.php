<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{


    /**
     * @Route("/", name="app_index")
     */
    public function index()
    {


        return $this->render('base.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
