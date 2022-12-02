<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  private $productService;
  private $productCategoryService;

  public function __construct(ProductServiceInterface $productService, ProductCategoryServiceInterface $productCategoryService)
  {
    $this->productService = $productService;
    $this->productCategoryService = $productCategoryService;
  }

  public function index()
  {
    $featuredProducts = $this->productService->getFeaturedProducts();
    $categories = $this->productCategoryService->all();

    return view('front.index', compact('featuredProducts', 'categories'));
  }

  public function indexContact() {
    $categories = $this->productCategoryService->all();
    return view('front.contact', compact('categories'));
  }

  public function favoriteProducts() {
    $categories = $this->productCategoryService->all();
    return view('front.favorite', compact('categories'));
  }

  public function category($categoryName, Request $request)
  {
    $categories = $this->productCategoryService->all();
    $trademarks = $this->trademarksService->all();

    $products = $this->productService->getProductByCategory($categoryName, $request);
    return view('front.shop.index', compact('products', 'categories', 'trademarks'));
  }
}
