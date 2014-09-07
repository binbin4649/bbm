<?php echo $this->element("mobile_book_detail_header"); ?>

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
        <span class="odds">Odds</span>
        <span class="content-odds"><?php echo $content['odds']?></span>
        <input type="hidden" name="contentid" value="<?php echo $content['id']?>">
        <a href="#Win" data-rel="popup" data-title="<?php echo $content['title']?>" data-contentid="<?php echo $content['id']?>" data-position-to="window" class="bet-btn ui-btn ui-btn-inline ui-corner-all make-win btn-success" data-transition="pop">Win</a></p>
      </li>
    <?php endforeach;?>
  </ul>
 </div>

<div data-role="popup" id="Win" data-theme="a" class="ui-corner-all">
    <form>
        <div style="padding:10px 20px;" class="modal-content">
            <!-- <h3 class="content-bets-title">Sample-1</h3> -->
            <h4 class="modal-title">Choose a win</h4>
            <form>
              <!-- <label>Odds : <span class="content-odd-value">999.999</span></label> -->
              <!-- <input type="number" name="bet" value="<?php echo CakeSession::read('User.default_rate');?>"> -->
              <input type="hidden" class="currentContentIdOnModal">
              <textarea class="form-control" rows="7" cols="7" style="height: 160px;width: 230px;"></textarea>
              <button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Win</button>
            </form>
        </div>
    </form>
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