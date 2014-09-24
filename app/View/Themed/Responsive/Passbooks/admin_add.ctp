<div class="passbooks form">
<?php echo $this->Form->create('Passbook',array('novalidate'=>true)); ?>
	<fieldset>
		<legend><?php echo __('Add Passbook'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('point');
		echo $this->Form->input('event');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
