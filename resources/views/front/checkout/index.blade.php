@extends('front.layout.master')

@section('title', 'Cart')

@section('body')
    <!-- Shopping Cart Section Begin -->
    <div class="checkout-section spad">
        <div class="container">
            <form action="" method="post" class="checkout-form">
            @csrf    
            <div class="row">

                @if(Cart::count() > 0)
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="login.html" class="content-btn">Click để đăng nhập</a>
                        </div>
                        <h4>Chi tiết thanh toán</h4>
                        <div class="row">
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">

                            <div class="col-lg-6">
                                <label for="fir">Họ <span>*</span></label>
                                <input name="first_name" type="text" id="fir" value="{{ Auth::user()->name ?? '' }}" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Tên <span>*</span></label>
                                <input name="last_name" type="text" id="last" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Tên công ty (có thể bỏ trống)</label>
                                <input name="company_name" type="text" id="cun-name" value="{{ Auth::user()->company_name ?? '' }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Đất nước <span>*</span></label>
                                <input name="country" type="text" id="cun" value="{{ Auth::user()->country ?? '' }}" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Địa chỉ <span>*</span></label>
                                <input name="street_address" type="text" id="street" class="street-first" value="{{ Auth::user()->street_address ?? '' }}" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Mã bưu điện / ZIP (có thể bỏ trống)</label>
                                <input name="postcode_zip" type="text" id="zip" value="{{ Auth::user()->postcode_zip ?? '' }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Tỉnh / Thành phố <span>*</span></label>
                                <input name="town_city" type="text" id="town" value="{{ Auth::user()->town_city ?? '' }}" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Địa chỉ email <span>*</span></label>
                                <input name="email" type="text" id="email" value="{{ Auth::user()->email ?? '' }}" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Số điện thoại <span>*</span></label>
                                <input name="phone" type="text" id="phone" value="{{ Auth::user()->phone ?? '' }}" required>
                            </div>                  
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Nhập mã giảm giá của bạn">
                        </div>
                        <div class="place-order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Sản phẩm <span>Tổng</span></li>

                                    @foreach($carts as $cart)
                                        <li class="fw-normal">
                                            {{ $cart->name }} x {{ $cart->qty }}
                                            <span>{{ $cart->price * $cart->qty }} VNĐ</span>
                                        </li>
                                    @endforeach
                                    <li class="fw-normal">Thành tiền <span>{{ $subtotal }} VNĐ</span></li>
                                    <li class="total-price">Tổng <span>{{ $total }} VNĐ</span></li>
                                </ul>

                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            COD
                                            <input name="payment_type" value="pay_later" type="radio"  id="pc-check" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-payal">
                                            Thanh toán online
                                            <input name="payment_type" value="online_payment" type="radio"  id="pc-payal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">ĐẶT HÀNG</button>
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
            </form>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
@endsection