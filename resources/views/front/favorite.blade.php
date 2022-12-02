@extends('front.layout.master')

@section('title', 'Favorite')

@section('body')
<!-- -->
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text">
          <a href="#"><i class="fa fa-home">Trang chủ</i></a>
          <span>Sản phẩm yêu thích</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Section End -->

<div class="container">
  <button type="button" 
          onclick="if(confirm('Bạn có muốn xóa các sản phẩm đã yêu thích?') === true) 
            {
              localStorage.setItem('data', '[]');
              location.reload();
            }" 
          style="float: right;" class="btn btn-danger mt-2">
            Xóa tất cả
  </button>
</div>

<!-- Shopping Cart Section Begin -->
<section class="product-shop spad">
  <div class="container">
    <div class="product-list">
      <div class="row" id="favorite">

      </div>
    </div>
  </div>
</section>
<!-- Shopping Cart Section End -->

@endsection