<?php
namespace App\Controller;

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

    public function index(): Response{
        return $this->render('pages/home.html.twig');
    }
}

