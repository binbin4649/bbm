<?php echo $this->element("mobile_book_detail_header"); ?>
<p class="message">Announcement Scheduled : <?php echo CakeTime::format( $book['Book']['result_time'],'%Y/%m/%d %H:%M')?><br>
Announcement How, <?php echo $book['Book']['announcement_type']?><br>
<?php if (strtolower($book['Book']['announcement_type']) === 'url'):?>
  <a href="<?php echo $book['Book']['announcement_name']?>"><?php echo $book['Book']['announcement_name']?></a>
<?php else:?>
  <?php echo $book['Book']['announcement_name']?>
<?php endif;?>
</p>
<div data-role="content">
  <ul data-role="listview">
    <?php foreach ($book['Content'] as $content):?>
      <li>
        <h3 id="title_<?php echo $content['id']; ?>"><?php echo $content['title']?></h3>
        <p style="margin:0px;">
        <a href="#betlist" data-rel="popup" data-transition="pop" data-contentid="<?php echo $content['id']?>" data-content='<?php echo json_encode($content['bets']);?>' class="loadAllBets" data-toggle="modal" data-target="#modal2" val="<?php echo $content['id']; ?>">
        <span><?php echo $this->Html->image('/img/icon2.png'); ?>:
          <span class="content_user_count"><?php echo $content['user_count']?></span>
        </span>
        </a>
        <span class="book-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<span class="content_bet_total"><?php echo $content['bet_total']?></span></span>
        <input type="hidden" name="contentid" value="<?php echo $content['id']?>">
        <button class="bet-btn ui-btn ui-btn-inline ui-corner-all">-</button></p>
      </li>
    <?php endforeach;?>
  </ul>
 </div>

<div data-role="popup" id="betlist" data-theme="a" class="ui-corner-all">
      <div style="padding:10px 20px;" class="modal-content">
          <h3 class="content-bets-title">content name</h3>
          <ul data-role="listview" class="">
            <li>
              <a href="#">
              <?php echo $this->Html->image('/img/profile-photo.jpg'); ?>
              Hideichi Saito  Bet : 9999  2014/08/14 18:27
              </a>
            </li>
          </ul>
          <a href="#" data-rel="back" class="ui-btn ui-btn-inline ui-corner-all">Close</a>
      </div>
</div>

<?php echo $this->element("mobile_book_detail_footer"); ?>