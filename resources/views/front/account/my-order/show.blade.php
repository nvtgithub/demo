@extends('front.layout.master')

@section('title', 'Order Detail')

@section('body')
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text">
          <a href="#"><i class="fa fa-home">Trang chủ</i></a>
          <span>Đơn hàng của tôi</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Section End -->

<!-- My Order Section Begin -->
<section class="shopping-cart spad">
  <div class="container">
    <form action="" class="checkout-form">
      <div class="row">
        <div class="col-lg-6">
          <div class="checkout-content">
            <a href="" class="content-btn">
              Mã đơn hàng:
              <b>#{{ $order->id }}</b>
            </a>
          </div>
          <h4>Chi tiết đơn hàng</h4>
          <div class="row">
            <div class="col-lg-6">
              <label for="fir">Họ</label>
              <input type="text" id="fir" disabled value="{{ $order->first_name }}">
            </div>
            <div class="col-lg-6">
              <label for="last">Tên</label>
              <input type="text" id="last" disabled value="{{ $order->last_name }}">
            </div>
            <div class="col-lg-12">
              <label for="cun-name">Tên công ty</label>
              <input type="text" id="cun" disabled value="{{ $order->company_name }}">
            </div>
            <div class="col-lg-12">
              <label for="street">Địa chỉ</label>
              <input type="text" id="street" class="street-first" disabled value="{{ $order->street_address }}">
            </div>
            <div class="col-lg-12">
              <label for="zip">Mã bưu điện (có thể bỏ trống)</label>
              <input type="text" id="zip" disabled value="{{ $order->postcode_zip }}">
            </div>
            <div class="col-lg-12">
              <label for="town">Tỉnh / Thành phố</label>
              <input type="text" id="town" disabled value="{{ $order->town_city }}">
            </div>
            <div class="col-lg-6">
              <label for="email">Email</label>
              <input type="email" id="email" disabled value="{{ $order->email }}">
            </div>
            <div class="col-lg-6">
              <label for="phone">Số điện thoại</label>
              <input type="text" id="phone" disabled value="{{ $order->phone }}">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="checkout-content">
            <a href="#" class="content-btn">
              Trạng thái:
              <b>{{ \App\Utilities\Constant::$order_status[$order->status] }}</b>
            </a>
          </div>
          <div class="place-order">
            <h4>Đơn hàng của bạn</h4>
            <div class="order-total">
              <ul class="order-table">
                <li>Sản phẩm <span>Tổng tiền</span></li>

                @foreach($order->orderDetails as $orderDetail)
                <li class="fw-normal">
                  {{ $orderDetail->product->name }} x {{ $orderDetail->qty}}
                  <span>{{ number_format($orderDetail->total) }} VNĐ</span>
                </li>
                @endforeach

                <li class="total-price">
                  Tổng giá trị đơn hàng
                  <span>{{ number_format(array_sum(array_column($order->orderDetails->toArray(), 'total'))) }} VNĐ</span>
                </li>
              </ul>
              <div class="payment-check">
                <div class="pc-item">
                  <label for="pc-check">
                    COD
                    <input disabled type="radio" name="payment_type" value="pay_later" id="pc-check" {{ $order->payment_type == 'pay_later' ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="pc-item">
                  <label for="pc-check">
                    Thanh toán online
                    <input disabled type="radio" name="payment_type" value="online_payment" id="pc-paypal" {{ $order->payment_type == 'online_payment' ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection