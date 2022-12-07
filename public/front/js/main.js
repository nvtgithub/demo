/*  ---------------------------------------------------
    Template Name: codelean
    Description: codelean eCommerce HTML Template
    Author: CodeLean
    Author URI: https://CodeLean.vn/
    Version: 1.0
    Created: CodeLean
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
    Navigation
  --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });


    /*------------------
        Product Slider
    --------------------*/
    $(".product-slider").owlCarousel({
        loop: false,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

    /*------------------
       logo Carousel
    --------------------*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        items: 5,
        dots: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            768: {
                items: 5,
            }
        }
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if (mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end

    console.log(timerdate);


    // Use this for real timer date
    /* var timerdate = "2020/01/01"; */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
    });

    //Sản phẩm yêu thích
    if (localStorage.getItem('data').length != null) {
        var data = JSON.parse(localStorage.getItem('data'));
        data.reverse();

        for (var i = 0; i < data.length; i++) {
            var id = data[i].id;
            var name = data[i].name;
            var price = data[i].price;
            var image = data[i].image;
            var url = data[i].url;

            var item =
                '<div class="col-lg-3 col-sm-6">' +
                '<div class="product-item item {{$product->tag}} shadow-sm p-3">' +
                '  <div class="pi-pic">' +
                '     <img style=" max-height: 150px;" id="wishlist_productimage' + id + '" src="' + image + '" alt="">' +
                '<div class="icon">' +
                '<button type="" style="outline: none;" class="button-wishlist" id="' + id + '" onclick="remove_wishlist(this.id)">' +
                '<i class="ti-close"></i>' +
                '</button>' +
                '</div>' +
                '    <ul>' +
                '      <li class="w-icon active">' +
                '        <a href="javascript:addCart(' + id + ')"><i class="icon_bag_alt"></i></a>' +
                '      </li>' +
                '      <li class="quick-view">' +
                '        <a href="' + url + '">+ Chi tiết sản phẩm</a>' +
                '      </li>' +
                '      <li class="w-icon d-none">' +
                '        <a href=""><i class="fa fa-random"></i></a>' +
                '      </li>' +
                '    </ul>' +
                '  </div>' +
                '  <div class="pi-text">' +
                '    <a id="wishlist_producturl' + id + '" href="shop/product/' + id + '">' +
                '      <h5>' + name + '</h5>' +
                '      <input type="hidden" name="" value="' + name + '" id="wishlist_productname' + id + '">' +
                '    </a>' +
                '    <div class="product-price">' +
                '      ' + price + '' +
                '      <input type="hidden" name="" value="' + price + ' VNĐ" id="wishlist_productprice' + id + '">' +
                '    </div>' +
                '  </div>' +
                ' </div>' +
                ' </div>';

            var selectItems =
                '<tr>' +
                '<td class="si-pic"><img width="70px" src="' + image + '" alt=""></td>' +
                '<td class="si-text">' +
                '  <div class="product-selected">' +
                '    <h6><a href="shop/product/' + id + '"> ' + name + '</a></h6>' +
                '    <p>' + price + '</p>' +
                '  </div>' +
                '</td>' +
                '<td class="si-close">' +
                '  <svg id="' + id + '" onclick="remove_wishlist(this.id)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">' +
                '    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>' +
                '  </svg>' +
                '</td>' +
                '</tr>';

            $("#show_product_favorite").append(selectItems);
            $("#favorite").append(item);
        }

        $("#product_favorite_count").append(data.length);
    } else {
        $("#product_favorite_count").append('0');
    }


    /*----------------------------------------------------
     Language Flag js
    ----------------------------------------------------*/
    $(document).ready(function (e) {
        //no use
        try {
            var pages = $("#pages").msDropdown({
                on: {
                    change: function (data, ui) {
                        var val = data.value;
                        if (val != "")
                            window.location = val;
                    }
                }
            }).data("dd");

            var pagename = document.location.pathname.toString();
            pagename = pagename.split("/");
            pages.setIndexByValue(pagename[pagename.length - 1]);
            $("#ver").html(msBeautify.version.msDropdown);
        } catch (e) {
            // console.log(e);
        }
        $("#ver").html(msBeautify.version.msDropdown);

        //convert
        $(".language_drop").msDropdown({roundedBorder: false});
        $("#tech").data("dd");
    });
    /*-------------------
    Range Slider
  --------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max'),
        minValue = rangeSlider.data('min-value') !== '' ? rangeSlider.data('min-value') : minPrice,
        maxValue = rangeSlider.data('max-value') !== '' ? rangeSlider.data('max-value') : maxPrice;

    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minValue, maxValue],
        slide: function (event, ui) {
            minamount.val(ui.values[0]);
            maxamount.val(ui.values[1]);
        }
    });
    minamount.val(rangeSlider.slider("values", 0));
    maxamount.val(rangeSlider.slider("values", 1));

    /*-------------------
    Radio Btn
  --------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on('click', function () {
        $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------
    Nice Select
    --------------------- */
    $('.sorting, .p-show').niceSelect();

    /*------------------
    Single Product
  --------------------*/
    $('.product-thumbs-track .pt').on('click', function () {
        $('.product-thumbs-track .pt').removeClass('active');
        $(this).addClass('active');
        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product-big-img').attr('src');
        if (imgurl != bigImg) {
            $('.product-big-img').attr({src: imgurl});
            $('.zoomImg').attr({src: imgurl});
        }
    });

    $('.product-pic-zoom').zoom();

    /*-------------------
    Quantity change
  --------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);

        //update cart:
        var rowId = $button.parent().find('input').data('rowid');
        updateCart(rowId, newVal);
    });

    const product_smartPhone = $(".product-slider.SmartPhone");
    const product_Laptop = $(".product-slider.Laptop");


    $('.filter-control').on('click', '.item', function () {
        const $item = $(this);
        const filter = $item.data('tag');
        const category = $item.data('category');

        $item.siblings().removeClass('active');
        $item.addClass('active');

        if (category === 'SmartPhone') {
            product_smartPhone.owlcarousel2_filter(filter);
        }
        if (category === 'Laptop') {
            product_Laptop.owlcarousel2_filter(filter);
        }
    });

})(jQuery);


function addCart(productId) {
    $.ajax({
        type: "GET",
        url: "cart/add",
        data: {
            productId: productId,
            color: $('input[name=color]:checked').val()
        },
        success: function (response) {
            $('.cart-count').text(response['count']);
            $('.cart-price').text(response['total'] + ' VNĐ');
            $('.select-total h5').text(response['total'] + ' VNĐ');

            var cartHover_tbody = $('.select-items tbody');
            var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='" + response['cart'].rowId + "']");

            if (cartHover_existItem.length) {
                cartHover_existItem.find('.product-selected p').text(response['cart'].price.toFixed() + 'VNĐ' + ' x ' + response['cart'].qty);
            } else {
                var newItem =
                    '<tr data-rowId="' + response['cart'].rowId + '">\n' +
                    '<td class="si-pic"><img width="70px" src="front/img/products/' + response['cart'].options.images[0].path + '" alt=""></td>\n' +
                    '<td class="si-text">\n' +
                    '  <div class="product-selected">\n' +
                    '        <h6>' + response['cart'].name + '</h6>\n' + '<span> - '+ response['cart'].options['colorProduct'] + '</span>'
                    '        <p>' + response['cart'].price.toFixed() + 'VNĐ' + ' x ' + response['cart'].qty + '</p>\n' +
                    '    </div>\n' +
                    '</td>\n' +
                    '<td class="si-close">\n' +
                    '    <i onclick="removeCart(\'' + response['cart'].rowId + '\')" class="si-close">\n' +
                    '        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-x" viewBox="0 0 16 16">\n' +
                    '            <path fill-rule="evenodd" d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>\n' +
                    '            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>\n' +
                    '        </svg>\n' +
                    '    </i>\n' +
                    '</td>\n'
                '</tr>';

                cartHover_tbody.append(newItem);
            }

            alert('Thêm thành công\nSản phẩm: ' + response['cart'].name);
            console.log(response)
        },
        error: function (response) {
            alert('Thêm thất bại! ');
            console.log(response)
        },
    });
}

function removeCart(rowId, name) {
    $.ajax({
        type: "GET",
        url: "cart/delete",
        data: {rowId: rowId },
        success: function (response) {
            //Xử lý phần cart hover (trang master-page)
            $('.cart-count').text(response['count']);
            $('.cart-price').text(response['total'] + ' VNĐ');
            $('.select-total h5').text(response['total'] + ' VNĐ');

            //Cập nhật thành tiền và tổng tiền
            $('.subtotal-money').text(response['total'] + ' VNĐ');
            $('.cart-total-money').text(response['total'] + ' VNĐ');

            var cartHover_tbody = $('.select-items tbody');
            var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='" + rowId + "']");

            cartHover_existItem.remove();

            //Xử lý ở trong trnag "shop/cart"
            var cart_tbody = $('.cart-table tbody');
            var cart_exitItem = cart_tbody.find("tr" + "[data-rowId='" + rowId + "']");
            cart_exitItem.remove();

            alert('Xóa thành công \n Sản phẩm: ' + name);
            console.log(response)
        },
        error: function (response) {
            alert('Xóa thất bại');
            console.log(response)
        },
    });
}

function destroyCart() {
    $.ajax({
        type: "GET",
        url: "cart/destroy",
        data: {},
        success: function (response) {
            //Xử lý phần cart hover (trang master-page)
            $('.cart-count').text('0');
            $('.cart-price').text('0');
            $('.select-total h5').text('0');

            var cartHover_tbody = $('.select-items tbody');
            cartHover_tbody.children().remove();

            //Xử lý ở trong trnag "shop/cart"
            var cart_tbody = $('.cart-table tbody');
            cart_tbody.children().remove();

            $('.subtotal span').text('0');
            $('.cart-total span').text('0');


            alert('Thêm thành công\nSản phẩm: ' + response['cart'].name);
            console.log(response)
        },
        error: function (response) {
            alert('Xóa thất bại!');
            console.log(response)
        },
    });
}

function updateCart(rowId, qty) {
    $.ajax({
        type: "GET",
        url: "cart/update",
        data: {rowId: rowId, qty: qty},
        success: function (response) {
            //Xử lý phần cart hover (trang master-page)
            $('.cart-count').text(response['count']);
            $('.cart-price').text(response['total'] + ' VNĐ');
            $('.select-total h5').text(response['total'] + ' VNĐ');

            //Cập nhật thành tiền và tổng tiền
            $('.subtotal-money').text(response['total'] + ' VNĐ');
            $('.cart-total-money').text(response['total'] + ' VNĐ');

            var cartHover_tbody = $('.select-items tbody');
            var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='" + rowId + "']");
            if (qty === 0) {
                cartHover_existItem.remove();
            } else {
                cartHover_existItem.find('.product-selected p').text(new Intl.NumberFormat().format(response['cart'].price.toFixed()) + ' VNĐ' + ' x ' + response['cart'].qty);
            }

            //Xử lý ở trong trnag "shop/cart"
            var cart_tbody = $('.cart-table tbody');
            var cart_existItem = cart_tbody.find("tr" + "[data-rowId='" + rowId + "']");
            if (qty === 0) {
                cart_existItem.remove();
            } else {
                cart_existItem.find('.total-price').text(new Intl.NumberFormat().format((response['cart'].price * response['cart'].qty).toFixed()) + ' VNĐ');
            }

            $('.subtotal span').text(response['subtotal'] + ' VNĐ');
            $('.cart-total span').text(response['total'] + ' VNĐ');


            // alert('Update successfull\nProduct: '+ response['cart'].name);
            console.log(response)
        },
        error: function (response) {
            alert('Cập nhật thất bại!');
            console.log(response)
        },
    });
}

// thêm yêu thích sản phẩm
function view() {
    if (localStorage.getItem('data') != null) {
        var data = JSON.parse(localStorage.getItem('data'));
        data.reverse();

        document.getElementById('row_wishlist').style.overflowY = 'scroll';
        document.getElementById('row_wishlist').style.maxHeight = '600px';

        for (var i = 0; i < data.length; i++) {
            var id = data[i].id;
            var name = data[i].name;
            var price = data[i].price;
            var image = data[i].image;
            var url = data[i].url;

            $("#row_wishlist").append('<div class="row" style="margin:10px 0; max-height: 100px;"><div class="col-md-4"><img src="' + image + '" class="width:100%;"></div><div class="col-md-8 info_wishlist"><p>' + name + '</p><p style="color:#e7ab3c">' + price + '</p><button type="" style="outline: none;" class="button-wishlist " id="' + id + '" onclick="remove_wishlist(this.id)"><i class="icon_heart_alt"></i></button><a href="' + url + '">Xem</a></div></div>');
        }
    }
}

view();

function add_wishlist(clicked_id) {
    var id = clicked_id;
    var name = document.getElementById('wishlist_productname' + id).value;
    var price = document.getElementById('wishlist_productprice' + id).value;
    var image = document.getElementById('wishlist_productimage' + id).src;
    var url = document.getElementById('wishlist_producturl' + id).href;

    var newItem = {
        'id': id,
        'name': name,
        'price': price,
        'image': image,
        'url': url
    }

    if (localStorage.getItem('data') == null) {
        localStorage.setItem('data', '[]');
    }

    var old_data = JSON.parse(localStorage.getItem('data'));

    // check thông báo khi trùng sp yêu thích
    var matches = $.grep(old_data, function (obj) {
        return obj.id == id;
    })

    if (matches.length) {
        alert('Sản phẩm đã có trong mục yêu thích!');
    } else {
        old_data.push(newItem);
        alert('Đã thêm "' + name + '" vào danh mục yêu thích');


        var selectItems =
            '<tr>' +
            '<td class="si-pic"><img width="70px" src="' + image + '" alt=""></td>' +
            '<td class="si-text">' +
            '  <div class="product-selected">' +
            '    <h6><a href="shop/product/' + id + '"> ' + name + '</a></h6>' +
            '    <p>' + price + '</p>' +
            '  </div>' +
            '</td>' +
            '<td class="si-close">' +
            '  <svg id="' + id + '" onclick="remove_wishlist(this.id)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">' +
            '    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>' +
            '  </svg>' +
            '</td>' +
            '</tr>';

        $("#show_product_favorite").append(selectItems);
        $("#row_wishlist").append('<div class="row" style="margin:10px 0; max-height: 100px;"><div class="col-md-4"><img src="' + image + '" class="width:100%;"></div><div class="col-md-8 info_wishlist"><p>' + name + '</p><p style="color:#e7ab3c">' + price + '</p><button type="" style="outline: none;" class="button-wishlist " id="' + id + '" onclick="remove_wishlist(this.id)"><i class="icon_heart_alt"></i></button><a href="' + url + '">Xem</a></div></div>');
    }

    localStorage.setItem('data', JSON.stringify(old_data));
    $("#product_favorite_count").replaceWith('<span id="product_favorite_count">' + old_data.length + '</span>');
    console.log('aa', old_data.length);
}

function remove_wishlist(clicked_id) {
    const items = JSON.parse(localStorage.getItem('data'));
    const filtered = items.filter(data => data.id !== clicked_id);
    localStorage.setItem('data', JSON.stringify(filtered));

    location.reload();
}

//Doanh thu theo ngày



