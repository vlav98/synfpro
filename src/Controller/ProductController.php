<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController {
    /**
     * @Route("/products", name="products.index")
     * @return Response
     */
    public function index(): Response{
        return $this->render('products/index.html.twig');
    }
}