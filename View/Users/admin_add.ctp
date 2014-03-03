<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirmation', array('type' => 'password') );
		echo $this->Form->input('user_type', array('type' => 'select', 'options' => array('Admin' => 'Admin', 'Teacher' => 'Teacher', 'Student' => 'Student'), 'empty' => true ) );
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('List User') . $user_type_with_colon, array('action' => ($user_type) ? $user_type : 'index')); ?></li>
	</ul>
</div>
