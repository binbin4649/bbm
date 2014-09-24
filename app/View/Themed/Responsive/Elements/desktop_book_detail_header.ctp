  <div class="book-head">
    <h2><?php echo $book['Book']['title']?></h2>
    <div class="col-xs-8">
      <span class="book-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:<span id="book_user_all_count"><?php echo $book['Book']['user_all_count']?></span></span>
      <!-- <span class="book-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:<span id="book_user_all_count"><?php echo $book['Book']['usercount']?></span></span> -->
      <span class="book-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<span id="book_bet_all_total"><?php echo $book['Book']['bet_all_total']?></span></span>
      <span class="small-text">Book Id: <?php echo $book['Book']['id']?><input type="hidden" id="bookid" value="<?php echo $book['Book']['id']?>"></span>
      <table>
      <tr><td><?php echo __("Bet Start"); ?></td><td>: <?php echo CakeTime::format( $book['Book']['bet_start'],'%Y/%m/%d %H:%M')?></td></tr>
      <tr><td><?php echo __("Bet Finsh"); ?></td><td>: <?php echo CakeTime::format( $book['Book']['bet_finish'],'%Y/%m/%d %H:%M')?></td></tr>
      <tr><td><?php echo __("Result"); ?></td><td>: <?php echo CakeTime::format( $book['Book']['result_time'],'%Y/%m/%d %H:%M')?></td></tr>
      </table>
      </div>
    <div class="col-xs-4">
      <span class="badge-state"><?php echo $book['Book']['state']?></span>
      <span class="badge-category"><?php echo $book['Book']['category']?></span>
      <div class="user">
        <a href="/users/<?php echo $book['Book']['user_id']?>" class="username"><img style="width:20%" src="<?php echo "http://graph.facebook.com/".$book['User']['facebook_id']."/picture?type=square"?>"><?php echo $book['User']['name']?></a>
        <p>Created :<?php echo CakeTime::format( $book['Book']['created'],'%Y/%m/%d %H:%M')?></p>
      </div>
    </div>
  </div>