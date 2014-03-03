<div class="studentClasses form">
<?php echo $this->Form->create('UserCourse'); ?>
	<fieldset>
		<legend><?php echo __('Edit Student to a Course'); ?></legend>
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
	
    	<li><?php echo $this->Html->link(__('List Student Courses'), array('action' => 'user_enrolled', $this->request->data['UserCourse']['user_id'])); ?></li>
	
	</ul>
</div>
