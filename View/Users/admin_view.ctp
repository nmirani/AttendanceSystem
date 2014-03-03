

<?php $user_type = $user['User']['user_type']; ?>

<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Type'); ?></dt>
		<dd>
			<?php echo h($user['User']['user_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'). ': ' . $user_type, array('action' => ($user_type) ? $user_type : 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'). ': ' . $user_type, array('action' => 'add', 'user_type' => $user_type)); ?> </li>
        <li>&nbsp;</li>

        <?php if($user['User']['user_type'] != 'Admin'){ ?>
	        <li><?php echo $this->Html->link(__('List Enrolled Courses'), array('controller' => 'user_courses', 'action' => 'user_enrolled', $user['User']['id'])); ?> </li>
        <?php } ?>
        
        
	</ul>
</div>
