$(document).ready(function() {

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

        $(".required").each(function() {
          if (($(this).val() === '') || ($(".required").val() === ''))
          {
            $("#make-book").attr("data-target","#Omissions");
          }
          else if ($(this).val() !== '')
          {
            $("#make-book").attr("data-target","#makeBook");
          }
        });
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



if (/books\/\d/.test(document.location.href)) {
    var currentContent, currentContentId;
    var bookInfo;
    $('.loadAllBets').on('click',function(){
        var self = this;
        currentContent = $(this).attr('data-content');
        currentContentId = $(this).attr('data-contentid');
        updateBetsOnModal(currentContent);
    });

    function updateBetsOnModal(currentContent) {
        var bets = JSON.parse(currentContent);
        var betsHTML = '';
        for (bet in bets) {
            betsHTML += '<div class="modal-single-entry">'
            +'<img style="width:10%" src="http://graph.facebook.com/'+bets[bet].User.facebook_id+'/picture?type=square"><a href="profile-home.html" class="username">'+bets[bet].User.name+'</a>'
            +'<p>Bet: <span>'+bets[bet].Bet.betpoint+'</span></p>'
            +'<p>'+Date.parse(bets[bet].Bet.created).toString("yyyy/MM/dd hh:mm")+'</p>'
            +'</div>';
        }
        $('#modal2').find('.modal-entry').html(betsHTML);
        $('#modal2').find('.content-bets-title').html($(this).parents('tr').find('.thetitle').html());
    }

    setInterval(function(){
        $.ajax({
          data: {
            book: {
              id: $('#bookid').val()
            }
          },
          url: '/books/'+$('#bookid').val()+'?format=json',
          dataType:'json',
          success: function(response){
            bookInfo =response ;
            if (response.Book) {
                $('#book_user_all_count').html(response.Book.user_all_count);
                $('#book_bet_all_total').html(response.Book.bet_all_total);
            }
            var content;
            if (response.Content) {
                $.each(response.Content, function(n,i){
                    content = $('input[name=contentid][value='+i.id+']');
                    content.parents('tr').find('.content_user_count').html(i.user_count);
                    content.parents('tr').find('.content_bet_total').html(i.bet_total);
                    content.parents('tr').find('.content_odds').html(i.odds);
                    $('a[data-contentid='+i.id+']').attr({'data-content':JSON.stringify(i.bets)});
                });
            }
            if (currentContentId) {
                updateBetsOnModal($('a[data-contentid='+currentContentId+']').attr('data-content'));
            }

          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
          }
        });
      },10000);

    $('.make-bet').on('click',function(){
        $('#Bet').find('.content-bets-title').html($(this).parents('tr').find('.thetitle').html());
        $('#Bet').find('.content-odd-value').html($(this).parents('tr').find('.content_odds').html());
        $('#Bet').find('.currentContentIdOnModal').val($(this).parents('tr').find('a.loadAllBets').attr('data-contentid'));

    });

    $('.make-win').on('click',function(){
        $('#Win').find('.content-bets-title').html($(this).parents('tr').find('.thetitle').html());
        $('#Win').find('.currentContentIdOnModal').val($(this).parents('tr').find('a.loadAllBets').attr('data-contentid'));
    });


    $('#Bet button[type=submit]').on('click',function(event){
        event.preventDefault();
        $(event.target).addClass('disabled');
        $.ajax({
          data: {
            book_id: $('#bookid').val(),
            content_id: $(event.target).parents('.modal-content').find('.currentContentIdOnModal').val(),
            oddFactor: $(event.target).parents('.modal-content').find('input').val()
          },
          type: 'POST',
          url: '/bets',
          dataType:'json',
          success: function(response){
            console.log(response);
            $('#Bet').modal('hide');
            $('button[type=submit]').removeClass('disabled');
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
          }
        });
    });

    $('#Win button[type=submit]').on('click',function(event){
        event.preventDefault();
        $(event.target).addClass('disabled');
        $.ajax({
          data: {
            book_id: $('#bookid').val(),
            content_id: $(event.target).parents('.modal-content').find('.currentContentIdOnModal').val(),
            result_detail: $(event.target).parents('.modal-content').find('textarea').val()
          },
          type: 'POST',
          url: '/books/win',
          dataType:'json',
          success: function(response){
            $('#Win').modal('hide');
            $('button[type=submit]').removeClass('disabled');
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
          }
        });
    });


    $('#Delete .delete-book').on('click',function(event){
        event.preventDefault();
        $(event.target).addClass('disabled');
        $.ajax({
          data: {
            book_id: $('#bookid').val(),
            delete_detail:$('#Delete textarea').val()
          },
          type: 'POST',
          url: '/books/deleteBook',
          dataType:'json',
          success: function(response){
            console.log(response);
            $('#Delete').modal('hide');
            $('.delete-book').removeClass('disabled');
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
          }
        });
    });

      $('#Delete .delete-copy-book').on('click',function(event){
        event.preventDefault();
        $(event.target).addClass('disabled');
        $.ajax({
          data: {
            book_id: $('#bookid').val(),
            delete_detail:$('#Delete textarea').val()
          },
          type: 'POST',
          url: '/books/deleteCopyBook',
          dataType:'json',
          success: function(response){
            console.log(response);
            $('#Delete').modal('hide');
            $('.delete-copy-book').removeClass('disabled');
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
          }
        });
    });

    $('#Delete .copy-book').on('click',function(event){
        event.preventDefault();
        $(event.target).addClass('disabled');
        $.ajax({
          data: {
            book_id: $('#bookid').val(),
          },
          type: 'POST',
          url: '/books/copyBook',
          dataType:'json',
          success: function(response){
            console.log(response);
            if (response.book_id){
              window.location.href="/books/"+response.book_id;
            }
            $('#Delete').modal('hide');
            $('.copy-book').removeClass('disabled');
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
          }
        });
    });

}




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

