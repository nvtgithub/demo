@extends('front.layout.master')

@section('title', 'Cart')

@section('body')
<!-- Shopping Cart Section Begin -->
<div class="shopping-cart spad">
  <div class="container">
    <div class="row">

      @if(Cart::count() > 0)
      <div class="col-lg-12">
        <div class="cart-table">
          <table>
            <thead>
              <tr>
                <th>Hình ảnh</th>
                <th class="p-name text-center">Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>
                  <i onclick="confirm('Bạn có muốn xóa toàn bộ sản phẩm trong giỏ hàng?') === true ? destroyCart() : ''" style="cursor: poiter" class="ti-close"></i>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($carts as $cart)
              <tr data-rowid="{{ $cart->rowId }}">
                <td class="cart-pic first-row">
                  <img width="100%" src="front/img/products/{{ $cart->options->images[0]->path }}" alt="">
                </td>
                <td class="cart-title first-row text-center">
                  <h5>{{ $cart->name }} {{ $cart->color }}</h5>
                </td>
                <td class="p-price first-row">{{ number_format($cart->price) }} VNĐ</td>
                <td class="qua-col first-row">
                  <div class="quantity">
                    <div class="pro-qty">
                      <input type="text" value="{{ $cart->qty }}" data-rowId="{{ $cart->rowId }}">
                    </div>
                  </div>
                </td>
                <td class="total-price first-row">{{ number_format($cart->price) }} VNĐ</td>
                <td class="close-td first-row">
                  <i onclick="removeCart('{{ $cart->rowId }}')" class="ti-close"></i>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="discount-coupon">
              <h6>Mã giảm giá</h6>
              <form action="#" class="coupon-form">
                <input type="text" placeholder="Nhập mã giảm giá">
                <button type="submit" class="site-btn coupon-btn">Áp dụng</button>
              </form>
            </div>
          </div>
          <div class="col-lg-4 offset-lg-4">
            <div class="proceed-checkout">
              <ul>
                <li class="subtotal">Thành tiền <span>{{ $total }}</span></li>
                <li class="cart-total">Tổng tiền <span>{{ $subtotal }}</span></li>
              </ul>
              <a href="./checkout" class="proceed-btn">Tiến hành thanh toán</a>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="col-lg-12">
        <h4>Giỏ hàng trống!</h4>
      </div>
      @endif

    </div>
  </div>
</div>
<!-- Shopping Cart Section End -->

@endsection