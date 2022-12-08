@extends('front.layout.master')

@section('title', 'edit')

@section('body')
<!-- Shopping Cart Section Begin -->
<div class="checkout-section spad">
  <div class="container">
    <form action="account/my-contact/contactuser/{{ Auth::user()->id }}" method="post" class="checkout-form" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="d-flex justify-content-center">
        <div class="col-lg-6">
          <h4>Thông tin cá nhân</h4>
          <div class="row">
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">

            <div class="col-lg-12">
              <label for="fir">Họ và tên</label>
              <input name="first_name" type="text" id="fir" value="{{ Auth::user()->name ?? '' }}">
            </div>
            <div class="col-lg-12">
              <label for="cun-name">Tên công ty</label>
              <input name="company_name" type="text" id="cun-name" value="{{ Auth::user()->company_name ?? '' }}">
            </div>
            <div class="col-lg-12">
              <label for="cun">Đất nước</label>
              <input name="country" type="text" id="cun" value="{{ Auth::user()->country ?? '' }}">
            </div>
            <div class="col-lg-12">
              <label for="street">Địa chỉ</label>
              <input name="street_address" type="text" id="street" class="street-first" value="{{ Auth::user()->street_address ?? '' }}">
            </div>
            <div class="col-lg-12">
              <label for="zip">Mã bưu điện / ZIP</label>
              <input name="postcode_zip" type="text" id="zip" value="{{ Auth::user()->postcode_zip ?? '' }}">
            </div>
            <div class="col-lg-12">
              <label for="town">Tỉnh / Thành phố</label>
              <input name="town_city" type="text" id="town" value="{{ Auth::user()->town_city ?? '' }}">
            </div>
            <div class="col-lg-6">
              <label for="email">Địa chỉ email</label>
              <input name="email" type="text" id="email" value="{{ Auth::user()->email ?? '' }}">
            </div>
            <div class="col-lg-6">
              <label for="phone">Số điện thoại</label>
              <input name="phone" type="text" id="phone" value="{{ Auth::user()->phone ?? '' }}">
            </div>
            <div class="col-lg-6 d-flex justify-content-end mb-3">
              <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                <span class="btn-icon-wrapper pr-2 opacity-8">
                  <i class="fa fa-download fa-w-20"></i>
                </span>
                <span>Lưu</span>
              </button>
            </div>
            <div class="col-lg-6 d-flex align-items-center mb-3">
              <a href="account/my-contact/contactuser/{{ Auth::user()->id }}" class="border-0 btn btn-outline-danger mr-1">
                <span class="btn-icon-wrapper pr-1 opacity-8">
                  <i class="fa fa-times fa-w-20"></i>
                </span>
                <span>Hủy</span>
              </a>
            </div>
          </div>
        </div>
    </form>
  </div>
</div>
<!-- Shopping Cart Section End -->
@endsection