
    $(".add-address a").click(function(e){
        e.preventDefault();
        var text = $(this).text();
        $(this).text(text == "Add address" ? "Hide" : "Add address");
        $(".add-address-form").slideToggle(500);
    });
    
    $(".add-address-form form").submit(function(){
        var url = $(this).attr('action');
        
        if(url.indexOf("/profile/addresses") >= 0 || url.indexOf("/profile/pets") >= 0){
            $(this).submit
        }else{
            $.ajax({
                type: 'post',
                url: url,
                data: $(this).serialize(), 
                async: false,
                dataType: 'json'

            }).done(function(data){
                var html = '<div class="col-xs-12 padding-0 address-info" data-addressid="'+data.address.id+'"><h1>'+
                    data.address.address_line_1+', '+data.address.address_line_2;
            
                if(data.address.default_address == 1){
                    $("input[name='billing_id']").val(data.address.id);
                    $("input[name='shipping_id']").val(data.address.id);
                    $(".order-continue-row input").removeAttr("disabled");
                    html += '<i class="fas fa-circle" aria-hidden="true"></i>';
                }else{
                    html += '<i class="far fa-circle" aria-hidden="true"></i>';
                }
                html += '<span>Use this address</span></h1><div class="col-xs-12">'+
                            '<div class="col-xs-12 col-xs-offset-0  col-md-6 col-md-offset-0 col-lg-5 col-lg-offset-1">'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">First Name:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.name+'</p>'+
                                '</div>'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">Company Name:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.company+'</p>'+
                                '</div>'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">Surburb:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.suburb+'</p>'+
                                '</div>'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">Province / State:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.province+'</p>'+
                                '</div>'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">Postal Code:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.postal_code+'</p>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-xs-12 col-xs-offset-0 col-md-6 col-md-offset-0 col-lg-5 col-lg-offset-1">'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">Last Name:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.surname+'</p>'+
                                '</div>'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">Street Address:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.address_line_1+', '+data.address.address_line_2+'</p>'+
                                '</div>'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">City / Town:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.city+'</p>'+
                                '</div>'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">Country:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.country+'</p>'+
                                '</div>'+
                                '<div class="col-xs-12 padding-0">'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">Phone Number:</p>'+
                                    '<p class="col-xs-12 col-sm-6 col-md-6">'+data.address.phone+'</p>'+
                                '</div>'+
                                '<span class="col-xs-12 col-xs-offset-0 col-md-6 col-md-offset-4">May be printed on the label to assist delivery</span>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                $(".add-address-form form input[type='text']").val("");
                $(".user-addresses").append(html);
                $(".add-address-form").slideUp(500);
                location.reload();
            }).fail(function(error){
                console.log(error);
            });
        
            return false;
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
            
            $("input[name='billing_id']").val(addressid);
            
        }else{
            $(".shipping-addresses .address-info h1 i").removeClass("active");
            
            $("input[name='shipping_id']").val(addressid);
            
            if($(".user-address-select span i").hasClass("active")){
                $("input[name='billing_id']").val(addressid);
            }
        }
        
        $(this).addClass("active");
    });

    $(".user-address-select span").on("click", function(){
        if($(this).children("i").hasClass("active")){
            $(this).children("i").removeClass("active");
            $(".billing-hide").slideDown(500);
            $("input[name='billing_id']").val(("input[name='shipping_id']").val());
        }else{
            $(this).children("i").addClass("active");
            $(".billing-hide").slideUp(500);
        }
    });
    
    $(".cart-product input").blur(function(){
        var quantity = $(this).val();
        
        var url = $(this).parent().parent().attr('action');

        var me = $(this);

        if(quantity.match(/^\d+$/)) {
            $.ajax({
                type: 'post',
                url: url,
                data: $(this).parent().parent().serialize(), 
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
    $(".no-submit").submit(function(e){
e.preventDefault();
return false;
    });
