<div class="classes index">
	<h2><?php echo __('Classes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('class_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('room'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('repeat'); ?></th>
			<th><?php echo $this->Paginator->sort('group'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($classes as $class): ?>
	<tr>
		<td><?php echo h($class['Class']['class_id']); ?>&nbsp;</td>
		<td><?php echo h($class['Class']['course_id']); ?>&nbsp;</td>
		<td><?php echo h($class['Class']['room']); ?>&nbsp;</td>
		<td><?php echo h($class['Class']['start_date_time']); ?>&nbsp;</td>
		<td><?php echo h($class['Class']['end_time']); ?>&nbsp;</td>
		<td><?php echo h($class['Class']['repeat']); ?>&nbsp;</td>
		<td><?php echo h($class['Class']['group']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $class['Class']['class_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $class['Class']['class_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $class['Class']['class_id']), null, __('Are you sure you want to delete # %s?', $class['Class']['class_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
</p>

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
		<li><?php echo $this->Html->link(__('New Class'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Classes'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Courses'), array('controller' => 'user_courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Course'), array('controller' => 'user_courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
