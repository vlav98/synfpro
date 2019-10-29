<?php
namespace App\Controller;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class ProductsController extends AbstractController
{
    private $repository;
    
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/products", name="products.index")
     * @return Response
     */
    
    public function index(ProductRepository $repository): Response
    {
        $products = $this->repository->findAll();
        return $this->render('products/products.html.twig', [
            'current_menu' => 'products'
        ]);
    }

    /**
     * @Route("/products/{slug}-{id}", name="product.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Product $product
     * @return Response
     */

    public function show(Product $product, string $slug): Response
    {
        if($product->getSlug() != $slug){
            return $this->redirectToRoute('product.show', [
                'id' =>  $product->getId(),
                'slug' => $product->getSlug()
            ], 301);
        }
        return $this->render('products/show.html.twig', [
            'product' => $product,
            'current_menu' => 'products'
        ]);
    }
}