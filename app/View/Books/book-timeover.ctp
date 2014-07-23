<div class="book">
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
                        <p class="thetitle"><?php echo $content['title']?></p>
                      </div>
                      <div class="left">
                        <span class="odds">Odds</span>
                        <p class="content_odds"><?php echo $content['odds']?></p>
                        <span><?php echo $this->Html->image('/img/icon2.png'); ?>:<a href="#" data-contentid="<?php echo $content['id']?>" data-content='<?php echo json_encode($content['bets']);?>' class="loadAllBets" data-toggle="modal" data-target="#modal2"><span class="content_user_count"><?php echo $content['user_count']?></span></a></span>
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
            
            <div class="article">
              <div class="article-headers">
                <h3>Details</h3>
              </div>
              <p><?php echo $book['Book']['details']?></p>
            </div>
            <div class="article">
              <div class="article-headers">
                <h3>Annoucement</h3>
              </div>
              <p><?php echo $book['Book']['announcement_type']?>: 
                <?php if (strtolower($book['Book']['announcement_type']) === 'url'):?>
                  <a href="<?php echo $book['Book']['announcement_name']?>"><?php echo $book['Book']['announcement_name']?></a>
                <?php else:?>
                  <?php echo $book['Book']['announcement_name']?>
                <?php endif;?>
              </p>
              <p><?php echo $book['Book']['announcement']?></p>
            </div>
            <div class="article">
              <div class="article-headers">
                <h3>Result</h3>
              </div>
              
            </div>
            
            <div class="sns-buttons">
              
            </div><!--End of SNS Buttons -->

            <div class="facebook">
              
            </div><!--End of facebook-->

            <div class="twitter">
              
            </div><!--End of twitter-->

          </div>