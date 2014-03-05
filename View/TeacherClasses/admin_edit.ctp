<div class="TeacherClasses form">
<?php echo $this->Form->create('TeacherClass'); ?>
	<fieldset>
		<legend><?php echo __('Edit Teacher Class'); ?></legend>
	<?php
			echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $teacher_id) );
		echo $this->Form->input('class_id', array('empty' => true, 'options' => $StudentClasses) );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TeacherClass.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TeacherClass.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Classes for this Course'), array('controller' => 'student_classes', 'action' => 'for_course', $this->request->data['TeacherClass']['class_id'])); ?> </li>
	</ul>
</div>
