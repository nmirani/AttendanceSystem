<div class="studentClasses form">
<?php echo $this->Form->create('StudentClass'); ?>
	<fieldset>
		<legend><?php echo __('Add Student Class'); ?></legend>
	<?php
		echo $this->Form->input('course_id');
		echo $this->Form->input('room');
		echo $this->Form->input('start_date_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('repeat');
		echo $this->Form->input('group');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Student Classes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
