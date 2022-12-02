<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\Trademarks\TrademarksService;
use App\Services\Trademarks\TrademarksServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

  private $productService;
  private $trademarksService;
  private $productCategoryService;

  public function __construct(ProductServiceInterface $productService, TrademarksServiceInterface $trademarksService, ProductCategoryServiceInterface $productCategoryService)
  {
    $this->productService = $productService;
    $this->trademarksService = $trademarksService;
    $this->productCategoryService = $productCategoryService;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $products = $this->productService->searchAndPaginate('name', $request->get('search'));
    return view('admin.product.index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $trademarks = $this->trademarksService->all();
    $productCategories = $this->productCategoryService->all();
    return view('admin.product.create', compact('trademarks', 'productCategories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $nameProducts = DB::table('products')->pluck('name');

    foreach($nameProducts as $nameProduct)
    {
        if($nameProduct == $request->get('name'))
        {
          return back()
          ->with('notification', 'ERROR: Sản phẩm này đã tồn tại!');
        }
    }

    $data = $request->all();
    $data['qty'] = 0; //Khi tạo mới sản phẩm, số lượng = 0
    $product = $this->productService->create($data);
    return redirect('admin/product/' . $product->id);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $product = $this->productService->find($id);
    return view('admin.product.show', compact('product'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $product = $this->productService->find($id);

    $trademarks = $this->trademarksService->all();
    $productCategories = $this->productCategoryService->all();
    
    return view('admin.product.edit', compact('product', 'trademarks', 'productCategories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $data = $request->all();
    $this->productService->update($data, $id);

    return redirect('admin/product/' . $id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
     $this->productService->delete($id);
     
     return redirect('admin/product');
  }
}
