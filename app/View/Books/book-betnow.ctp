
 <div class="book">
  <?php echo $this->element("desktop_book_detail_header"); ?>
            <p class="help-block">Bet now.</p>
            <div class="sub-head">
              <div class="message col-xs-9">
                <p>Bet now!</p>
              </div>
              <div class="col-xs-3">
                <?php if ($book['User']['id'] == $this->Session->read('User.id')):?>
                  <button class="btn btn-default btn-block btn-delete make-delete" data-toggle="modal" data-target="#Delete">Delete & Copy</button>
                <?php endif;?>
              </div>
            </div>
            
            <table class="book-table table table-bordered">
              <tbody>
                <?php foreach ($book['Content'] as $content):?>
                  <tr>
                    <td><?php echo $content['no'] ?><input name="contentid" type="hidden" value="<?php echo $content['id']?>"></td>
                    <td>
                      <div class="title">
                        <p class="thetitle" id="title_<?php echo $content['id']; ?>"><?php echo $content['title']?></p>
                      </div>
                      <div class="left">
                        <span class="odds">Odds</span>
                        <p class="content_odds"><?php echo $content['odds']?></p>
                        <span><?php echo $this->Html->image('/img/icon2.png'); ?>:<a href="#" data-contentid="<?php echo $content['id']?>" data-content='<?php echo json_encode($content['bets']);?>' class="loadAllBets" data-toggle="modal" data-target="#modal2" val="<?php echo $content['id']; ?>"><span class="content_user_count"><?php echo $content['user_count']?></span></a></span>
                      </div>
                      <div class="right">
                        <button class="btn btn-danger btn-block make-bet" data-toggle="modal" data-odds="<?php echo $content['odds']?>" data-title="<?php echo $content['title']?>" data-contentid="<?php echo $content['id']?>" data-target="#Bet">Bet</button>
                        <span class="book-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<span class="content_bet_total"><?php echo $content['bet_total']?></span></span>
                      </div>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>

            <?php echo $this->element("desktop_book_detail_footer"); ?>


            <div class="sns-buttons">
              <?php echo $this->element("zenback"); ?>
            </div><!--End of SNS Buttons -->

            <div class="facebook">
              
            </div><!--End of facebook-->

            <div class="twitter">
              
            </div><!--End of twitter-->
      
          </div>


<!-- Modal -->
<div class="modal fade" id="Bet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Bet</h4>
      </div>
      <div class="modal-body">
        <?php if(CakeSession::read('User.id')){
          } else{
            echo '<div class="alert"><strong>To bet, then please login.</strong></div>';
          }
        ?>
        <p class="content-bets-title">Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Length84</p>
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-sm-5 control-label">Odds <span class="modal-red2 content-odd-value">999.999</span> ×</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="<?php echo CakeSession::read('User.default_rate');?>">
              <input type="hidden" class="currentContentIdOnModal">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button <?php if(CakeSession::read('User.id')) echo 'type="submit"'; ?> class="btn btn-danger btn-lg bet-btn">Bet</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Bet list</h4>
      </div>
      <div class="modal-body">
        <p class="content-bets-title">Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Length84</p>

        <div class="modal-entry">
          <div class="modal-single-entry">
            <img style="width:20%" src="<?php echo "http://graph.facebook.com/".'1439948026269431'."/picture?type=square"?>"><a href="profile-home.html" class="username"> hideichi_saito</a>
            <p>Bet: <span>9999</span></p>
            <p>2013/12/31-12:59</p>
          </div>
        </div>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Delete Button -->
<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Book Delete</h4>
      </div>
      <div class="modal-body">
        <p>You can delete a book. However, if you have deleted a book that has bets already placed on it the bookmaker receives a penalty. If nobody has bet yet there is no penalty.</p>
        <form>
          <div class="form-group">
            <label>Delete Detail</label>
            <textarea class="form-control" rows="7"></textarea>
            <input type="hidden" class="currentContentIdOnModal">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger delete-book">Delete</button>
        <button type="button" class="btn btn-warning delete-copy-book">Delete & Copy</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    