$(document).ready(function(){
        
    $(".add-address a").click(function(e){
        e.preventDefault();
        $(".add-address-overlay").fadeIn(400);
        $(".add-address-form").fadeIn(400);
    });

    $(".add-address-overlay, .add-address-form h1 a, .edit-address-form h1 a").click(function(e){
        e.preventDefault();
        $(".add-address-overlay").fadeOut(400);
        $(".add-address-form").fadeOut(400);
        $(".edit-address-form").fadeOut(400);
    });

    $(".spinner").spinner('changing', function(e, newVal, oldVal){
        var quantity = $(this).val();
        
        var url = $(this).closest('form').attr('action');

        var me = $(this);

        if(quantity.match(/^\d+$/)) {
            $.ajax({
                type: 'post',
                url: url,
                data: $(this).closest('form').serialize(), 
                async: false,
                dataType: 'json'

            }).done(function(data){
                console.log(data);
                location.reload();
            }).fail(function(error){
                console.log(error);
            });
        }else{

        }
    });
    
    $(".address-info h1").on("click", function(){
        $(this).parent().children("div").slideToggle(500);
    });
    
    $(".order-link").click(function(){
        $(".order-dropdown").slideToggle(500);
    });
    
    $("ul.profile-tab-container > li > a").click(function(e){
        e.preventDefault();
        $(this).parent().children("ul").slideToggle(500);
    });
    
    $(".edit-address-form h1 > span").click(function(){
        if(!($(this).children('i').hasClass("fa-check-square"))){
            var url = $(this).data("addressid");
            var me = $(this);
            $.ajax({
                type: 'get',
                url: "/profile/set/default/"+url,
                data:{
                }, 
                async: false,
                dataType: 'json'
                
            }).done(function(data){
               $(".edit-address-form h1 > span i.fa-check-square").toggleClass("fa-check-square fa-square");
               me.children("i").toggleClass("fa-check-square fa-square");
            }).fail(function(error){
                console.log(error)
            });
        }
    });

    $(".edit-address-form h1").click(function(){
        $(this).children("i.fa").toggleClass("fa-caret-right fa-caret-down");

        $(this).parent().children("form").slideToggle(500);
    });
    
    $(".address-info h1 i").on("click", function(){
        var addressid = $(this).parent().parent().data('addressid');
        
        if($(this).parent().parent().parent().hasClass("billing-addresses")){
            $(".billing-addresses .address-info h1 i").removeClass("active");
            $(".billing-addresses .address-info h1 i").addClass('fa-circle');
            $(".billing-addresses .address-info h1 i").removeClass('fa-check-circle');
            
            $("input[name='billing_id']").val(addressid);
            
        }else if($(this).parent().parent().parent().hasClass("collection-billing")){
            $(".collection-billing .address-info h1 i").removeClass("active");
            $(".collection-billing .address-info h1 i").addClass('fa-circle');
            $(".collection-billing .address-info h1 i").removeClass('fa-check-circle');
            
            $("input[name='address_id']").val(addressid);
            
        }else if($(this).parent().parent().parent().hasClass("colection-addresses")){
            $(".colection-addresses .address-info h1 i").removeClass("active");
            $(".colection-addresses .address-info h1 i").addClass('fa-circle');
            $(".colection-addresses .address-info h1 i").removeClass('fa-check-circle');
            
            $("input[name='collection_id']").val(addressid);

            $(".collect-option .parsley-errors-list").fadeOut(200);
            
        }else{
            $(".shipping-addresses .address-info h1 i").removeClass("active");
            $(".shipping-addresses .address-info h1 i").addClass('fa-circle');
            $(".shipping-addresses .address-info h1 i").removeClass('fa-check-circle');
            
            $("input[name='shipping_id']").val(addressid);
            
            if($(".user-address-select span i").hasClass("active")){
                $("input[name='billing_id']").val(addressid);
            }
        }
        
        
        $(this).addClass("active");
        $(this).removeClass('fa-circle');
        $(this).addClass('fa-check-circle');
    });

    $(".user-address-select span").on("click", function(){
        if($(this).children("i").hasClass("active")){
            $(this).children("i").removeClass("active");
            $(this).children("i").addClass('fa-circle');
            $(this).children("i").removeClass('fa-check-circle');
            $(".billing-hide").slideDown(500);
            $("input[name='billing_id']").val($("input[name='shipping_id']").val());
        }else{
            $(this).children("i").addClass("active");
            $(this).children("i").removeClass('fa-circle');
            $(this).children("i").addClass('fa-check-circle');
            $(".billing-hide").slideUp(500);
        }
    });
    
    $(".no-submit").submit(function(e){
        e.preventDefault();
        return false;
    });

    $(".shipping-options-list-options input").change(function(){
        $(".shipping-option-form-results input[name='shipping_title']").val($(this).data('title'));
        $(".shipping-option-form-results input[name='option']").val($(this).val());
        $(".shipping-option-form-results input[name='shipping_description']").val($(this).data('description'));
        $(".shipping-option-form-results input[name='shipping_time_of_arrival']").val($(this).data('arrival'));
    });

    $(".payment-option-block h2").on('click', function(){

        if(!$(this).hasClass('active')){
            $(".payment-info-block").slideUp(300);
            $(".payment-option-block h2").removeClass('active');
            $(".payment-option-block h2 i").removeClass('fa-check-circle-o');
            $(".payment-option-block h2 i").addClass('fa-circle-o');

            $(this).parent().find(".payment-info-block").slideDown(300);
            $(this).find('i').addClass('fa-check-circle-o');
            $(this).find('i').removeClass('fa-circle-o');
            $(this).addClass('active');
        }else{
            $(".payment-info-block").slideUp(300);
            $(".payment-option-block h2").removeClass('active');
            $(".payment-option-block h2 i").removeClass('fa-check-circle-o');
            $(".payment-option-block h2 i").addClass('fa-circle-o');
        }
    });

    $(".address-edit").click(function(e){
        e.preventDefault();

        var form = $(this).attr('href');
        console.log(form);
        $(".add-address-overlay").fadeIn(400);
        $(form).fadeIn(400);
    });

    $(".add-to-wishlist").click(function(e){
        e.preventDefault();

        if($(this).hasClass('check-variants') && $(".filter-select").length){
            var names = {};
            var formFilled = true;
            $('input.filter-select:radio').each(function() { // find unique names
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() { // then count them
                count++;
            });
            if($('input.filter-select:radio:checked').length != count) {
                formFilled = false;
            }
            $("select.filter-select").each(function(){
                if($(this).val() == ""){
                    formFilled = false;
                }
            });

            if(formFilled){
                $(".wishlist-modal input[name='quantity']").val($(".product-view form input[name='quantity']").val());
                $(".wishlist-modal input[name='filters']").val($(".filter-select").serialize());
                $(".wishlist-overlay").fadeIn(300);
                $(".wishlist-modal").fadeIn(300);  
            }else{
                $(".check-variants span").fadeIn(300);
                setTimeout(function(){
                    $(".check-variants span").fadeOut(300);
                }, 5000);
            }
        }else{
            $(".wishlist-overlay").fadeIn(300);
            $(".wishlist-modal").fadeIn(300);    
        }
    });

    $(".product-listing-block .wishlist-modal-button, .cart-product .wishlist-modal-button").click(function(e){
        e.preventDefault();
        var id = $(this).data("id");
        $(".wishlist-modal input[name='product_id']").val(id);
        $(".wishlist-overlay").fadeIn(300);
        $(".wishlist-modal").fadeIn(300);
        $(this).toggleClass('fa-heart-o fa-heart');
        $(this).addClass('active');
    });

    $(".wishlist-modal h1 a, .wishlist-overlay").click(function(e){
        e.preventDefault();
        $(".wishlist-overlay").fadeOut(300);
        $(".wishlist-modal").fadeOut(300);
    });

    $("body").on("click", ".form-group label.filter-select-label", function(){
        $(".form-group label.filter-select-label").removeClass("active");
        $(this).addClass("active");
        // $(".form-group label.filter-select-label span").hide();
        // $(this).find("span").fadeIn(300);
    });

    $(".form-group label.filter-select-label:not(.active)").mouseenter(function(){
        $(".form-group label.filter-select-label span").removeAttr('style');
        $(".form-group label.filter-select-label.active span").hide();
        // $(this).find("span").fadeIn(300);
    }).mouseleave(function(){
        // $(".form-group label.filter-select-label span").hide();
        $(".form-group label.filter-select-label span").removeAttr('style');
        $(".form-group label.filter-select-label.active").find("span").fadeIn(300);
    });

    // $(".filter-block label.filter-select-label").click(function(){
    //     if($(this).hasClass('active')){
    //         $(this).removeClass("active");
    //         $(this).find("span").hide(300);
    //     }else{
    //         $(this).addClass("active");
    //         $(this).find("span").fadeIn(300);
    //     }
    // });

    $(".filter-block label.filter-select-label").mouseenter(function(){
        $(".filter-block label.filter-select-label span").hide();
        $(this).find("span").fadeIn(300);
    }).mouseleave(function(){
        $(".filter-block label.filter-select-label span").hide();
        $(".filter-block label.filter-select-label.active").find("span").fadeIn(300);
    });

    $(".profile-top-nav span").click(function(e){
        if($(window).width() < 768){
            e.preventDefault();

            $(".wishlist-nav-overlay").fadeIn(300);
            $(".wishlist-nav-modal").fadeIn(300);
        }
    });

    $(".wishlist-nav-overlay").click(function(){
        $(".wishlist-nav-overlay").fadeOut(300);
        $(".wishlist-nav-modal").fadeOut(300);
    });

    $(".add-assembly-button").click(function(e){
        var href = $(this).attr("href");
        e.preventDefault();

        $(this).closest(".product-listing-block").fadeOut(500);
        setTimeout(function(){
            window.location.href = href;
        }, 450);
    });
});