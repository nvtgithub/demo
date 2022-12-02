<?php

namespace App\Repositories\Product;


use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getRelatedProducts($product, $limit = 4);
    public function getFeatureProductByCategory(int $categoryId);
    public function getProductOnIndex($request);
    public function getProductByCategory($categoryName, $request);
}
