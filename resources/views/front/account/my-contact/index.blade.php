@extends('front.layout.master')

@section('title', 'My contact')

@section('body')
<!-- Shopping Cart Section Begin -->
<div class="checkout-section spad">
  <div class="container">
    <form method="" class="edit-profile">
      <div class="d-flex justify-content-center">

        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">
        <fieldset id="users-profile-core" class="com-users-profile__core">
          <legend>Thông tin cá nhân</legend>
          <dl class="dl-horizontal row">
            <dt class="col-sm-3"> Họ và tên </dt>
            <dd class="col-sm-9"> {{ Auth::user()->name ?? '' }} </dd>
            <dt class="col-sm-3">Tên công ty</dt>
            <dd class="col-sm-9">{{ Auth::user()->company_name ?? '' }}</dd>
            <dt class="col-sm-3">Đất nước</dt>
            <dd class="col-sm-9">{{ Auth::user()->country ?? '' }}</dd>
            <dt class="col-sm-3">Địa chỉ</dt>
            <dd class="col-sm-9">{{ Auth::user()->street_address ?? '' }}</dd>
            <dt class="col-sm-3">Mã bưu điện / ZIP</dt>
            <dd class="col-sm-9">{{ Auth::user()->postcode_zip ?? '' }}</dd>
            <dt class="col-sm-3">Tỉnh / Thành phố</dt>
            <dd class="col-sm-9">{{ Auth::user()->town_city ?? '' }}</dd>
            <dt class="col-sm-3">Địa chỉ email</dt>
            <dd class="col-sm-9">{{ Auth::user()->email ?? '' }}</dd>
            <dt class="col-sm-3">Số điện thoại</dt>
            <dd class="col-sm-9">{{ Auth::user()->phone ?? '' }}</dd>
          </dl>
          <div class="btn-edit-profile">
            <div class="order-btn">
              <a href="/account/my-contact/contactuser/{{ Auth::user()->id }}/edit" class="site-btn place-btn">CHỈNH SỬA THÔNG TIN CÁ NHÂN</a>
            </div>
          </div>
        </fieldset>
      </div>
    </form>
  </div>
</div>
<!-- Shopping Cart Section End -->
@endsection