<div class="updates-main">
  <h2><?= __d('users', 'Updates'); ?></h2>
  <?php foreach($updates as $update):?>
    <a href="<?php echo SITE_LINK; ?>books/<?php echo $update['Update']['book_id'] ?>">
      <?php echo $update['Update']['content'] ?>    
    </a>
  <?php endforeach;?>
  <span class="clearfix"></span>
</div>
<div class="pagination-wrap">
  <ul class="pagination pagination-lg">
    <?php echo $this->Paginator->prev(__('<<'), array('tag' => 'li'), null,  array('class' => 'disabled','tag' => 'li'));?>
    <?php echo $this->Paginator->numbers(array('tag' => 'li','separator'=>''));?>
    <?php echo $this->Paginator->next(__('>>'), array('tag' => 'li'), null,  array('class' => 'disabled','tag' => 'li'));?>
  </ul>
</div>