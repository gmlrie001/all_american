$(".delivery-submit").click(function(e){
    e.preventDefault();

    if($(this).parent(".delivery-input").val() != ""){
        $.ajax({
            type: 'GET',
            url: "/get/delivery/time",
            data: { 
                postal_code: $(".delivery-input").val(), 
                product_name: $(".product-view form h2:first-child").text()
            }, 
            async: false,
            dataType: 'json'

        }).done(function(data){
            console.log(data.success);

            if(data.success == true){
                $(".delivery-input").val("");
                $(".delivery-calc").fadeOut(500);
                $(".delivery-success").html(data.message);
                $(".delivery-success").fadeIn(500);
                $(".delivery-error").fadeOut(500);
            }else{
                $(".delivery-error").html(data.message);
                $(".delivery-error").fadeIn(500);
                $(".delivery-success").fadeOut(500);
            }
        }).fail(function(error){
            console.log(error);
        });
    }
});

// $('.product-view select').selectize({
//     onInitialize: function () {
//         var s = this;
//         this.revertSettings.$children.each(function () {
//             $.extend(s.options[this.value], $(this).data());
//         });
//     }
// });
$('.filter-block select').selectize();
$('.sort-block select').selectize();

$(".delivery-input").keypress(function (event) {
    if (event.keyCode === 10 || event.keyCode === 13) {
        event.preventDefault();
    }
});
$(".notify-input").keypress(function (event) {
    if (event.keyCode === 10 || event.keyCode === 13) {
        event.preventDefault();
    }
});
$(".notify-submit").click(function(e){
    e.preventDefault();

    if($(this).parent(".notify-input").val() != ""){
        $.ajax({
            type: 'GET',
            url: "/set/product/notify",
            data: { 
                email: $(".notify-input").val(), 
                product_id: $(".notify-input").data('prod_id')
            }, 
            async: false,
            dataType: 'json'

        }).done(function(data){
            console.log(data.success);
            if(data.success == true){
                $(".notify-input").val("");
                $(".notify-calc").fadeOut(500);
                $(".notify-success").fadeIn(500);
            }
        }).fail(function(error){
            console.log(error);
        });
    }
});