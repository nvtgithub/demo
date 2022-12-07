@extends('admin.layout.master')

@section('title', 'Order')

@section('body')
<!-- Main -->
<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
        </div>
        <div>
          Order
          <div class="page-title-subheading">
            Xem chi tiết, tạo mới, cập nhật, xóa và quản lý.
          </div>
        </div>
      </div>

    </div>
  </div>

  <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
    <li class="nav-item">
      <a href="./admin/order" class="nav-link">
        <span class="btn-icon-wrapper pr-2 opacity-8">
          <i class="fa fa-chevron-circle-left"></i>
        </span>
        <span>Quay lại</span>
      </a>
    </li>
  </ul>

  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-body display_data">

          <div class="table-responsive">
            <h2 class="text-center">Danh sách sản phẩm</h2>
            <hr>
            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
              <thead>
                <tr>
                  <th>Sản phẩm</th>
                  <th>Màu sắc</th>
                  <th>Tên màu</th>
                  <th class="text-center">Số lượng</th>
                  <th class="text-center">Giá sản phẩm</th>
                  <th class="text-center">Tổng tiền</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order->orderDetails as $orderDetail)
                <tr>
                  <td>
                    <div class="widget-content p-0">
                      <div class="widget-content-wrapper">
                        <div class="widget-content-left mr-3">
                          <div class="widget-content-left">
                            <img style="height: 60px;" data-toggle="tooltip" title="Image" data-placement="bottom" src="front/img/products/{{ $orderDetail->product->productImages[0]->path }}" alt="">
                          </div>
                        </div>
                        <div class="widget-content-left flex2">
                          <div class="widget-heading">{{ $orderDetail->product->name }}</div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="box-color" style="width: 50px;
                            height: 20px;
                            background: {{$orderDetail->productDetail->color_code}}">
                    </div>
                  </td>
                  <td>
                    {{ $orderDetail->productDetail->color }}
                  </td>
                  <td class="text-center">
                    {{ $orderDetail->qty }}
                  </td>
                  <td class="text-center">{{ number_format($orderDetail->price,0, '.', '.' ) }} VNĐ</td>
                  <td class="text-center">
                    {{ number_format($orderDetail->total,0, '.', '.' )}} VNĐ
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <h2 class="text-center mt-5">Thông tin khách hàng</h2>
          <hr>
          <div class="position-relative row form-group">
            <label for="name" class="col-md-3 text-md-right col-form-label">
              Họ và tên
            </label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->first_name . ' ' . $order->last_name}}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->email }}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->phone }}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="company_name" class="col-md-3 text-md-right col-form-label">
              Tên công ty
            </label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->company_name }}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="street_address" class="col-md-3 text-md-right col-form-label">
              Địa chỉ</label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->street_address }}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="town_city" class="col-md-3 text-md-right col-form-label">
              Tỉnh/ Thành Phố</label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->town_city }}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="country" class="col-md-3 text-md-right col-form-label">Đất nước</label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->country }}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
              Mã bưu điện</label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->postcode_zip }}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="payment_type" class="col-md-3 text-md-right col-form-label">Phương thức thanh toán</label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->payment_type }}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="payment_type" class="col-md-3 text-md-right col-form-label">Ngày đặt hàng</label>
            <div class="col-md-9 col-xl-8">
              <p>{{ DATE_FORMAT($order->created_at, 'd-m-Y H:i:s') }}</p>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="status" class="col-md-3 text-md-right col-form-label">Tình trạng đơn hàng</label>
            <div class="col-md-9 col-xl-8">
              <div class="badge badge-dark mt-2">
                <form action="admin/order/{{$order->id}}" method="post">
                  @csrf
                  @method('PUT')
                  <select required name="status" id="status" class="badge badge-dark">
                    @foreach (\App\Utilities\Constant::$order_status as $key => $order_status)
                    <option value="{{$key}}" {{$key == $order->status? 'selected' : ''}}>{{ $order_status}}</option>
                    @endforeach
                  </select>

                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>

              </div>
            </div>
          </div>

          <div class="position-relative row form-group">
            <label for="description" class="col-md-3 text-md-right col-form-label">Mô tả</label>
            <div class="col-md-9 col-xl-8">
              <p>{{ $order->description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Main -->
@endsection