<div class="attendances form">
<?php echo $this->Form->create('Attendance'); ?>
	<fieldset>
		<legend><?php echo __('Edit Attendance'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('status', array('type' => 'checkbox', 'label' => 'Present?') );
		echo $this->Form->input('date');
		echo $this->Form->input('time');
		echo $this->Form->input('hardware_used');
		echo $this->Form->input('number_registered');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('View Attendances'), array('action' => 'for_course', $Attendance['Attendance']['course_id'], 'student_id' => $Attendance['Attendance']['user_id'])); ?></li>
	</ul>
</div>
