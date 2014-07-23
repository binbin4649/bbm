<div class="updates-main">
  <h2><?= __d('users', 'Updates'); ?></h2>
  <?php 
    foreach ($updates as $key => $update) {
  ?>
    <a href="#">
      <?= $update['Update']['content'] ?>    
    </a>
  <?php 
    }
  ?> 
  <span class="clearfix"></span>
  <div class="pagination-wrap">
    <ul class="pagination pagination-lg">
      <?php
        echo $this->Paginator->prev(
          ' << ',
          array('tag' => 'li')
          
        );
        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));
      ?>
    </ul>
  </div>
</div>