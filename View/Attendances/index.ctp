<div class="attendances index">
	<h2><?php echo __('Attendances'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('date_time'); ?></th>
			<th><?php echo $this->Paginator->sort('hardware_used'); ?></th>
			<th><?php echo $this->Paginator->sort('number_registered'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attendances as $attendance): ?>
	<tr>
		<td><?php echo h($attendance['Attendance']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attendance['User']['first_name'], array('controller' => 'users', 'action' => 'view', $attendance['User']['user_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attendance['Course']['course_id'], array('controller' => 'courses', 'action' => 'view', $attendance['Course']['course_id'])); ?>
		</td>
		<td><?php echo h($attendance['Attendance']['status']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['date_time']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['hardware_used']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['number_registered']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['created']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attendance['Attendance']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attendance['Attendance']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attendance['Attendance']['id']), null, __('Are you sure you want to delete # %s?', $attendance['Attendance']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Attendance'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
