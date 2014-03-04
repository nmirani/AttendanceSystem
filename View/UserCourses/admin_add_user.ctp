<div class="studentClasses form">
<?php echo $this->Form->create('UserCourse'); ?>
	<fieldset>
		<legend><?php echo sprintf(__('Add %s to this Course'), $user_type) ; ?></legend>
	<?php
		echo $this->Form->input('user_id', array('empty' => true) );
		echo $this->Form->input('course_id', array('empty' => true) );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s of this Course'), $user_type) , array('controller' => 'user_courses', 'action' => ($user_type == 'Student') ? 'students' : 'teachers' , $course_id)); ?></li>
	</ul>
</div>
