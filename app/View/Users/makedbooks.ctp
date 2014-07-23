<?php //pr($books); ?>

<div class="theprofile">
            <h2>Profile - Betlist</h2>
<?php echo $this->element("user_profile_bar"); ?>
<span class="clearfix"></span>
<?php foreach($books as $bookkey=>$bookval) { ?>
<div class="makedbook-entry col-xs-12">
  <h2><a href="book-result.html"><?php echo $bookval['Book']['title'] ?></a></h2>
  <span class="entry-icons"><img src="<?php echo $this->webroot; ?>img/icon2.png">:<?php echo $bookval['Book']['user_all_count'] ?></span>
  <span class="entry-icons"><img src="<?php echo $this->webroot; ?>img/icon1.png">:<?php echo $bookval['Book']['bet_all_total'] ?></span>
  <span class="badge-state">Result</span>
  <span class="badge-category">Sports</span>
  <p><a href="<?php echo SITE_LINK."profile/".$bookval['Book']['user_id'] ?>">Created:<?php echo date("Y/m/d h:i",strtotime($bookval['Book']['created'])); ?> <?php echo $bookval['User']['name'] ?></a></p>
  <p>Bet Start:<?php echo date("Y/m/d h:i",strtotime($bookval['Book']['bet_start'])); ?>  Bet Finsh:<?php echo date("Y/m/d h:i",strtotime($bookval['Book']['bet_finish'])); ?>  Result:<?php echo date("Y/m/d h:i",strtotime($bookval['Book']['result_time'])); ?></p>
</div>
<?php } ?>
<span class="clearfix"></span>
<?php echo $this->element("paging"); ?>
</div>