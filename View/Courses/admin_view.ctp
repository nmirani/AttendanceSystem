<div class="courses view">
<h2><?php echo __('Course'); ?></h2>
	<dl>
		<dt><?php echo __('Course Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($course['Course']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($course['Course']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['course_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['course_id']), null, __('Are you sure you want to delete # %s?', $course['Course']['course_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?> </li>
        <li>&nbsp;</li>
		<li><?php echo $this->Html->link(__('List Enrolled Students'), array('controller' => 'user_courses', 'action' => 'students',  $course['Course']['course_id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Enrolled Teachers'), array('controller' => 'user_courses', 'action' => 'teachers', $course['Course']['course_id'])); ?> </li>
        <li>&nbsp;</li>
        <li><?php echo $this->Html->link(__('List Classes for this Course'), array('controller' => 'student_classes', 'action' => 'for_course', $course['Course']['course_id'])); ?> </li>
	</ul>
</div>



