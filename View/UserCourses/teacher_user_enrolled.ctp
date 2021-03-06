<div class="courses index">
	<h2><?php echo __('Courses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userCourses as $course): ?>
	<tr>
		<td><?php echo h($course['Course']['course_id']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['course_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View Course Detail'), array('controller' => 'courses', 'action' => 'view', $course['UserCourse']['course_id'])); ?>
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
		<li><?php echo $this->Html->link(__('View User Detail'), array('controller' => 'users', 'action' => 'view', $user_id)); ?> </li>
	</ul>
</div>
