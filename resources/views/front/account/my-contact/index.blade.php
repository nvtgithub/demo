@extends('front.layout.master')

@section('title', 'My contact')

@section('body')
<!-- Shopping Cart Section Begin -->
<div class="checkout-section spad">
    <div class="container">
        <form method="" class="checkout-form">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <h4>Thông tin cá nhân</h4>
                    <div class="row">
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">

                        <div class="col-lg-12">
                            <label for="fir">Họ và tên</label>
                            <input readonly name="first_name" type="text" id="fir" value="{{ Auth::user()->name ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun-name">Tên công ty</label>
                            <input readonly name="company_name" type="text" id="cun-name" value="{{ Auth::user()->company_name ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">Đất nước</label>
                            <input readonly name="country" type="text" id="cun" value="{{ Auth::user()->country ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Địa chỉ</label>
                            <input readonly name="street_address" type="text" id="street" class="street-first" value="{{ Auth::user()->street_address ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Mã bưu điện / ZIP</label>
                            <input readonly name="postcode_zip" type="text" id="zip" value="{{ Auth::user()->postcode_zip ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="town">Tỉnh / Thành phố</label>
                            <input readonly name="town_city" type="text" id="town" value="{{ Auth::user()->town_city ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Địa chỉ email</label>
                            <input readonly name="email" type="text" id="email" value="{{ Auth::user()->email ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Số điện thoại</label>
                            <input readonly name="phone" type="text" id="phone" value="{{ Auth::user()->phone ?? '' }}">
                        </div>
                        <div class="col-lg-12 d-flex justify-content-center mb-3">
                            <div class="order-btn">
                                <a href="/account/my-contact/edit" class="site-btn place-btn">CHỈNH SỬA THÔNG TIN CÁ NHÂN</a>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
<!-- Shopping Cart Section End -->
@endsection