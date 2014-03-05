<div class="TeacherClasses form">
<?php echo $this->Form->create('TeacherClass'); ?>
	<fieldset>
		<legend><?php echo __('Add Teacher Class'); ?></legend>
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

		<li><?php echo $this->Html->link(__('List Teacher Classes'), array('action' => 'index', $teacher_id)); ?></li>
        <?php if(isset($this->request->data['TeacherClass']['course_id'])){ ?>
	        <li><?php echo $this->Html->link(__('List Classes for this Course'), array('controller' => 'Teacher_classes', 'action' => 'for_course', $this->request->data['TeacherClass']['course_id'])); ?> </li>
        <?php } ?>
	</ul>
</div>
