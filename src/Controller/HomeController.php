<?php
namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController {

    /**
     * HomeController constructor.
     * @Route("/", name="home")
     * @var Environment $twig
     */
    private $twig;

    public function __construct(Environment $twig){
        $this->twig = $twig;
    }

    /**
     * @param ProductRepository $repository
     * @return Response
     * @Route("/", name="home")
     */
    public function index(ProductRepository $repository): Response
    {
        $products = $repository->findLatest();
        return $this->render('pages/home.html.twig', [
            'products' => $products, 'current_menu' => 'home'
        ]);
    }

    public function show(ProductRepository $repository): Response
    {
        $products = $repository->findLatest();
        return $this->render('pages/home.html.twig', [
            'products' => $products, 'current_menu' => 'home'
        ]);
    }
}

