var booksPageFunctionality = function(){
    var currentContent, currentContentId;
    var bookInfo;
    $('.loadAllBets').on('click',function(){ 
        var self = this;
        currentContent = $(this).attr('data-content');
        currentContentId = $(this).attr('data-contentid');
        updateBetsOnModal(currentContent);
		var val = $(this).attr("val");
		$('#modal2').find('.content-bets-title').html($("#title_"+val).html());
    $('#betlist-popup').find('.content-bets-title').html($("#title_"+val).html());
    });

    function updateBetsOnModal(currentContent) {
      //alert(currentContent);
        var bets = JSON.parse(currentContent);
        var betsHTML = '';
        var betsHTMLMobile = '<h3 class="content-bets-title">content name</h3><ul class="ui-listview" data-role="listview">';
        for (bet in bets) {
		    betsHTML += '<div class="modal-single-entry">'
            +'<img style="width:10%" src="http://graph.facebook.com/'+bets[bet].User.facebook_id+'/picture?type=square"><a href="'+SITE_LINK+'users/'+ bets[bet].User.id +'" class="username">'+bets[bet].User.name+'</a>'
            +'<p>Bet: <span>'+bets[bet].Bet.betpoint+'</span></p>'
            +'<p>'+(bets[bet].Bet.created).toString("yyyy/MM/dd hh:mm")+'</p>'
            +'</div>';
			betsHTMLMobile +='<li><a href="'+SITE_LINK+'users/'+ bets[bet].User.id +'" class="ui-btn popup-li"><img style="width:20%" class="ui-li-icon" src="http://graph.facebook.com/'+bets[bet].User.facebook_id+'/picture?type=square"><div style="float:right;"><h2>'+bets[bet].User.name+'</h2><span class="tuika_date">'+(bets[bet].Bet.created).toString("MM/dd hh:mm")+'</span> Bet : '+bets[bet].Bet.betpoint+'</div></a></li>';
        }
		betsHTMLMobile += '</ul><a href="#" data-rel="back" class="ui-btn ui-btn-inline ui-corner-all">Close</a>';
		//alert(betsHTML);
        $('#modal2').find('.modal-entry').html(betsHTML);
        $('#betlist-popup').find('.modal-content').html(betsHTMLMobile);
		
        
    }

    setInterval(function(){
        $.ajax({
          data: {
            book: {
              id: $('#bookid').val()
            }
          },
          url: SITE_LINK+'books/'+$('#bookid').val()+'?format=json',
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
                    var desctopContentRecord = content.parents('tr');
                    var mobileContentRecord = content.parents('li');
                    if (desctopContentRecord.length){
                      desctopContentRecord.find('.content_user_count').html(i.user_count);
                      desctopContentRecord.find('.content_bet_total').html(i.bet_total);
                      desctopContentRecord.find('.content_odds').html(i.odds);
                      desctopContentRecord.find('.make-bet').attr({'data-odds':i.odds});
                      console.log(desctopContentRecord.find('a.make-bet').attr('data-odds'),i.odds);
                      $('a[data-contentid='+i.id+']').attr({'data-content':JSON.stringify(i.bets)});
                    }
                    if (mobileContentRecord.length) {
                      mobileContentRecord.find('.content_user_count').html(i.user_count);
                      mobileContentRecord.find('.content_bet_total').html(i.bet_total);
                      mobileContentRecord.find('.content_odds').html(i.odds);
                      mobileContentRecord.find('.make-bet').attr({'data-odds':i.odds});
                    }
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
        $('#Bet').find('.content-bets-title').html($(this).attr('data-title'));
        $('#Bet').find('.content-odd-value').html($(this).attr('data-odds'));
        $('#Bet').find('.currentContentIdOnModal').val($(this).attr('data-contentid'));

    });

    $('.make-win').on('click',function(){
        $('#Win').find('.content-bets-title').html($(this).attr('data-title'));
        $('#Win').find('.currentContentIdOnModal').val($(this).attr('data-contentid'));
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
          url: SITE_LINK+'bets',
          dataType:'json',
          success: function(response){
            if (typeof $('#Bet').modal == 'function'){
              $('#Bet').modal('hide');
            }
            if (typeof $('#Bet').popup == 'function'){
              $('#Bet').popup("close");
            }
            $('button[type=submit]').removeClass('disabled');
            if(response.Bet != undefined){
            	alert(response.Bet);	
            }else{
            	window.location.reload();
            }
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
            window.location.reload();
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
          url: SITE_LINK+'books/win',
          dataType:'json',
          success: function(response){
            // $('#Win').modal('hide');
            $('button[type=submit]').removeClass('disabled');
            window.location.reload();
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
            window.location.reload();
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
          url: SITE_LINK+'books/deleteBook',
          dataType:'json',
          success: function(response){
            console.log(response);
            $('#Delete').modal('hide');
            $('.delete-book').removeClass('disabled');
            window.location.reload();
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
            window.location.reload();
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
          url: SITE_LINK+'books/deleteBook',
          dataType:'json',
          success: function(response){
            console.log(response);
            $('#Delete').modal('hide');
            $('.delete-copy-book').removeClass('disabled');
            window.location.href=SITE_LINK+"books/add/"+response.book_id;
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
            window.location.reload();
          }
        });
    });

    $('.copy_book_new').on('click',function(event){
        //event.preventDefault();
		//alert("here");
        //$(event.target).addClass('disabled');
        $.ajax({
          data: {
            book_id: $('#bookid').val(),
          },
          type: 'POST',
          url: SITE_LINK+'books/copyBook',
          dataType:'json',
          success: function(response){
            console.log(response);
            if (response.book_id){
              window.location.href=SITE_LINK+"books/"+response.book_id;
            } else {
				alert("You are not authorize to perform this action.");
			}
            $('#Delete').modal('hide');
            $('.copy-book').removeClass('disabled');
          },
          errors: function(a,b,c){
            if (console) console.log(a+' | '+b+' | '+c);
          }
        });
    });
};




$(document).ready(function(){
$("#fblike").click(function(){
	alert("here");
});
if (/books\/\d/.test(document.location.href)) {
    booksPageFunctionality();
}

    if (document.location.hash == '#more_point'){
      //$("#morePointPopup").popup("open");
    }
    if (document.location.hash == '#more_point'){
      $('#morePointModal').modal({show: true});
    }
	
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
	
	$("a#switch").click(function(){
		var link = $(this).attr("val");
		location.href = link;
	});
});


