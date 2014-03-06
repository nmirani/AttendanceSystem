<div class="users form">
<?php echo $this->Form->create('UserTag'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit UserTag'); ?></legend>
	<?php
		echo $this->Form->input('tag_id', array('type' => 'hidden') );
		echo $this->Form->input('user_id', array('value' => $user_id) );
		echo $this->Form->input('tag');
		echo $this->Form->input('tag_type', array('type' => 'select', 'options' => array('nfc' => 'nfc', 'barcode' => 'barcode', 'wifi' => 'wifi'), 'empty' => true ) );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('Manage User Tags') , array('action' => 'index', $user_id)); ?></li>
        <li><?php echo $this->Html->link(__('View User Detail') , array('controller' => 'users', 'action' => 'view', $user_id)); ?></li>
	</ul>
</div>
