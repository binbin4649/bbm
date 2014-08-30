<?php if($this->Paginator->counter('{:pages}')>1) { ?>
	<div class="pagination-wrap">
            <ul class="pagination pagination-lg">
              <?php echo $this->Paginator->prev(__('<<'), array('tag' => 'li'), null,  array('class' => 'disabled','tag' => 'li'));?>
              <?php echo $this->Paginator->numbers(array('tag' => 'li','separator'=>''));?>
              <?php echo $this->Paginator->next(__('>>'), array('tag' => 'li'), null,  array('class' => 'disabled','tag' => 'li'));?>
            </ul>
          </div>
<?php }?>