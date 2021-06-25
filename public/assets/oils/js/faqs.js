$(document).ready(function(){
    $(".questionBlock h3").click(function(){
        if($(this).hasClass("active")){
            $(".questionBlock > div").slideUp(500);
            $(".questionBlock h3").removeClass("active");
            $(".questionBlock").removeClass("active");
        }else{
            $(".questionBlock > div").slideUp(500);
            $(".questionBlock h3").removeClass("active");
            $(".questionBlock").removeClass("active");
            $(this).parent().children("div").slideDown(500);
            $(this).parent().addClass("active");
            $(this).addClass("active");
        }
    });

    $(".selectors a").click(function(e){
        e.preventDefault();
        var category = $(this).attr("href");
        var title = $(this).text();

        $(".selectors a").removeClass("active");

        if(category == "" || category == 0){
            $(".questionBlock").fadeIn(500);
        }else{
            $(".questionBlock").fadeOut(500);
            $(".questionBlock[data-category='"+category+"']").fadeIn(500);
        }

        $(this).addClass("active");
        $(".update-me-title").text(title);
    });
});

