<?php /*pr($betlists); /*pr($passbooks);*/ //pr($books); ?>
<?php echo $this->Session->flash(); ?>
<div class="theprofile">
  <h2>Profile - Home</h2>
  <?php echo $this->element("mobile_user_profile_bar"); ?>

  <div class="profile-about col-xs-12">
    <p><?php echo $data['User']['profile']; ?></p>
  </div>

  <div class="profile-headers">
    <h3>Passbook</h3>
  </div>
  <?php echo $this->element("mobile_passbook_listing"); ?>
  

  <div class="profile-headers">
    <h3>Bet List</h3>
  </div>
  <?php echo $this->element("mobile_betlist_listing"); ?>
  
  <div class="profile-headers">
    <h3>Maked Book</h3>
  </div>
<div class="tuika_list clearfix book_lisy_title">
  <div class="book_title">Book</div>
 <div class="bet_col">Bet</div>
 <div class="result_col">Reward</div>
 </div>
<?php foreach($books as $bookkey=>$bookval) { ?>
<div class="tuika_list clearfix">
  <div class="date">
   <?php echo date("Y/m/d H:i",strtotime($bookval['Book']['created'])); ?>
  </div><!--date-->
  <div class="book_title">
   <a href="<?php echo SITE_LINK ?>books/<?php echo $bookval['Book']['id']?>"><?php echo $bookval['Book']['title'] ?></a>
  </div><!--book_title-->
 <div class="bet_col">
  <?php echo $bookval['Book']['bet_all_total'] ?>
 </div><!--bet_col-->
 <div class="result_col">
  <?php echo $bookval['Book']['reward_point'] ?>
 </div><!--result_col-->
</div><!--tuika_list-->
<?php } ?>

</div>


