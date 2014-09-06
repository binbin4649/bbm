<?php echo $this->element("mobile_book_detail_header"); ?>
<p class="message">Bet Start : <?php echo date('Y/m/d H:i e O',$startTime)?> Please wait.</p>
<div data-role="content">
  <ul data-role="listview">
    <?php foreach ($book['Content'] as $content):?>
      <li>
        <h3><?php echo $content['title']?></h3>
        <p style="margin:0px;">
        <a href="" class="bet-btn ui-btn ui-btn-inline ui-corner-all">-</a></p>
      </li>
    <?php endforeach;?>

  </ul>
 </div>

<?php echo $this->element("mobile_book_detail_footer"); ?>