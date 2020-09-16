$(document).on('click', '.cart-btn-2', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var s = $(this).data('key');
    var m = $("input[name='memory']:checked").val();
    var n = $("input[name='network']:checked").val();
    var c = $("input[name='condition']:checked").val();
    $.ajax({
        url: '/add-to-sell/' + id,
        type: 'GET',
        data: {s:s, m:m, n:n, c:c},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function success() {
            $('#sellNow').load(' #sellNow');
            $('.product-selling-list').load(' .product-selling-list');
            $('.sell-cart-subtotal').load(' .sell-cart-subtotal');
        }
    });

    if($(this).hasClass('cart-btn-2')){
        $(this).addClass('added').find('i').addClass('fa-check-circle').removeClass('fa-shopping-cart').siblings('span').text('added');
    }
    else {
        $(this).removeClass('added').find('i').removeClass('fa-check-circle').addClass('fa-shopping-cart').siblings('span').text('sell now');
    }
});
$(document).on('click', '.remove-selling-item-from-cart', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/remove-sell/'+id,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function (response) {
            if(response==="ok"){
                $('#sellNow').load(' #sellNow');
                $('.product-selling-list').load(' .product-selling-list');
                $('#sellingItemCart').load(' #sellingItemCart');
                $('.sell-cart-subtotal').load(' .sell-cart-subtotal');
            }
        }
    });
});
/**
 * Here user can remove an item from the cart.
 * User already had added these items to the
 * cart by clicking add to cart button. Now
 * user can remove it by following function.
 * */
$(document).on('click','.remove-sell-item', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        type: 'DELETE',
        url: '/remove-sell/'+id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            $('#sellNow').load(' #sellNow');
            $('.product-selling-list').load(' .product-selling-list');
            $('.sell-cart-subtotal').load(' .sell-cart-subtotal');
        }
    });
    if($(this).hasClass('added')){
        $(this).removeClass('added').find('i').removeClass('ti-check').addClass('ti-shopping-cart').siblings('span').text('add to cart');
    } else{
        $(this).addClass('added').find('i').addClass('ti-check').removeClass('ti-shopping-cart').siblings('span').text('added');
    }
});
$(document).on('click','.product-remove .remove-sell-item', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        type: 'DELETE',
        url: '/remove-sell/'+id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            $('.cart-table-content').load(' .cart-table-content');
        }
    });
});

