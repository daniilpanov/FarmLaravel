$(document).ready(function () {
    let clk;
    let target;
    $('.del-cart-item').click(function () {
        target = $(this).attr('data-bs-target');
        clk = this;
        $.ajax({
            url: '/api/cart/del',
            type: 'delete',
            data: {
                'id': target,
            },
            success: function () {
                $(clk).css('display', 'none');
                $('.add-cart-item[data-bs-target="' + $(clk).attr('data-bs-product') + '"]').css({'display': ''});
            },
            error: function () {
                alert('Sorry, an error occurred when you was trying to delete this product. Please, try to reload this page and do it again.');
            },
        });
    });
    let tmp_target;
    $('.add-cart-item').click(function () {
        target = $(this).attr('data-bs-target');
        clk = this;
        $.ajax({
            url: '/api/cart/add',
            type: 'post',
            data: {
                'product_id': target,
                'quantity': 1,
                'uuid': ((raw_cookies) => {
                    let t;
                    for (let rawCookiesKey in raw_cookies) {
                        t = raw_cookies[rawCookiesKey].split('=')
                        if (t[0] === 'uuid'){
                            return t[1];
                        }
                    }
                    return null;
                })(document.cookie.split('; ')),
            },
            success: function (result) {
                $(clk).css('display', 'none');
                tmp_target = $('.del-cart-item[data-bs-target="' + result + '"]');
                if (tmp_target.length > 0) {
                    tmp_target.attr('data-bs-target', result).css({'display': ''});
                } else {
                    $('.del-cart-item[data-bs-product="' + target + '"]').attr('data-bs-target', result).css({'display': ''});
                }
            },
            error: function () {
                alert('Sorry, an error occurred when you was trying to add this product. Please, try to reload this page and do it again.');
            },
        });
    });

    /// CART PAGE
    let card, item_id;
    $('.del-n-close').click(function () {
        if (!confirm('Вы уверены, что хотите удалить выбраный товар?')) {
            return;
        }
        card = $(this).closest('.cart-item');
        item_id = card.find('input.item-id').val();
        $.ajax({
            url: '/api/cart/del',
            type: 'delete',
            data: {
                'id': item_id,
            },
            success: function () {
                card.closest('div[class^="col-"]').remove();
            },
            error: function () {
                alert('Sorry, an error occurred when you was trying to delete this product. Please, try to reload this page and do it again.');
            },
        });
    });
    $('#cart-form .form-reset').click(function () {
        if (!confirm('Вы уверены, что хотите удалить выбраные товары?')) {
            return;
        }
        $('form#cart-form').find('input[name="items[]"]:checked').each(function () {
            let curr = $(this);
            $.ajax({
                url: '/api/cart/del',
                type: 'delete',
                data: {
                    'id': curr.val(),
                },
                success: function () {
                    curr.closest('div[class="col-md-6"]').remove();
                },
                error: function () {
                    alert('Sorry, an error occurred...');
                },
            });
        });
    });
    $('#choose-all').click(function () {
        let check = $(this).is(':checked')
        $('#cart-form input.cart-item-id').each(function () {
            $(this).prop('checked', check);
        });
    })
});
