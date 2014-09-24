<?php /*pr($betlists); /*pr($passbooks);*/ //pr($books); ?>
<?php echo $this->Session->flash(); ?>
          <div class="theprofile">
            <h2>Profile - Home</h2>
            <?php echo $this->element("user_profile_bar"); ?>
            <span class="clearfix"></span>

            <div class="profile-about col-xs-12">
              <p><?php echo nl2br($this->text->autoLinkUrls($data['User']['profile'])); ?></p>
            </div>

            <div class="profile-headers">
              <h3>Passbook</h3> 
              <a href="<?php echo SITE_LINK."passbooks/".$data['User']['id'] ?>">More</a>
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
			  <?php foreach($passbooks as $passkey=>$passval) { ?>
				<tr>
                  <td><?php echo date("Y/m/d h:i",strtotime($passval['Passbook']['created'])); ?></td>
                  <td><?php echo $passval['Passbook']['point']; ?></td>
                  <td><?php echo $passval['Passbook']['balance']; ?> </td>
                  <td><a href="#"><?php echo $passval['Passbook']['event']; ?> </a></td>
                </tr>
			  <?php } ?>
                
              </tbody>
            </table>

            <div class="profile-headers">
              <h3>Bet List</h3>
              <a href="<?php echo SITE_LINK."betlists/".$data['User']['id'] ?>">More</a>
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
			  <?php foreach($betlists as $betkey=>$betval) { ?>
				<tr>
                  <td><?php echo date("Y/m/d h:i",strtotime($betval['Bet']['created'])); ?></td>
                  <td><a href="/books/<?php echo $betval['Book']['id']?>"><?php echo $betval['Book']['title'] ?></a></td>
                  <td><?php echo $betval['Bet']['betpoint'] ?></td>
                  <td><?php echo $betval['Bet']['result_point'] ?></td>
                </tr>
			  <?php } ?>
              </tbody>
            </table>

            <div class="profile-headers">
              <h3>Maked Book</h3>
              <a href="<?php echo SITE_LINK."makedbooks/".$data['User']['id'] ?>">More</a>
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
			  <?php foreach($books as $bookkey=>$bookval) { ?>
				<tr>
                  <td><?php echo date("Y/m/d h:i",strtotime($bookval['Book']['created'])); ?></td>
                  <td><a href="/books/<?php echo $bookval['Book']['id'] ?>"><?php echo $bookval['Book']['title'] ?></a></td>
                  <td><?php echo $bookval['Book']['bet_all_total'] ?></td>
                  <td><?php echo $bookval['Book']['reward_point'] ?></td>
                </tr>
			  <?php } ?>
              </tbody>
            </table>

          </div>
        