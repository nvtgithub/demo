@extends('front.layout.master')

@section('title', 'My Order')

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
    <div class="row">
      <div class="col-lg-12">
        <div class="cart-table">
          <table>
            <thead>
              <tr>
                <th>Hình ảnh</th>
                <th>Id</th>
                <th>Sản phẩm</th>
                <th>Tổng tiền</th>
                <th>Chi tiết sản phẩm</th>
              </tr>
            </thead>
            <tbody>

              @foreach($orders as $order)
              <tr>
                <td class="cart-pic first-row">
                  <img style="max-width: 100px; margin: auto;" src="front/img/products/{{ $order->orderDetails[0]->product->productImages[0]->path }}" alt="">
                </td>
                <td class="first-row">{{ $order->id }}</td>
                <td class="cart-title first-row">
                  <h5>
                    {{ $order->orderDetails[0]->product->name }}

                    @if(count($order->orderDetails) > 1)
                    (and {{ count($order->orderDetails)}} orther product)
                    @endif

                  </h5>
                </td>
                <td class="total-price first-row">
                  {{ number_format(array_sum(array_column($order->orderDetails->toArray(), 'total'))) }} VNĐ
                </td>
                <td class="first-row">
                  <a class="btn" href="./account/my-order/{{ $order->id }}">Chi tiết</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection