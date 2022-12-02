@extends('admin.layout.master')

@section('title', 'Product')

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
          Sản phẩm
          <div class="page-title-subheading">
            Xem chi tiết, tạo mới, cập nhật, xóa và quản lý.
          </div>
        </div>
      </div>

      <div class="page-title-actions">
        <a href="./admin/product/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
          <span class="btn-icon-wrapper pr-2 opacity-7">
            <i class="fa fa-plus fa-w-20"></i>
          </span>
          Thêm mới
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">

        <div class="card-header">

          <form>
            <div class="input-group">
              <input type="search" name="search" value="{{request('search')}}" id="search" placeholder="Tìm kiếm sản phẩm" class="form-control">
              <span class="input-group-append">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-search"></i>&nbsp;
                  Tìm kiếm
                </button>
              </span>
            </div>
          </form>

          <div class="btn-actions-pane-right">
            <div role="group" class="btn-group-sm btn-group">
              <button class="btn btn-focus">Tuần này</button>
              <button class="active btn btn-focus">Tất cả</button>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="align-middle mb-0 table table-borderless table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th>Tên / Thương hiệu</th>
                <th class="text-center">Giá</th>
                <th class="text-center">Số Lượng</th>
                <th class="text-center">Featured</th>
                <th class="text-center">Tùy chọn</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($products as $product)
              <tr>
                <td class="text-center text-muted">#{{$product->id}}</td>
                <td>
                  <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left mr-3">
                        <div class="widget-content-left">
                          <img style="height: 60px;" src="front/img/products/{{$product->productImages[0]->path ?? ''}}" alt="{{$product->name}}">
                        </div>
                      </div>
                      <div class="widget-content-left flex2">
                        <div class="widget-heading">{{$product->name}}</div>
                        <div class="widget-subheading opacity-7">{{$product->trademarks->name}}</div>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="text-center">{{number_format($product->price, 0, '.', '.')}} VNĐ</td>
                <td class="text-center">{{$product->qty}}</td>
                <td class="text-center">
                  <div class="badge badge-success mt-2">
                    {{$product->featured ? 'true' : 'No'}}
                  </div>
                </td>
                <td class="text-center">
                  <a href="admin/product/{{$product->id}}" class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                    Chi tiết
                  </a>
                  <a href="./admin/product/{{ $product->id }}/edit" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                    <span class="btn-icon-wrapper opacity-8">
                      <i class="fa fa-edit fa-w-20"></i>
                    </span>
                  </a>
                  <form class="d-inline" action="./admin/product/{{ $product->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm" type="submit" data-toggle="tooltip" title="Delete" data-placement="bottom" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">
                      <span class="btn-icon-wrapper opacity-8">
                        <i class="fa fa-trash fa-w-20"></i>
                      </span>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="d-block card-footer">
          {{$products->links()}}
        </div>

      </div>
    </div>
  </div>
</div>
<!-- End Main -->

@endsection