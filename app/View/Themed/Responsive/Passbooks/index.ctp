<div class="passbooks index">
	<h2><?php echo __('Passbooks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('book_id'); ?></th>
			<th><?php echo $this->Paginator->sort('content_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bet_id'); ?></th>
			<th><?php echo $this->Paginator->sort('point'); ?></th>
			<th><?php echo $this->Paginator->sort('balance'); ?></th>
			<th><?php echo $this->Paginator->sort('event'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($passbooks as $passbook): ?>
	<tr>
		<td><?php echo h($passbook['Passbook']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($passbook['User']['name'], array('controller' => 'users', 'action' => 'view', $passbook['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($passbook['Book']['name'], array('controller' => 'books', 'action' => 'view', $passbook['Book']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($passbook['Content']['title'], array('controller' => 'contents', 'action' => 'view', $passbook['Content']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($passbook['Bet']['id'], array('controller' => 'bets', 'action' => 'view', $passbook['Bet']['id'])); ?>
		</td>
		<td><?php echo h($passbook['Passbook']['point']); ?>&nbsp;</td>
		<td><?php echo h($passbook['Passbook']['balance']); ?>&nbsp;</td>
		<td><?php echo h($passbook['Passbook']['event']); ?>&nbsp;</td>
		<td><?php echo h($passbook['Passbook']['created']); ?>&nbsp;</td>
		<td><?php echo h($passbook['Passbook']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $passbook['Passbook']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $passbook['Passbook']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Passbook'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
	</ul>
</div>
