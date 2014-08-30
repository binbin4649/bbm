<div class="book">
  <?php echo $this->element("desktop_book_detail_header"); ?>

            
            <p class="help-block">This book is time over.</p>
            <div class="sub-head">
              <div class="message col-xs-9">
                <p>Since the book maker has not selected the results within 24 hours, <br>
                  this book is now time over.<br>
                Point that has been bet is refunded. Please refer to the passbook.</p>
              </div>
              <div class="col-xs-3">
                <button class="btn btn-default btn-block btn-delete" data-toggle="modal" data-target="#Delete">Copy</button>
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
                          <button class="btn btn-block">-</button>
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
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Bet list</h4>
      </div>
      <div class="modal-body">
        <p class="content-bets-title"></p>

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