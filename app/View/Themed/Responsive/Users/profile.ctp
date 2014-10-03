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
            <?php echo $this->element("passbook_listing"); ?>

            <div class="profile-headers">
              <h3>Bet List</h3>
              <a href="<?php echo SITE_LINK."betlists/".$data['User']['id'] ?>">More</a>
            </div>
            <?php echo $this->element("betlist_listing"); ?>

            <div class="profile-headers">
              <h3>Maked Book</h3>
              <a href="<?php echo SITE_LINK."makedbooks/".$data['User']['id'] ?>">More</a>
            </div>
            <table class="profile-table table">
              <thead>
                <tr>
                  <th width="21%">Date</th>
                  <th width="49%">Book</th>
                  <th width="12%">Bet</th>
                  <th width="18%">Result</th>
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
        