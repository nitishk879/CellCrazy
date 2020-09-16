/**
 * User can add an item to his/her session,
 * by clicking add to cart button.
 * We'll append item id to the url.
 * */
$(document).on('click', '.add-to-cart', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var s = $(this).data('key');
    var m = $("input[name='memory']:checked").val();
    var c = $("input[name='condition']:checked").val();
    var l = $("input[name='color']:checked").val();
    var r = $("input[name='repair']:selected").val();
    $.ajax({
        url: '/add-to-cart/' + id,
        type: 'GET',
        data: {s:s, m:m, c:c, l:l, r:r},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function success() {
            $('#buyNow').load(' #buyNow');
            $('.buy-cart-list').load(' .buy-cart-list');
            $('.buy-cart-subtotal').load(' .buy-cart-subtotal');
        }
    });

    if($(this).hasClass('add-to-cart added')){
        $(this).removeClass('added').find('i').removeClass('ti-check').addClass('ti-shopping-cart').siblings('span').text('add to cart');
    }
    else {
        $(this).addClass('added').find('i').addClass('ti-check').removeClass('ti-shopping-cart').siblings('span').text('added');
    }
});
$(document).on('click', '.remove-buying-item-from-cart', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/remove-product/'+id,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            $('#buyNow').load(' #buyNow');
            $('.buy-cart-list').load(' .buy-cart-list');
            $('#buyingItemsCart').load(' #buyingItemsCart');
            $('.buy-cart-subtotal').load(' .buy-cart-subtotal');
        }
    });
});
/**
 * Here user can remove an item from the cart.
 * User already had added these items to the
 * cart by clicking add to cart button. Now
 * user can remove it by following function.
 * */
$(document).on('click','.remove-item', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        type: 'DELETE',
        url: '/remove-product/'+id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            $('#buyNow').load(' #buyNow');
            $('.buy-cart-list').load(' .buy-cart-list');
            $('.buy-cart-subtotal').load(' .buy-cart-subtotal');
        }
    });

    if($(this).hasClass('added')){
        $(this).removeClass('added').find('i').removeClass('ti-check').addClass('ti-shopping-cart').siblings('span').text('add to cart');
    } else{
        $(this).addClass('added').find('i').addClass('ti-check').removeClass('ti-shopping-cart').siblings('span').text('added');
    }
});
$(document).on('click','.product-remove .remove-item', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        type: 'DELETE',
        url: '/remove-product/'+id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            $('.cart-table-content').load(' .cart-table-content');
        }
    });
});
