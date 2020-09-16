$(document).ready(function () {
    $(".buy-attributes-form").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data:$(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function () {
                $('#sellPrice').load(" #buyPrice");
                Swal.fire({
                    title: 'Success!',
                    text: "Buy Attributes Generated successfully",
                    icon: 'success',
                    confirmButtonText: 'Close'
                });
            }
        })
    });
    $(".sell-attributes-form").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data:$(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function () {
                $('#sellPrice').load(" #sellPrice");Swal.fire({
                    title: 'Success!',
                    text: "Sell Attributes Generated successfully",
                    icon: 'success',
                    confirmButtonText: 'Close'
                });
            }
        })
    });
    $(".add-buy-prices").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data:$(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function () {
                Swal.fire({
                    title: 'Success!',
                    text: "Price for buyers are added successfully",
                    icon: 'success',
                    confirmButtonText: 'Close'
                });
            }
        })
    });
    $(".add-sell-prices").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data:$(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function () {
                Swal.fire({
                    title: 'Success!',
                    text: "All price are added successfully",
                    icon: 'success',
                    confirmButtonText: 'Close'
                });
            }
        })
    });
})
