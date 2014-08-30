<?php //pr($books); ?>

<div class="theprofile">
            <h2>Profile - Betlist</h2>
<?php echo $this->element("user_profile_bar"); ?>
<span class="clearfix"></span>
<?php echo $this->element("common_list_books",array("type"=>"makedbook")); ?>
</div>