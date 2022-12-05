<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailService;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
  private $orderService;
  private $orderDetailService;

  public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService, ProductCategoryServiceInterface $productCategoryService)
  {
    $this->orderService = $orderService;
    $this->orderDetailService = $orderDetailService;
    $this->productCategoryService = $productCategoryService;
  }

  public function index()
  {
    $carts = Cart::content();
    $total = Cart::total();
    $categories = $this->productCategoryService->all();
    $subtotal = Cart::subtotal();

    return view('front.checkout.index', compact('carts', 'total', 'subtotal', 'categories'));
  }

  public function addOrder(Request $request)
  {
    //01. Thêm đơn hàng
    $data = $request->all();
    $data['status'] = Constant::order_status_ReceiveOrders;
    $order =  $this->orderService->create($data);

    //02. Thêm chi tiết đơn hàng
    $carts = Cart::content();

    foreach ($carts as $cart) {
      $data = [
        'order_id' => $order->id,
        'product_id' => $cart->id,
        'qty' => $cart->qty,
        'price' => $cart->price,
        'total' => $cart->qty * $cart->price,
        'product_detail_id' => $cart->options->colorProduct->id
      ];

      $this->orderDetailService->create($data);
    }

    if ($request->payment_type == 'pay_later') {
      //Gửi email:
      $total = Cart::total();
      $subtotal = Cart::subtotal();
      $this->sendEmail($order, $total, $subtotal); //gọi hàm xử lý email đã định nghĩa

      //03. Xóa giỏ hàng
      Cart::destroy();

      //04. Trả về kết quả thông báo
      return redirect('checkout/result')
        ->with('notification', 'Đặt hàng thành công! Bạn sẽ thanh toán khi nhận hàng. Vui lòng kiểm tra email của bạn.');
    }

    if ($request->payment_type == 'online_payment') {
      //01. Lấy URL thanh toán VNPay
      $data_url = VNPay::vnpay_create_payment([
        'vnp_TxnRef' => $order->id, //ID của đơn hàng
        'vnp_OrderInfo' => 'Mô tả',
        'vnp_Amount' => Cart::total(0, '', ''), //Tổng giá của đơn hàng
      ]);

      //02. CHuyển hướng tới URL lấy được
      return redirect()->to($data_url);
    }
  }

  public function vnPayCheck(Request $request)
  {
    //01. Lấy data từ URL (do VNPay gửi về qua $vnp_Returnurl)
    $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Mã phản hồi kết quả thanh toán. 00= thành công
    $vnp_TxnRef = $request->get('vnp_TxnRef'); //order_id
    $vnp_Amount = $request->get('vnp_Amount'); //Số tiền thanh toán

    //02. Kiểm tra data, xem kết quả giáo dịch trả về từ VNPay hợp lệ không:
    if ($vnp_ResponseCode != null) {
      //Nếu kết quả thành công:
      if ($vnp_ResponseCode == 00) {
        //Cập nhật trạng thái Order:
        $this->orderService->update([
          'status' => Constant::order_status_Paid,
        ], $vnp_TxnRef);

        //Gửi email:
        $order = $this->orderService->find($vnp_TxnRef);
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $this->sendEmail($order, $total, $subtotal); //gọi hàm xử lý email đã định nghĩa

        //Xóa giỏ hàng
        Cart::destroy();

        //Thông báo kết quả
        return redirect('checkout/result')->with('notification', 'Đặt hàng thành công! Bạn đã thanh toán trực tuyến. Vui lòng kiểm tra email của bạn');
      } else {
        //Nếu không thành công
        //Xóa đơn hàng dã thêm vào database
        $this->orderService->delete($vnp_TxnRef);

        //Thông báo lỗi
        return redirect('checkout/result')->with('notification', 'ERROR! Thanh toán không thành công hoặc bị hủy.');
      }
    }
  }

  public function result()
  {
    $notification = session('notification');
    $categories = $this->productCategoryService->all();
    return view('front.checkout.result', compact('notification', 'categories'));
  }

  private function sendEmail($order, $total, $subtotal)
  {
    $email_to = $order->email;

    Mail::send(
      'front.checkout.email',
      compact('order', 'total', 'subtotal'),
      function ($message) use ($email_to) {
        $message->from('electronicstorek64cnpm@gmail.com', 'Electronicstore');
        $message->to($email_to, $email_to);
        $message->subject('Thông báo đặt hàng');
      }
    );
  }
}
