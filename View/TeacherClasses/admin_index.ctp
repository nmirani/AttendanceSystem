<div class="TeacherClasses index">
	<h2><?php echo __('Teacher Classes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('class_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('room'); ?></th>
            <th><?php echo $this->Paginator->sort('day_of_week'); ?></th>
			<th><?php echo $this->Paginator->sort('frequency'); ?></th>
			<th><?php echo $this->Paginator->sort('start_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('repeat'); ?></th>
			<th><?php echo $this->Paginator->sort('group'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($TeacherClasses as $TeacherClass): ?>
	<tr>
		<td><?php echo h($TeacherClass['StudentClass']['class_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($TeacherClass['StudentClass']['Course']['course_id'], array('controller' => 'courses', 'action' => 'view', $TeacherClass['StudentClass']['Course']['id'])); ?>
		</td>
		<td><?php echo h($TeacherClass['StudentClass']['room']); ?>&nbsp;</td>
        <td><?php echo h($TeacherClass['StudentClass']['day_of_week']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['StudentClass']['frequency']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['StudentClass']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['StudentClass']['end_time']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['StudentClass']['repeat']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['StudentClass']['group']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $TeacherClass['TeacherClass']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $TeacherClass['TeacherClass']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $TeacherClass['TeacherClass']['id']), null, __('Are you sure you want to delete # %s?', $TeacherClass['TeacherClass']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Teacher Class'), array('action' => 'add', $teacher_id)); ?></li>
		<li><?php echo $this->Html->link(__('List Teaching Courses'), array('controller' => 'user_courses', 'action' => 'user_enrolled', $teacher_id)); ?> </li>
		<li><?php echo $this->Html->link(__('View Teacher Detail'), array('controller' => 'users', 'action' => 'view', $teacher_id)); ?> </li>
	</ul>
</div>
