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
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-body">
          <form method="post" action="admin/product/{{ $product->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="position-relative row form-group">
              <label for="trademark_id" class="col-md-3 text-md-right col-form-label">Thương hiệu</label>
              <div class="col-md-9 col-xl-8">
                <select required name="trademark_id" id="trademark_id" class="form-control">

                  @foreach ($trademarks as $trademark)
                  <option {{ $product->trademark_id ==  $trademark->id ? 'selected' : '' }} value="{{ $trademark->id }}">
                    {{$trademark->name}}
                  </option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="product_category_id" class="col-md-3 text-md-right col-form-label">Category</label>
              <div class="col-md-9 col-xl-8">
                <select required name="product_category_id" id="product_category_id" class="form-control">
                  <option value="">-- Category --</option>

                  @foreach ($productCategories as $productCategorie)
                  <option {{ $product->product_category_id == $productCategorie->id ? 'selected' : ''}} value={{$productCategorie->id}}>
                    {{$productCategorie->name}}
                  </option>
                  @endforeach

                </select>
              </div>
            </div>


            <div class="position-relative row form-group">
              <label for="name" class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
              <div class="col-md-9 col-xl-8">
                <input required name="name" id="name" placeholder="Tên sản phẩm" type="text" class="form-control" value="{{ $product->name }}">
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="content" class="col-md-3 text-md-right col-form-label">Thông số Kỹ thuật</label>
              <div class="col-md-9 col-xl-8">
                <textarea class="form-control" name="content" id="content" placeholder="Nội dung sản phẩm">{{ $product->content }}</textarea>
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="price" class="col-md-3 text-md-right col-form-label">Giá bán</label>
              <div class="col-md-9 col-xl-8">
                <input required name="price" id="price" placeholder="Giá bán" type="text" class="form-control" value="{{ $product->price }}">
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="discount" class="col-md-3 text-md-right col-form-label">Giá khuyến mãi</label>
              <div class="col-md-9 col-xl-8">
                <input name="discount" id="discount" placeholder="Giá khuyến mãi" type="text" class="form-control" value="{{ $product->discount }}">
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="weight" class="col-md-3 text-md-right col-form-label">Khối lượng</label>
              <div class="col-md-9 col-xl-8">
                <input name="weight" id="weight" placeholder="Khối lượng sản phẩm" type="text" class="form-control" value="{{ $product->weight }}">
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="sku" class="col-md-3 text-md-right col-form-label">SKU</label>
              <div class="col-md-9 col-xl-8">
                <input required name="sku" id="sku" placeholder="Mã SKU" type="text" class="form-control" value="{{ $product->sku }}">
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="tag" class="col-md-3 text-md-right col-form-label">Tag</label>
              <div class="col-md-9 col-xl-8">
                <input required name="tag" id="tag" placeholder="Tag" type="text" class="form-control" value="{{ $product->tag }}">
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="featured" class="col-md-3 text-md-right col-form-label">Nổi bật</label>
              <div class="col-md-9 col-xl-8">
                <div class="position-relative form-check form-check-inline">
                  <input name="featured" id="featured_yes" type="radio" class="form-check-input" value="1" {{ $product->featured == '1' ? 'checked' : ''}}>
                  <label for="yes" class="form-check-label">Mặc định</label>
                </div>      
                <div class="position-relative form-check form-check-inline">                  
                  <input name="featured" id="featured_no" type="radio" class="form-check-input" value="0" {{ $product->featured == '0' ? 'checked' : ''}}>
                  <label for="no" class="form-check-label">Ẩn</label>
                </div>    
              </div>
            </div>

            <div class="position-relative row form-group">
              <label for="description" class="col-md-3 text-md-right col-form-label">Mô tả</label>
              <div class="col-md-9 col-xl-8">
                <textarea class="form-control" name="description" id="description" placeholder="Mô tả sản phẩm">{{ $product->description }}</textarea>
              </div>
            </div>

            <div class="position-relative row form-group mb-1">
              <div class="col-md-9 col-xl-8 offset-md-2">
                <a href="./admin/product" class="border-0 btn btn-outline-danger mr-1">
                  <span class="btn-icon-wrapper pr-1 opacity-8">
                    <i class="fa fa-times fa-w-20"></i>
                  </span>
                  <span>Hủy</span>
                </a>

                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                  <span class="btn-icon-wrapper pr-2 opacity-8">
                    <i class="fa fa-download fa-w-20"></i>
                  </span>
                  <span>Lưu</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Main -->

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('description');
  CKEDITOR.replace('content');
</script>
@endsection