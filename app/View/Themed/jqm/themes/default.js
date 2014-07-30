

$(document).bind('pageshow', function() {
    $(".text-more").click(function(){
        $(".text-more").toggleClass("more");
        if($(".text-more").html() == "Read more...")
        {
            $(".text-more").html("Read less...");
        }
        else
        {
            $(".text-more").html("Read more...");
        }
    });
});