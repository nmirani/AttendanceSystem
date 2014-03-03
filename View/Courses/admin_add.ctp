<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Add Course'); ?></legend>
	<?php
		echo $this->Form->input('course_id', array('type' => 'text') );
		echo $this->Form->input('course_name' );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Classes'), array('controller' => 'student_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Class'), array('controller' => 'student_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Teachers'), array('controller' => 'courses_teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Teacher'), array('controller' => 'courses_teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>
