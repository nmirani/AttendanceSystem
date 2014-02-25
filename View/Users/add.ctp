<!-- app/View/Users/add.ctp -->

<div class="users form">
<?php echo $this->Form->create('Register New User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>

        <?php

        echo $this->Form->input('username'); //,array('type' => 'text', 'label' => 'Username')
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('password');
        echo $this->Form->input('password_confirmation',array('type' => 'password'));
        echo $this->Form->input('email');
        echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'student' => 'Student',
        	                    'teacher' => 'Teacher')));
        
    ?>
    </fieldset>
    
     <?php  echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Teachers'), array('controller' => 'courses_teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Teacher'), array('controller' => 'courses_teachers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Tags'), array('controller' => 'user_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Tag'), array('controller' => 'user_tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Courses'), array('controller' => 'user_courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Course'), array('controller' => 'user_courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
