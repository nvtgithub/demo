<div style="border-radius: 8px;" class="product-item item {{$product->tag}} shadow-sm p-3 ">
  <div class="pi-pic">
    <img id="wishlist_productimage{{$product->id}}" src="front/img/products/{{ $product->productImages[0]->path ?? ''}}" alt="">

    @if ($product->discount != null)
    <div class="sale">Sale</div>
    @endif
    <div class="icon">
      <button type="" style="outline: none;" class="button-wishlist" id="{{$product->id}}" onclick="add_wishlist(this.id)">
        <i class="icon_heart_alt"></i>
      </button>
    </div>
    <ul>     
      <li class="quick-view">
        <a href="shop/product/{{$product->id}}">+ Chi tiết sản phẩm</a>
      </li>
      <li class="w-icon d-none">
        <a href=""><i class="fa fa-random"></i></a>
      </li>
    </ul>
  </div>
  <div class="pi-text">
    <div class="catagory-name">{{$product->tag}}</div>
    <a id="wishlist_producturl{{$product->id}}" href="shop/product/{{$product->id}}">
      <h5>{{$product->name}}</h5>
      <input type="hidden" name="" value="{{$product->name}}" id="wishlist_productname{{$product->id}}">
    </a>
    <div class="product-price">
      @if ($product->discount != null)
      {{number_format($product->discount)}} VNĐ
      <span>${{number_format($product->price)}}</span>
      <input type="hidden" name="" value="{{number_format($product->discount)}} VNĐ" id="wishlist_productprice{{$product->id}}">
      @else
      {{number_format($product->price)}} VNĐ
      <input type="hidden" name="" value="{{number_format($product->price)}} VNĐ" id="wishlist_productprice{{$product->id}}">
      @endif

    </div>
  </div>
</div>