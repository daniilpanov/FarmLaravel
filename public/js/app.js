function get_uuid () {
    return ((raw_cookies) => {
        let t;
        for (let rawCookiesKey in raw_cookies) {
            t = raw_cookies[rawCookiesKey].split('=')
            if (t[0] === 'uuid'){
                return t[1];
            }
        }
        return null;
    })(document.cookie.split('; '));
}

$(document).ready(function () {
    /*function correctState(rb, gb, id, act) {
        $.ajax({
            url: '/api/cart/get/' + id,
            type: 'get',
            data: {
                'uuid': get_uuid(),
            },
            success: function (data) {
                console.log(data);
                /!*$(clk).css('display', 'none');
                $('.add-cart-item[data-bs-target="' + $(clk).attr('data-bs-product') + '"]').css({'display': ''});*!/
                //notification('Товар успешно удалён из корзины', true);
            },
            error: function () {
                notification(`Sorry, an error occurred when you was trying to ${act} this product. Please, try to reload this page and do it again.`, false);
            },
        });
    }*/
    let clk, alt;
    let target;
    $('.del-cart-item').click(function () {
        target = $(this).attr('data-bs-product');
        clk = this;
        $.ajax({
            url: '/api/cart/del',
            type: 'delete',
            data: {
                'id': target,
                'uuid': get_uuid(),
            },
            success: function () {
                $(clk).css('display', 'none');
                alt = $(`.add-cart-item[data-bs-product="${target}"]`)
                    .css({'display': ''});
                //notification('Товар успешно удалён из корзины', true);
            },
            error: function (msg) {
                if (msg.responseJSON.message === 'Too Many Attempts.') {
                    notification('Вы слишком много раз подряд добавляли и удаляли этот товар.', false)
                }
                //correctState(alt, clk, target, 'delete');
            },
        });
    });
    $('.add-cart-item').click(function () {
        target = $(this).attr('data-bs-product');
        clk = this;
        $.ajax({
            url: '/api/cart/add',
            type: 'post',
            data: {
                'product_id': target,
                'quantity': 1,
                'uuid': get_uuid(),
            },
            success: function () {
                $(clk).css('display', 'none');
                alt = $(`.del-cart-item[data-bs-product="${target}"]`)
                    .css({'display': ''});
                notification('Товар успешно добавлен в корзину. Нажмите, чтобы перейти', true, '/cart');
            },
            error: function (msg) {
                if (msg.responseJSON.message === 'Too Many Attempts.') {
                    notification('Вы слишком много раз подряд добавляли и удаляли этот товар.', false)
                }
                //correctState(alt, clk, target, 'add');
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
        item_id = card.find('input.cart-item-id').val();
        $.ajax({
            url: '/api/cart/del',
            type: 'delete',
            data: {
                'id': item_id,
            },
            success: function () {
                card.closest('div[class^="col-"]').remove();
                calcsum();
            },
            error: function () {
                notification('Sorry, an error occurred when you was trying to delete this product. Please, try to reload this page and do it again.')
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
                    calcsum();
                },
                error: function () {
                    notification('Sorry, an error occurred...');
                },
            });
        });
    });
    $('#choose-all').click(function () {
        let check = $(this).is(':checked')
        $('#cart-form input.cart-item-id').each(function () {
            $(this).prop('checked', check);
        });
        calcsum();
    });
    $('.plus').click(function () {
        let i = $(this).closest('div').find('input.quantity');
        i.val(Number.parseInt(i.val()) + 1);
        $(this).closest('.cart-item').find('.cart-item-id').prop('checked', true);
        calcsum();
    });
    $('.minus').click(function () {
        let i = $(this).closest('div').find('input.quantity');
        let c = Number.parseInt(i.val());
        if (c - 1 < 1) {
            return;
        }
        i.val(c - 1);
        calcsum();
    });
    $('.quantity').change(calcsum);

    function calcsum() {
        let sum = 0;
        $('.cart-item').each(function () {
            if (!$(this).find('.cart-item-id').is(':checked')) {
                return;
            }
            sum += Number.parseInt($(this).find('.quantity').val()) * Number.parseInt($(this).find('.price').text());
        });
        $('.all-sum-price > span').text(sum);
        $('#cart-form button[type="submit"]').attr('disabled', sum < 1);
    }

    $('#cart-form .cart-item-id').change(calcsum);

    calcsum();
});

let active_notifications = [];
function notification(text, success = null, href = null) {
    const note = href === null
        ? $('<div class="alert alert-dismissible fade show" role="alert">' +
            text +
            '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '</div>')
        : $('<a href="' + href + '" class="alert alert-dismissible fade show" role="alert">' +
            text +
            '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '</a>');
    if (success === true) {
        note.addClass('alert-success');
    } else if (success === false) {
        note.addClass('alert-warning');
    } else {
        note.addClass('alert-secondary');
    }
    note.appendTo($('#notifications'));
    active_notifications.push([note, setTimeout(delnote, 10000, note)]);
    note.find('.btn-close').click(function () {
        for (let i in active_notifications) {
            if (active_notifications[i][0] === note) {
                clearTimeout(active_notifications[i][1]);
            }
        }
        delnote(note);
    });
    return note;
}

function delnote(note) {
    note.remove();
}
