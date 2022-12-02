@extends('front.layout.master')

@section('title', 'Contact')

@section('body')
<!-- -->
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text">
          <a href="#"><i class="fa fa-home">Trang chủ</i></a>
          <span>Thông tin</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Section End -->


<!-- Map Section Begin -->
<div class="map spad">
  <div class="container">
    <div class="map-inner">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14898.414840214122!2d105.92858623003993!3d21.008516807558404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a8cfa8c9b137%3A0xd8bc142d32495692!2zVHLDonUgUXXhu7MsIEdpYSBMw6JtLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1669215289641!5m2!1svi!2s"  height="610 " style="border:0; " allowfullscreen=" " loading="lazy " referrerpolicy="no-referrer-when-downgrade ">
      </iframe>
      <div class="icon d-none">
        <i class="fa fa-map-marker"></i>
      </div>
    </div>
  </div>
</div>
<!-- Map Section End -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
  <section class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="contact-title">
          <h4>Liên hệ với chúng tôi</h4>
        </div>
        <div class="contact-widget">
          <div class="cw-item">
            <div class="ci-icon">
              <i class="ti-location-pin"></i>
            </div>
            <div class="ci-text">
              <span>Địa chỉ:</span>
              <p>Trâu Quỳ, Gia Lâm, Hà Nội</p>
            </div>
          </div>
          <div class="cw-item">
            <div class="ci-icon">
              <i class="ti-mobile"></i>
            </div>
            <div class="ci-text">
              <span>Số điện thoại:</span>
              <p>+84 86.58.92.696</p>
            </div>
          </div>
          <div class="cw-item">
            <div class="ci-icon">
              <i class="ti-email"></i>
            </div>
            <div class="ci-text">
              <span>Email:</span>
              <p>electronicStore@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 offset-lg-1">
        <div class="contact-form">
          <div class="leave-comment">
            <h4>Để lại bình luận</h4>
            <p>Nhân viên của chúng tôi sẽ gọi lại sau và trả lời câu hỏi câu hỏi của bạn</p>
            <form action="#" class="comment-form">
              <div class="row">
                <div class="col-lg-6">
                  <input type="text" placeholder="Tên">
                </div>
                <div class="col-lg-6">
                  <input type="text" placeholder="Email">
                </div>
                <div class="col-lg-12">
                  <textarea placeholder="Mời bạn để lại bình luận"></textarea>
                  <button type="submit" class="site-btn">Gửi</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<!-- Contact Section End -->

@endsection
