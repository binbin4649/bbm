<?php if($this->Paginator->counter('{:pages}')>1) { ?>
	<div class="pagination-wrap">
			<span class="prev-pagination-lnk"><?php echo $this->Paginator->prev( __d('labels','PREV'), array(), null, array('class' => 'prev disabled')); ?></span>
			<?php echo $this->Paginator->numbers(array('class'=>'pge-no','separator'=>false,'currentClass'=>'active-pagination'));?>
			<span class="next-pagination-lnk"><?php echo $this->Paginator->next(__d('labels','NEXT'), array(), null, array('class' => 'next disabled'));?></span>
	</div>
<?php }?>