<?php echo $this->element("mobile_book_detail_header"); ?>

<div data-role="content">
  <ul data-role="listview">
    <?php foreach ($book['Content'] as $content):?>
      <li>
        <h3><?php echo $content['title']?></h3>
        <p style="margin:0px;"><span><?php echo $this->Html->image('/img/icon2.png'); ?>:<span class="content_user_count"><?php echo $content['user_count']?></span></span>  <span class="book-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<span class="content_bet_total"><?php echo $content['bet_total']?></span></span>
        <input type="hidden" name="contentid" value="<?php echo $content['id']?>">
        <?php if ($content['id'] == $book['Book']['win_contents_id']):?>
          <button class="bet-btn ui-btn ui-btn-inline ui-corner-all btn-success">Win</button>
        <?php else:?>
          <button class="bet-btn ui-btn ui-btn-inline ui-corner-all">-</button>
        <?php endif;?>
        <!-- <a href="#Bet" data-rel="popup" data-title="<?php echo $content['title']?>" data-odds="<?php echo $content['odds']?>" data-contentid="<?php echo $content['id']?>" data-position-to="window" class="bet-btn ui-btn ui-btn-inline ui-corner-all make-bet" data-transition="pop">Bet</a></p> -->
      </li>
    <?php endforeach;?>
  </ul>
 </div>

<?php echo $this->element("mobile_book_detail_footer"); ?>