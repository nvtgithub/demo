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
                    Lọc doanh thu
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
                        <h6 class="fw-bold">Lọc doanh thu theo ngày</h6>
                        <form action="">
                            <table id="filter-date" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Từ ngày</span>
                                                <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="date_from" name="from_date">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Đến ngày</span>
                                                <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="date_to" name="to_date">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="input-group mb-3">
                                                <button style="margin: auto;" type="submit" class="btn btn-primary" id="btn_filter_revenus">Lọc</button>
                                            </div>
                                        </th>

                                    </tr>
                                </thead>
                            </table>
                        </form>
                        <p>Tổng doanh thu: 
                            <span id="total_of_filter">
                                <b>{{ number_format($total) }} VNĐ</b>
                            </span>
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Đơn hàng ngày</th>
                                    <th>Số lượng đơn hàng</th>
                                    <th>Số sản phẩm</th>
                                    <th>Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Revenus as $Revenus)
                                <tr>
                                    <th>{{$Revenus->day}}</th>
                                    <th>x</th>
                                    <th>{{$Revenus->quantity}}</th>
                                    <th>{{number_format($Revenus->Total)}} VNĐ</th>
                                </tr>
                                @endforeach                              
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

    @endsection