<div class="profile-picture">
<?php if($this->Session->read('FB.Me.id')) { ?>
	<img style="width:20%" src="<?php echo "http://graph.facebook.com/".$this->Session->read('FB.Me.id')."/picture?type=square"?>" />
<?php } else { ?>
<?php echo $this->Html->image("profile.png"); } ?>
  
</div>
<div class="profile-info-left">
  <a href="<?php echo SITE_LINK."profile/".$data['User']['id']; ?>"><?php echo $data['User']['name']; ?></a>
  <a href="<?php echo SITE_LINK."betlists/".$data['User']['id']; ?>">Bet List:<?php echo $data['User']['betlist']; ?></a>
  <p>Book Delete:<?php echo $data['User']['book_delete']; ?></p>
</div>
<div class="profile-info-right">
  <a href="<?php echo SITE_LINK."passbooks/".$data['User']['id']; ?>"><img src="<?php echo $this->webroot; ?>img/icon1.png"> :<?php echo $data['User']['point']; ?></a>
  <a href="<?php echo SITE_LINK."makedbooks/".$data['User']['id']; ?>">Maked Book:<?php echo $data['User']['makedbook']; ?></a>
  <p>Result Timeover:<?php echo $data['User']['result_timeover']; ?></p>
</div>
<?php echo empty($data['User']['facebook_link_hide'])?'':'<a class="fb-link" href="'.$data['User']['facebook_link'].'">'.$data['User']['facebook_link'].'</a>'; ?>