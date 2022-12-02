@extends('front.layout.master')

@section('title', 'new_pass')

@section('body')
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text">
          <a href="#"><i class="fa fa-home">Trang chủ</i></a>
          <span>Đăng nhập</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
  <div class="container">
    <div>
      @if (session()->has('message'))
      <div class="alert alert-success">
        {!! session()->get('message') !!}
      </div>
      @elseif (session()->has('error'))
      <div class="alert alert-success">
        {!! session()->get('error') !!}
      </div>
      @endif
    </div>
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="login-form">
          @php
          $token = $_GET['token'];
          $email = $_GET['email'];
          @endphp
          <h2>Điền mật khẩu mới</h2>
          <form action="./account/reset_newpass" method="post">
            @csrf
            <div class="group-input">
              <input type="hidden" name="email_account" value="{{$email}}">
              <input type="hidden" name="token" value="{{$token}} ">
              <input type="text" id="newpass" name="password" placeholder="Nhập mật khẩu mới ...">
            </div>
            <button type="submit" class="site-btn">Gửi</button>
          </form>
          <div class="switch-login">
            <a href="./account/register" class="or-login">Tạo tài khoản</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Register Section End -->
@endsection