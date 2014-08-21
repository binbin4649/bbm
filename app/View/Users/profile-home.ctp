<div class="theprofile">
            <h2>Profile - Home</h2>
            <?php echo $this->element("user_profile_bar"); ?>
            <span class="clearfix"></span>

            <div class="profile-about col-xs-12">
              <p><?php echo $data['User']['profile']; ?></p>
            </div>
            <?php //var_dump($user);?>
            <div class="profile-headers">
              <h3>Passbook</h3>
              <a href="/passbooks/<?php echo $user['User']['id']?>">More</a>
            </div>
            <?php echo $this->element("passbook_listing"); ?>

            <div class="profile-headers">
              <h3>Bet List</h3>
              <a href="/betlists/<?php echo $user['User']['id']?>">More</a>
            </div>
            <?php echo $this->element("betlist_listing"); ?>
            

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