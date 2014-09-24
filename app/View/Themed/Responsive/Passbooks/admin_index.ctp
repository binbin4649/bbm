<div class="passbooks index">
	<h2><?php echo __('Passbooks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('point'); ?></th>
			<th><?php echo $this->Paginator->sort('event'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($passbooks as $passbook): ?>
	<tr>
		<td><?php echo h($passbook['Passbook']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $passbook['User']['name']; ?>
		</td>
		<td><?php echo h($passbook['Passbook']['point']); ?>&nbsp;</td>
		<td><?php echo h($passbook['Passbook']['event']); ?>&nbsp;</td>
		<td><?php echo h($passbook['Passbook']['created']); ?>&nbsp;</td>
		<td><?php echo h($passbook['Passbook']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $passbook['Passbook']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $passbook['Passbook']['id']), null, __('Are you sure you want to delete # %s?', $passbook['Passbook']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
