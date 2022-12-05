<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\LogglyHandler;

class ProductDetailController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $product  = $this->productService->find($product_id);
        $productDetails = $product->productDetails;

        return view('admin.product.detail.index', compact('product', 'productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product = $this->productService->find($product_id);

        return view('admin.product.detail.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $productDetail = ProductDetail::where('product_id', $request->input('product_id'))
            ->where('color',  $request->input('color'))
            ->where('color_code',  $request->input('color_code'))
            ->first();
        if ($productDetail) {
            $productDetail->qty += $request->input('qty');
            $productDetail->save();
        } else {
            $data = $request->all();
            ProductDetail::create($data);
        }

        $this->updateQty($product_id);

        return redirect('admin/product/' . $product_id . '/detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id, $product_detail_id)
    {
        $product = $this->productService->find($product_id);

        $productDetail = ProductDetail::find($product_detail_id);

        return view('admin.product.detail.edit', compact('product', 'productDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $product_detail_id)
    {
        $productDetail = ProductDetail::find($product_detail_id);
        if (!$productDetail) {
            return redirect('admin/product/' . $product_id . '/detail')->with('notification', 'ERROR! Không tìm thấy màu sản phẩm.');
        }
        $productDetails = ProductDetail::where('product_id', $product_id)
            ->where('color',  $request->input('color'))
            ->where('color_code',  $request->input('color_code'))
            ->where('id', '<>', $product_detail_id)->get();
        if (count($productDetails) > 0) {
            $totalQty = array_sum(array_column($productDetails->toArray(), 'qty'));
            $productDetail->color = $request->input('color');
            $productDetail->color_code = $request->input('color_code');
            $productDetail->qty = $totalQty + $request->input('qty');
            $productDetail->save();

            foreach ($productDetails as $detail) {
                $detail->delete();
            }
        } else {
            $data = $request->all();
            $productDetail->update($data);
        }

        $this->updateQty($product_id);

        return redirect('admin/product/' . $product_id . '/detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $product_detail_id)
    {
        ProductDetail::find($product_detail_id)->delete();
        $this->updateQty($product_id);

        return redirect('admin/product/' . $product_id . '/detail');
    }

    //Commmon method
    public function updateQty($product_id)
    {
        $product = $this->productService->find($product_id);

        $productDetails = $product->productDetails;

        $totalQty = array_sum(array_column($productDetails->toArray(), 'qty'));

        $this->productService->update(['qty' => $totalQty], $product_id );


    }
}
