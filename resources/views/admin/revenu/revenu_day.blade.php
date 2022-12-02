@extends('admin.layout.master')

@section('title', 'revenu')

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
          Doanh thu theo ngày
          <div class="page-title-subheading">
            <!-- Xem chi tiết, tạo mới, cập nhật, xóa và quản lý. -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">    
            <br>
            <div class="table-responsive">
              <table class="table table-bordered center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Đơn hàng ngày</th>
                    <th>Số lượng đơn hàng</th>
                    <th>Số sản phẩm</th>
                    <th>Doanh thu ngày</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($Revenus as $Revenu)
                  <tr>
                    <th> {{$Revenu->day}}</th>
                    <th> x </th>
                    <th>{{$Revenu->quantity}}</th>
                    <th>{{number_format($Revenu->Total)}} VNĐ</th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$Revenus->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main -->

  @endsection