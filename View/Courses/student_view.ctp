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
		<li><?php echo $this->Html->link(__('View Courses Enrolled In'), array('controller' => 'user_courses')); ?> </li>
	</ul>
</div>



