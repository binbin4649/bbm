  <div class="book-head">
    <h2><?php echo $book['Book']['title']?></h2>
    <div class="col-xs-8">
      <span class="book-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:<span id="book_user_all_count"><?php echo $book['Book']['user_all_count']?></span></span>
      <span class="book-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<span id="book_bet_all_total"><?php echo $book['Book']['bet_all_total']?></span></span>
      <span>Book Id: <?php echo $book['Book']['id']?><input type="hidden" id="bookid" value="<?php echo $book['Book']['id']?>"></span>
      <p>Bet Start:<?php echo CakeTime::format( $book['Book']['bet_start'],'%Y/%m/%d %H:%M')?> | Bet Finsh:<?php echo CakeTime::format( $book['Book']['bet_finish'],'%Y/%m/%d %H:%M')?> </p> 
      <p>Result :<?php echo CakeTime::format( $book['Book']['result_time'],'%Y/%m/%d %H:%M')?></p>
    </div>
    <div class="col-xs-4">
      <span class="badge-state"><?php echo $book['Book']['state']?></span>
      <span class="badge-category"><?php echo $book['Book']['category']?></span>
      <div class="user">
        <a href="profile-home.html" class="username"><img style="width:20%" src="<?php echo "http://graph.facebook.com/".$book['User']['facebook_id']."/picture?type=square"?>"><?php echo $book['User']['name']?></a>
        <p>Created :<?php echo CakeTime::format( $book['Book']['created'],'%Y/%m/%d %H:%M')?></p>
      </div>
    </div>
  </div>