 <p>
  <img class="createdby" src="<?php echo "http://graph.facebook.com/".$book['User']['facebook_id']."/picture?type=square"?>">
   <span class="small-text">Created : <?php echo CakeTime::format( $book['Book']['created'],'%Y/%m/%d %H:%M')?></span><br />
   <a href="<?php echo SITE_LINK."users/".$book['User']['id']; ?>"><?php echo $book['User']['name']?></a>
 </p>
<span class="clearfix"></span>
  <div data-role="content">
    <ul data-role="listview">
        <li data-role="list-divider"><?php echo __("Details"); ?></li>
        <li style="white-space:normal;"><?php echo nl2br($this->text->autoLinkUrls($book['Book']['details'])); ?></li>
    </ul>
  </div>

  <div data-role="content">
    <ul data-role="listview">
        <li data-role="list-divider"><?php echo __("Annoucement"); ?></li>
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
        <li data-role="list-divider"><?php echo __("Result Detail"); ?></li>
        <li style="white-space:normal;"><?php echo nl2br($this->text->autoLinkUrls($book['Book']['result_detail'])); ?></li>
    </ul>
  </div>

<div style="margin-top:15px; margin-bottom:15px;">
<a href="https://twitter.com/share" class="twitter-share-button" data-via="bookbookmaker">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>
<div class="fb-like" data-href="<?php echo SITE_LINK."books/".$book['Book']['id']; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
