  <div style="text-align:center" class="tuika_page">
<?php echo $this->Paginator->prev(__('Prev'), array('class'=>'ui-btn ui-btn-inline ui-corner-all'), null,  array('class' => 'ui-state-disabled'));?>
<?php echo $this->Paginator->next(__('Next'), array('class'=>'ui-btn ui-btn-inline ui-corner-all'), null,  array('class' => 'ui-state-disabled','disabledTag' => 'a'));?>
  </div>