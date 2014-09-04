<?php //pr($books); ?>

<div class="theprofile">
<?php echo $this->element("mobile_user_profile_bar"); ?>
<span class="clearfix"></span>
 <h3 class="profile-h3">Profile - Maked Book</h3>
<div data-role="content tuika_content">
<ul data-role="listview">
    <?php foreach($books as $book):?>
      <li>
        <a href="/books/<?php echo $book['Book']['id'] ?>">
            <h2><?php echo $book['Book']['title']?></h2>
            <p>
                <span><?php echo $this->Html->image('/img/icon1.png'); ?>:<?php echo $book['Book']['bet_all_total']?></span>
                <span><?php echo $this->Html->image('/img/icon2.png'); ?>:<?php echo $book['Book']['user_all_count']?></span>
                <span class="badge-state"><?php echo $book['Book']['state']?></span>
                <span class="badge-category"><?php echo $book['Book']['category']?></span>
            </p>
        </a>
      </li>
    <?php endforeach;?>
</ul>
</div>
<span class="clearfix"></span>
<?php echo $this->element("mobile_paging"); ?>
</div>