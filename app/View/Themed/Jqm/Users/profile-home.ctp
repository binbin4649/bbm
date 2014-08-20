<div class="theprofile">
            <h2>Profile - Home</h2>
            <div class="profile-picture">
              <img style="width:20%" src="http://graph.facebook.com/<?php echo $user['User']['facebook_id']?>/picture?type=square">
            </div>
            <div class="profile-info-left">
              <div><a href="/profile/home"><?php echo $user['User']['name']?></a></div>
              <div><a href="/betlists/<?php echo $user['User']['id']?>">Bet List:</a></div>
              <p>Book Delete: <?php echo $user['User']['book_delete']?></p>
            </div>
            <div class="profile-info-right">
              <a href="/passbooks/<?php echo $user['User']['id']?>"><?php echo $this->Html->image('/img/icon1.png'); ?> :<?php echo $user['User']['point']?></a>
              <a href="/makedbooks/<?php echo $user['User']['id']?>">Maked Book: <?php echo $makebook_count?></a>
              <p>Result Timeover: <?php echo $result_timeover_count?></p>
            </div>
            <?php if (isset($facebook_link_hide) && $facebook_link_hide ===false):?>
            <?php else:?>
              <a class="fb-link" href="<?php echo $user['User']['facebook_link']?>"><?php echo $user['User']['facebook_link']?></a>
            <?php endif;?>

            <span class="clearfix"></span>

            <div class="profile-about col-xs-12">
              <p>Sample text...</p>
            </div>
            <?php //var_dump($user);?>
            <div class="profile-headers">
              <h3>Passbook</h3>
              <a href="/passbooks/<?php echo $user['User']['id']?>">More</a>
            </div>
            <table class="profile-table table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Point</th>
                  <th>Balance</th>
                  <th>Event</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($user['Passbook'] as $passbookKey=>$passbook):?>
                  <?php if ($passbookKey <= 4):?>
                    <tr>
                      <td><?php echo CakeTime::format( $passbook['created'],'%Y/%m/%d %H:%M')?></td>
                      <td><?php echo $passbook['point']?></td>
                      <td><?php echo $passbook['balance']?></td>
                      <td>
                        <?php if ($passbook['event'] =='bet' || $passbook['event'] =='win' || $passbook['event'] =='reward' || $passbook['event'] =='return'):?>
                          <a href="/books/<?php echo $passbook['book_id']?>"><?php echo $passbook['event'];?> - Book Id:<?php echo $passbook['book_id']?></a>
                        <?php else:?>
                          Book Id:<?php echo $passbook['book_id']?>
                        <?php endif;?>
                      </td>
                    </tr>
                  <?php endif?>
                <?php endforeach;?>
              </tbody>
            </table>

            <div class="profile-headers">
              <h3>Bet List</h3>
              <a href="/betlists/<?php echo $user['User']['id']?>">More</a>
            </div>
            <table class="profile-table table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Book</th>
                  <th>Bet</th>
                  <th>Result</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($user['Bet'] as $betKey=>$bet):?>
                  <?php if ($betKey <= 4):?>
                    <tr>
                      <td><?php echo CakeTime::format( $bet['created'],'%Y/%m/%d %H:%M')?></td>
                      <td><a href="/books/<?php echo $bet['book_id']?>"><?php echo $bet['book']['title']?></a></td>
                      <td><?php echo $bet['betpoint']?></td>
                      <td><?php echo $bet['result_point']?></td>
                    </tr>
                  <?php endif?>
                <?php endforeach;?>
              </tbody>
            </table>

            <div class="profile-headers">
              <h3>Maked Book</h3>
              <a href="/makedbooks/<?php echo $user['User']['id']?>">More</a>
            </div>
            <table class="profile-table table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Book</th>
                  <th>Bet</th>
                  <th>Result</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($user['Book'] as $bookKey=>$book):?>
                  <?php if ($bookKey <= 4):?>
                    <tr>
                      <td><?php echo CakeTime::format( $book['created'],'%Y/%m/%d %H:%M')?></td>
                      <td><a href="/books/<?php echo $book['id']?>"><?php echo $book['title']?></a></td>
                      <td><?php echo $book['bet_all_total']?></td>
                      <td><?php echo $book['reward_point']?></td>
                    </tr>
                  <?php endif?>
                <?php endforeach;?>
              </tbody>
            </table>

          </div>