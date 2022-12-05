<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductDetail;
use App\Services\Order\OrderServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this->orderService->searchAndPaginate('first_name', $request->get('search'));

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderService->find($id);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $order = $this->orderService->find($id);
      return view('admin.order.show', compact('order'));
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
        $order = Order::find($id);
        if (!$order) {
            return redirect('admin/order/'.$id)->with('notification', 'ERROR! Không tìm thấy đơn hàng.');
        }
        if ($request->has('status') && strlen($request->input('status'))) {
            if ($request->input('status') == Constant::order_status_Finish) {
                foreach($order->orderDetails as $orderDetail){
                    $productDetail = ProductDetail::find($orderDetail->product_detail_id);
                    if($productDetail) {
                        $productDetail->qty -= $orderDetail->qty;
                        $productDetail->save();
                    }
                    $product = $productDetail->product;
                    $product->qty -= $orderDetail->qty;
                    $product->save();
                }
            }
        }
      $data = $request->all();
      $this->orderService->update($data, $id);
      return redirect('admin/order/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
