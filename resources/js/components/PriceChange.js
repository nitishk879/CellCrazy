$(document).ready(function () {
    $("#brandNew select").on('change', function (e){
        e.preventDefault();
        var m = Number($("select[name='memory']").val());
        var s = $(this).data("key");
        var i = $(this).data("id");

        $.ajax({
            url: "/brand-new-price",
            data: { i:i, m: m, s:s },
            type: 'POST',headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function (response) {
                if(response!==0){
                    $(".update-price").html("£"+response);
                }
                else{
                    $(".update-price").html("N/A");
                }
            }
        })
    });
})
