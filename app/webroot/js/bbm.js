$(document).ready(function() {
	$(window).click(function(){
		if($("div.account-btn1").attr("style") == 'display: block;' || $("div.account-btn1").attr("style") == '') {
			$("div.account-btn1").slideUp('1000');
		}
	});
      $("#show_serach").on('click',function(){
        if ($(this).attr("class") == 'show_search') {
           $(this).removeAttr("class");
           $(this).attr("class","close_search");
           
        } else {
           $(this).removeAttr("class");
           $(this).attr("class","show_search");
          
        } 
        $("#normal_search").slideToggle("1000");
      });

	$('[rel=popover]').popover();
	
	//Date Variables
	// 60000 = 1 minute
	//After 5 minutesin 5 minute incrementsevery 5 minutes,
	var bet_start_stamp = Math.ceil(($.now() + (60000 * 5))/1000/60/5)*1000*60*5;
	var bet_start_date = stmapToJpDate(bet_start_stamp);
	var bet_start_time = stampToTime(bet_start_stamp);
	$("#betStartDate").val(bet_start_date);
	$("#betStartTime").val(bet_start_time);

	//After 70 minutesin 5 minute incrementsevery 5 minutes,
	var bet_finish_stamp = Math.ceil(($.now() + (60000 * 70))/1000/60/5)*1000*60*5;
	var bet_finish_date = stmapToJpDate(bet_finish_stamp);
	var bet_finish_time = stampToTime(bet_finish_stamp);
	$("#betFinishDate").val(bet_finish_date);
	$("#betFinishTime").val(bet_finish_time);

	//After 200 minutesin 5 minute incrementsevery 5 minutes,
	var bet_result_stamp = Math.ceil(($.now() + (60000 * 200))/1000/60/5)*1000*60*5;
	var bet_result_date = stmapToJpDate(bet_result_stamp);
	var bet_result_time = stampToTime(bet_result_stamp);
	$("#betResultDate").val(bet_result_date);
	$("#betResultTime").val(bet_result_time);


	//from don.
	$("#add").click(function() {
		$('#book-content-list').find('.hidden').each(function(n,i){
			$(i).removeClass('hidden');
		});
		// $("div#book-content").append('<label for="bookConten6" class="col-sm-1">6,</label><div class="col-sm-11"><input type="text" class="form-control required" id="bookContent6"><br></div><label for="bookConten7" class="col-sm-1">7,</label><div class="col-sm-11"><input type="text" class="form-control required" id="bookContent7"><br></div><label for="bookConten8" class="col-sm-1">8,</label><div class="col-sm-11"><input type="text" class="form-control required" id="bookContent8"><br></div><label for="bookConten9" class="col-sm-1">9,</label><div class="col-sm-11"><input type="text" class="form-control required" id="bookContent9"><br></div><label for="bookConten10" class="col-sm-1">10,</label><div class="col-sm-11"><input type="text" class="form-control required" id="bookContent10"><br></div>');
		$("div#book-content-add").remove();
	});

    $("#make-book").click(function() {
		var i = 0;
		var j = 0;
		//alert("hello");
        $(".required").each(function() {
			i++;
          if (($(this).val().length == 0))
          {
            
          }
          else
          {
			j++;
            
          }
        });
		//alert(i);
		//alert(j);
		if(i == j) {
			$("#make-book").attr("data-target","#makeBook");
		} else {
			$("#make-book").attr("data-target","#Omissions");
			return false;
		}
    });


    $( "#result-select" )
      .change(function() {
        var str = "";
        $( "#result-select option:selected" ).each(function() {
          str += $( this ).val() + " ";
        });
        $('#change').text(str);
      })
      .trigger( "change" );



  //Read More
  $('.article').readmore({
    maxHeight: 140
  });



    var page_like_or_unlike_callback = function(url, html_element) {
      console.log("page_like_or_unlike_callback");
      console.log(url);
      console.log(html_element);
    };

    // In your onload handler
    var checkFB = false;
    setInterval(function(){
      if(typeof FB != 'undefined' && !checkFB) {
        checkFB = true;
        FB.Event.subscribe('edge.create', page_like_or_unlike_callback);
        FB.Event.subscribe('edge.remove', page_like_or_unlike_callback);
      }
    },100);



});// Jquery end.


//oroginal functions.
var toDoubleDigits = function(num) {
	num += "";
	if (num.length === 1) {
	num = "0" + num;
	}
	return num;
};

var stmapToJpDate = function(stamp){
	var date = new Date(stamp);
	var yyyy = date.getFullYear();
	var mm = toDoubleDigits(date.getMonth() + 1);
	var dd = toDoubleDigits(date.getDate());
	return yyyy+"-"+mm+"-"+dd;
};

var stampToTime = function(stamp){
	var date = new Date(stamp);
	var hh = toDoubleDigits(date.getHours());
	var mi = toDoubleDigits(date.getMinutes());
	
	return hh+":"+mi;
};

