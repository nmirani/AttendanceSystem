<div class="courses index">
	<h2><?php echo __('Students'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('user_type'); ?></th>
            <th><?php echo $this->Paginator->sort('first_name'); ?></th>
            <th><?php echo $this->Paginator->sort('last_name'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php  foreach ($userCourses as $student): ?>
	<tr>
		<td><?php echo h($student['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($student['User']['user_type']); ?>&nbsp;</td>
        <td><?php echo h($student['User']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($student['User']['last_name']); ?>&nbsp;</td>
        <td><?php echo h($student['User']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $student['User']['id'])); ?>
            <?php echo $this->Html->link(__('View Attendance'), array('controller' => 'attendances', 'action' => 'for_course', $course_id, 'student_id' => $student['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('View Course Detail'), array('controller' => 'courses', 'action' => 'view', $course_id)); ?> </li>
	</ul>
</div>
