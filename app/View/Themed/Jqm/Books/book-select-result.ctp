<?php echo $this->element("mobile_book_detail_header"); ?>

<div data-role="content">
  <ul data-role="listview">
    <?php foreach ($book['Content'] as $content):?>
      <li>
        <h3><?php echo $content['title']?></h3>
        <p style="margin:0px;"><span><?php echo $this->Html->image('/img/icon2.png'); ?>:<span class="content_user_count"><?php echo $content['user_count']?></span></span>  <span class="book-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<span class="content_bet_total"><?php echo $content['bet_total']?></span></span>
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

<?php echo $this->element("mobile_book_detail_footer"); ?>



<!-- Modal -->
<!-- <div class="modal fade" id="Win" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Choose a win</h4>
      </div>
      <div class="modal-body">
        <p class="content-bets-title">Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Length84</p>
        <form>
          <div class="form-group">
            <label>Result Detail</label>
            <textarea class="form-control" rows="7"></textarea>
            <input type="hidden" class="currentContentIdOnModal">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Win</button>
      </div>
    </div>
  </div>
</div> -->
