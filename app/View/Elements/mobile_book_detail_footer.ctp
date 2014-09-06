 <p>
  <img class="createdby" src="<?php echo "http://graph.facebook.com/".$book['User']['facebook_id']."/picture?type=square"?>">
   <span class="small-text">Created : <?php echo CakeTime::format( $book['Book']['created'],'%Y/%m/%d %H:%M')?></span><br />
   <a href="<?php echo SITE_LINK."users/".$book['User']['id']; ?>"><?php echo $book['User']['name']?></a>
 </p>
<span class="clearfix"></span>
  <div data-role="content">
    <ul data-role="listview">
        <li data-role="list-divider">Details</li>
        <li style="white-space:normal;"><?php echo nl2br($this->text->autoLinkUrls($book['Book']['details'])); ?></li>
    </ul>
  </div>

  <div data-role="content">
    <ul data-role="listview">
        <li data-role="list-divider">Annoucement</li>
        <li style="white-space:normal;">
        <?php if (strtolower($book['Book']['announcement_type']) === 'url'):?>
          <a href="<?php echo $book['Book']['announcement_name']?>" target="_blank"><?php echo $book['Book']['announcement_type']?>:  <?php echo $book['Book']['announcement_name']?></a>
        <?php else:?>
          <?php echo $book['Book']['announcement_type']?>: <?php echo $book['Book']['announcement_name']?>
        <?php endif;?></li>
        <li style="white-space:normal;"><?php echo nl2br($this->text->autoLinkUrls($book['Book']['announcement'])); ?></li>
    </ul>
  </div>

  <div data-role="content">
    <ul data-role="listview">
        <li data-role="list-divider">ResultD etail</li>
        <li style="white-space:normal;"><?php echo nl2br($this->text->autoLinkUrls($book['Book']['result_detail'])); ?></li>
    </ul>
  </div>