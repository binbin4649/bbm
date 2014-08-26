<div class="article">
  <div class="article-headers">
    <h3>Details</h3>
  </div>
  <p><?php echo nl2br($this->text->autoLinkUrls($book['Book']['details'])); ?></p>
</div>
<div class="article">
  <div class="article-headers">
    <h3>Annoucement</h3>
  </div>
  <p><?php echo $book['Book']['announcement_type']?>: 
    <?php if (strtolower($book['Book']['announcement_type']) === 'url'):?>
      <a href="<?php echo $book['Book']['announcement_name']?>"><?php echo $book['Book']['announcement_name']?></a>
    <?php else:?>
      <?php echo $book['Book']['announcement_name']?>
    <?php endif;?>
  </p>
  <p><?php echo nl2br($this->text->autoLinkUrls($book['Book']['announcement'])); ?></p>
</div>
<div class="article">
  <div class="article-headers">
    <h3>Result</h3>
  </div>
  <p><?php echo nl2br($this->text->autoLinkUrls($book['Book']['result_detail'])); ?></p>
</div>