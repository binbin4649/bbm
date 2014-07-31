var booksPageFunctionality = function(){
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
          beforeSend: function(){
            console.log({data: {
            book_id: $('#bookid').val(),
            content_id: $(event.target).parents('.modal-content').find('.currentContentIdOnModal').val(),
            oddFactor: $(event.target).parents('.modal-content').find('input').val()
          }});
          },
          type: 'POST',
          url: '/bets',
          dataType:'json',
          success: function(response){
            console.log(response);
            if (typeof $('#Bet').modal == 'function'){
              $('#Bet').modal('hide');
            }
            if (typeof $('#Bet').popup == 'function'){
              $('#Bet').popup("close");
            }
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
};




$(document).ready(function(){


if (/books\/\d/.test(document.location.href)) {
    booksPageFunctionality();
}

    if (document.location.hash == '#more_point'){
      $('#morePointModal').modal({show: true});
    }
});


