<div class="passbooks view">
<h2><?php echo __('Passbook'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($passbook['Passbook']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($passbook['User']['name'], array('controller' => 'users', 'action' => 'view', $passbook['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Book'); ?></dt>
		<dd>
			<?php echo $this->Html->link($passbook['Book']['name'], array('controller' => 'books', 'action' => 'view', $passbook['Book']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo $this->Html->link($passbook['Content']['title'], array('controller' => 'contents', 'action' => 'view', $passbook['Content']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($passbook['Bet']['id'], array('controller' => 'bets', 'action' => 'view', $passbook['Bet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo h($passbook['Passbook']['point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Balance'); ?></dt>
		<dd>
			<?php echo h($passbook['Passbook']['balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo h($passbook['Passbook']['event']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($passbook['Passbook']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($passbook['Passbook']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Passbook'), array('action' => 'edit', $passbook['Passbook']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Passbook'), array('action' => 'delete', $passbook['Passbook']['id']), null, __('Are you sure you want to delete # %s?', $passbook['Passbook']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Passbooks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passbook'), array('action' => 'add')); ?> </li>
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
