/**
 * Let's add item to compare with different products.
 * **/
$(document).on('click', '.pro-details-cart a', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var type = $(this).data('tooltip');

    if(type==='Compare'){
        uri = '/add-to-compare/'+id;
    }else{
        uri = '/add-to-wishlist/'+id;
    }
    $.ajax({
        url: uri,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            if(type==='Wishlist'){
                $('.header-wishlist').load(' .header-wishlist');
            }
        }
    });
    if($(this).hasClass('added')){
        $(this).removeClass('added');
    } else{
        $(this).addClass('added');
    }
});
$(document).on('click', '.pro-remove a', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var type = $(this).data('tooltip');

    if(type==='Compare'){
        uri = '/remove-compare/'+id;
    }else{
        uri = '/remove-wishlist/'+id;
    }
    $.ajax({
        url: uri,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function () {
            if(type==='Wishlist'){
                $('.header-wishlist').load(' .header-wishlist');
            }
            $('.table').load(' .table');
        }
    });
    if($(this).hasClass('added')){
        $(this).removeClass('added');
    } else{
        $(this).addClass('added');
    }
})
