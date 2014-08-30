<h2><?php echo $book['Book']['title']?></h2>
    <span class="badge-state"><?php echo $book['Book']['state']?></span>
    <span class="badge-category"><?php echo $book['Book']['category']?></span>
    <p>
      <input type="hidden" id="bookid" value="<?php echo $book['Book']['id']?>">
      <span class="book-icons"><?php echo $this->Html->image('/img/icon2.png'); ?>:<?php echo $book['Book']['user_all_count']?></span>
      <span class="book-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<?php echo $book['Book']['bet_all_total']?></span>
      <span>Book Id: <?php echo $book['Book']['id']?></span><br/>
      <span class="small-text">
      Bet Start:<?php echo CakeTime::format( $book['Book']['bet_start'],'%Y/%m/%d %H:%M')?><br/>
      Bet Finsh:<?php echo CakeTime::format( $book['Book']['bet_finish'],'%Y/%m/%d %H:%M')?><br/>
      Result :<?php echo CakeTime::format( $book['Book']['result_time'],'%Y/%m/%d %H:%M')?>
      </span>
    </p>