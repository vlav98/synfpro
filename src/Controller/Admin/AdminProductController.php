<?php
namespace App\Controller\Admin;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class AdminProductController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    private $repository;
    
    public function __construct(ProductRepository $repository){
        $this->repository = $repository;
    }
    /**
     * @Route ("/admin", name="admin.product.index")
     * @return Response
     */
    
    public function index(ProductRepository $repository): Response
    {
        $products = $this->repository->findAll();
        return $this->render('admin/product/index.html.twig', compact('products'));
    }

    /**
     * @Route ("/admin/{id}", name="admin.product.edit")
     * @param Product product
     * @return Response
     */

    public function edit(ProductRepository $repository): Response
    {
        return $this->render('admin/product/edit.html.twig', compact('products'));
    }
}