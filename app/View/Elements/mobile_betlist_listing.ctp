<div class="tuika_list clearfix book_lisy_title">
  <div class="book_title">
   Book
  </div><!--book_title-->
 <div class="bet_col">
  Bet
 </div><!--bet_col-->
 <div class="result_col">
  Result
 </div><!--result_col-->
 </div><!--tuika_list-->
<?php foreach($betlists as $betkey=>$betval) { ?>
<div class="tuika_list clearfix">
  <div class="date">
   <?php echo date("Y/m/d h:i",strtotime($betval['Bet']['created'])); ?>
  </div><!--date-->
  <div class="book_title">
   <a href="<?php echo SITE_LINK ?>books/<?php echo $betval['Book']['id']?>"><?php echo $betval['Book']['title'] ?></a>
  </div><!--book_title-->
 <div class="bet_col">
  <?php echo $betval['Bet']['betpoint'] ?>
 </div><!--bet_col-->
 <div class="result_col">
  <?php echo $betval['Bet']['result_point'] ?>
 </div><!--result_col-->
</div><!--tuika_list-->
<?php } ?>