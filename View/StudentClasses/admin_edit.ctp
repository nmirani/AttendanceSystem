<div class="studentClasses form">
<?php echo $this->Form->create('StudentClass'); ?>
	<fieldset>
		<legend><?php echo __('Edit Student Class'); ?></legend>
	<?php
		echo $this->Form->input('class_id');
		echo $this->Form->input('course_id', array('empty' => true) );
		echo $this->Form->input('room');
		echo $this->Form->input('day_of_week', array('empty' => true, 'type' => 'select', 'options' => array('Sunday' => 'Sunday', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday') ) );
		echo $this->Form->input('frequency', array('empty' => true, 'type' => 'select', 'options' => array('Every week' => 'Every week', 'Every alternate week' => 'Every alternate week') ) );
		echo $this->Form->input('start_time', array('empty' => true) );
		echo $this->Form->input('end_time', array('empty' => true) );
		echo $this->Form->input('repeat');
		echo $this->Form->input('group');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StudentClass.class_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StudentClass.class_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Classes for this Course'), array('controller' => 'student_classes', 'action' => 'for_course', $this->request->data['StudentClass']['course_id'])); ?> </li>
	</ul>
</div>
