<form action="{{ request()->segment(2) == 'product' ? 'shop' : '' }}">
  <div class="filter-widget">
    <h4 class="fw-title">Sản phẩm</h4>
    <ul class="filter-catagories">

      @foreach($categories as $category)
      <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
      @endforeach

    </ul>
  </div>
  <div class="filter-widget">
    <h4 class="fw-title">Thương hiệu</h4>
    <div class="fw-brand-check">

      @foreach($trademarks as $trademark)
      <div class="bc-item">
        <label for="bc-{{ $trademark->id }}">
          {{ $trademark->name }}
          <input {{ (request("trademark")[$trademark->id] ?? '') == 'on' ? 'checked' : ''}} type="checkbox" id="bc-{{ $trademark->id }}" name="trademark[{{ $trademark->id }}]" onchange="this.form.submit();">
          <span class="checkmark"></span>
        </label>
      </div>
      @endforeach
    </div>
  </div>
  <div class="filter-widget">
    <h4 class="fw-title">Giá</h4>
    <div class="filter-range-wrap">
      <div class="range-slider">
        <div class="price-input">
          <input type="text" id="minamount" name="price_min">
          <input type="text" id="maxamount" name="price_max">
          <span>VNĐ</span>
        </div>
      </div>
      <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="100000" data-max="100000000" data-min-value="{{ str_replace('', '', request('price_min')) }}" data-max-value="{{ str_replace('', '', request('price_max')) }}">
        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
      </div>
    </div>
    <button type="submit" class="filter-btn"> Lọc</button>
  </div>
  <div class="filter-widget">
    <h4 class="fw-title">Màu sắc</h4>
    <div class="fw-color-choose">
      <div class="cs-item">
        <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit();" {{ request('color') == 'black' ? 'checked' : ''}}>
        <label for="cs-black" class="cs-black {{ request('color') == 'black' ? 'font-weight-bold' : '' }}">Đen</label>
      </div>
      <div class="cs-item">
        <input type="radio" id="cs-violet" name="color" value="violet" onchange="this.form.submit();" {{ request('color') == 'violet' ? 'checked' : ''}}>
        <label for="cs-violet" class="cs-violet {{ request('color') == 'violet' ? 'font-weight-bold' : '' }}">Tím</label>
      </div>
      <div class="cs-item">
        <input type="radio" id="cs-blue" name="color" value="blue" onchange="this.form.submit();" {{ request('color') == 'blue' ? 'checked' : ''}}>
        <label for="cs-blue" class="cs-blue {{ request('color') == 'blue' ? 'font-weight-bold' : '' }}">Xanh nước biển</label>
      </div>
      <div class="cs-item">
        <input type="radio" id="cs-yellow" name="color" value="yellow" onchange="this.form.submit();" {{ request('color') == 'yellow' ? 'checked' : ''}}>
        <label for="cs-yellow" class="cs-yellow {{ request('color') == 'yellow' ? 'font-weight-bold' : '' }}">Vàng</label>
      </div>
      <div class="cs-item">
        <input type="radio" id="cs-red" name="color" value="red" onchange="this.form.submit();" {{ request('color') == 'red' ? 'checked' : ''}}>
        <label for="cs-red" class="cs-red {{ request('color') == 'red' ? 'font-weight-bold' : '' }}">Đỏ</label>
      </div>
      <div class="cs-item">
        <input type="radio" id="cs-green" name="color" value="green" onchange="this.form.submit();" {{ request('color') == 'green' ? 'checked' : ''}}>
        <label for="cs-green" class="cs-green {{ request('color') == 'green' ? 'font-weight-bold' : '' }}">Xanh lá</label>
      </div>
      <div class="cs-item">
        <input type="radio" id="cs-white" name="color" value="white" onchange="this.form.submit();" {{ request('color') == 'white' ? 'checked' : ''}}>
        <label for="cs-white" class="cs-white {{ request('color') == 'white' ? 'font-weight-bold' : '' }}">Trắng</label>
      </div>
      <div class="cs-item">
        <input type="radio" id="cs-pink" name="color" value="pink" onchange="this.form.submit();" {{ request('color') == 'pink' ? 'checked' : ''}}>
        <label for="cs-pink" class="cs-pink {{ request('color') == 'pink' ? 'font-weight-bold' : '' }}">Hồng</label>
      </div>
    </div>
  </div>
</form>

<div class="filter-widget likes-product">
  <h4 class="fw-title">Sản phẩm đã yêu thích</h4>
  <div class="product">
    <div id="row_wishlist" class="row">
    </div>
  </div>
</div>

<script>

</script>