<div class="updates-main">
  <h3 class="profile-h3">Information</h3>
<ul id="list" data-role="listview" data-inset="false">
  <?php foreach($updates as $update):?>
    <li>
    <a href="<?php echo SITE_LINK; ?>books/<?php echo $update['Update']['book_id'] ?>" style="white-space:normal;">
      <?php echo $update['Update']['content'] ?>    
    </a>
    </li>
  <?php endforeach;?>
</ul>
  <span class="clearfix"></span>

</div>

<?php echo $this->element("mobile_paging"); ?>