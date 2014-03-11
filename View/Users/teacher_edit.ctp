
<?php $user_type = $this->request->data['User']['user_type']; ?>

<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('readonly' => 'readonly') );
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirmation', array('type' => 'password') );
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

