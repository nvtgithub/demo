$(document).ready(function () {
    let color = ''
    $('input[name=color]').click(function () {
        if(color === $(this).val()) {
            color = ''
            $(this).parent().css("border-color","rgba(255, 255, 255, 0)")
            $('#product-color').text('')
        } else {
            color = $(this).val()
            $('input[name=color]').each(function () {
                $(this).parent().css("border-color","rgba(255, 255, 255, 0)")
            });
            $(this).parent().css("border-color","black")
            $('#product-color').text('- ' + $(this).data('color-name'))
        }
    })

    $('#add-to-cart').click(function () {
        if (color.length === 0) {
            alert('Bạn chưa chọn màu sản phẩm');
        } else {
            $.ajax({
                type: "GET",
                url: "cart/add",
                data: {
                    productId: $(this).data('product-id'),
                    color: $('input[name=color]:checked').val()
                },
                success: function (response) {
                    $('.cart-count').text(response['count']);
                    $('.cart-price').text(response['total'] + ' VNĐ');
                    $('.select-total h5').text(response['total'] + ' VNĐ');

                    var cartHover_tbody = $('.select-items tbody');
                    var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='" + response['cart'].rowId + "']");

                    if (cartHover_existItem.length) {
                        cartHover_existItem.find('.product-selected p').text(new Intl.NumberFormat().format(response['cart'].price.toFixed()) + 'VNĐ' + ' x ' + response['cart'].qty);
                    } else {
                        var newItem =
                            '<tr data-rowId="' + response['cart'].rowId + '">\n' +
                            '<td class="si-pic"><img width="70px" src="front/img/products/' + response['cart'].options.images[0].path + '" alt=""></td>\n' +
                            '<td class="si-text">\n' +
                            '  <div class="product-selected">\n' +
                            '        <h6>' + response['cart'].name + '<span> - '+ response['cart'].options['colorProduct'].color + '</span></h6>\n' +
                            '        <p>' + new Intl.NumberFormat().format(response['cart'].price.toFixed()) + ' VNĐ x ' + response['cart'].qty + '</p>\n' +
                            '    </div>\n' +
                            '</td>\n' +
                            '<td class="si-close">\n' +
                            '    <i onclick="removeCart(\'' + response['cart'].rowId + ', ' + response['cart'].name + '\')" class="si-close">\n' +
                            '        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-x" viewBox="0 0 16 16">\n' +
                            '            <path fill-rule="evenodd" d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>\n' +
                            '            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>\n' +
                            '        </svg>\n' +
                            '    </i>\n' +
                            '</td>\n'
                        '</tr>';

                        cartHover_tbody.append(newItem);
                    }
                    color = ''
                    $('input[name="color"]:checked').parent().css("border-color","rgba(255, 255, 255, 0)")

                    alert('Thêm thành công\nSản phẩm: ' + response['cart'].name);
                    console.log(response)
                },
                error: function (response) {
                    alert('Thêm thất bại! ');
                    console.log(response)
                },
            });
        }
    })
})
