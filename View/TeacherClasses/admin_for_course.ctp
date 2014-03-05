<div class="TeacherClasses index">
	<h2><?php echo __('Teacher Classes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('class_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('room'); ?></th>
            <th><?php echo $this->Paginator->sort('day_of_week'); ?></th>
			<th><?php echo $this->Paginator->sort('frequency'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('repeat'); ?></th>
			<th><?php echo $this->Paginator->sort('group'); ?></th>
			
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($TeacherClasses as $TeacherClass): ?>
	<tr>
		<td><?php echo h($TeacherClass['TeacherClass']['class_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($TeacherClass['Course']['course_id'], array('controller' => 'courses', 'action' => 'view', $TeacherClass['Course']['course_id'])); ?>
		</td>
		<td><?php echo h($TeacherClass['TeacherClass']['room']); ?>&nbsp;</td>
        <td><?php echo h($TeacherClass['TeacherClass']['day_of_week']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['TeacherClass']['frequency']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['TeacherClass']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['TeacherClass']['end_time']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['TeacherClass']['repeat']); ?>&nbsp;</td>
		<td><?php echo h($TeacherClass['TeacherClass']['group']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $TeacherClass['TeacherClass']['class_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $TeacherClass['TeacherClass']['class_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $TeacherClass['TeacherClass']['class_id']), null, __('Are you sure you want to delete # %s?', $TeacherClass['TeacherClass']['class_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Timetable'), array('action' => 'add', 'course_id' => $course_id)); ?></li>
		<li><?php echo $this->Html->link(__('Course Detail'), array('controller' => 'courses', 'action' => 'view', $course_id)); ?> </li>
        <li>&nbsp;</li>
		<li><?php echo $this->Html->link(__('List all timetable'), array('controller' => 'Teacher_classes', 'action' => 'index')); ?> </li>
	</ul>
</div>
