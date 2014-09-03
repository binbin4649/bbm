

$(document).bind('pageshow', function() {
    $("div.text-more").click(function(){
		if($(this).attr("more")) {
			$(this).parent("li").addClass("ui-li-static");
			$(this).removeAttr("more");
			$(this).html("Read more...");
		} else {
			$(this).parent("li").removeClass("ui-li-static");
			$(this).attr("more",1);
			$(this).html("Read less...");
		}
	});
});