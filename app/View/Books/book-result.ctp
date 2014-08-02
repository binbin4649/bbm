<div class="book">
  <?php echo $this->element("desktop_book_detail_header"); ?>

            <p class="help-block">Result were presented.</p>
            <div class="sub-head">
              <div class="message col-xs-9">
                <p>WIN : <?php echo $winner[1]['title'];?><br>
                  Final odds : <?php echo $winner[1]['odds'];?></p>
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
                        <p class="thetitle"><?php echo $content['title']?></p>
                      </div>
                      <div class="left">
                        <span class="odds">Odds</span>
                        <p class="content_odds"><?php echo $content['odds']?></p>
                        <span><?php echo $this->Html->image('/img/icon2.png'); ?>:<a href="#" data-contentid="<?php echo $content['id']?>" data-content='<?php echo json_encode($content['bets']);?>' class="loadAllBets" data-toggle="modal" data-target="#modal2"><span class="content_user_count"><?php echo $content['user_count']?></span></a></span>
                      </div>
                      <div class="right">
                        <?php if ($content['id'] == $book['Book']['win_contents_id']):?>
                          <button class="btn btn-success btn-block">Win</button>
                        <?php else:?>
                          <button class="btn btn-block">-</button>
                        <?php endif;?>
                        <span class="book-icons"><?php echo $this->Html->image('/img/icon1.png'); ?>:<span class="content_bet_total"><?php echo $content['bet_total']?></span></span>
                      </div>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>

  <?php echo $this->element("desktop_book_detail_footer"); ?>
            
            <div class="sns-buttons">
              
            </div><!--End of SNS Buttons -->

            <div class="facebook">
              
            </div><!--End of facebook-->

            <div class="twitter">
              
            </div><!--End of twitter-->

          </div>

          
<!-- Modal bet list -->
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

<!-- Modal Copy Button -->
<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Book Copy</h4>
      </div>
      <div class="modal-body">
        <p>In replicating this book, you can create a new book.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-warning copy-book">Copy</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
