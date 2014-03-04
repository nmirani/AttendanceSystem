<div class="studentClasses view">
<h2><?php echo __('Student Class'); ?></h2>
	<dl>
		<dt><?php echo __('Class Id'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['class_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentClass['Course']['course_id'], array('controller' => 'courses', 'action' => 'view', $studentClass['Course']['course_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['room']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Day of week'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['day_of_week']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Frequency'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['frequency']); ?>
			&nbsp;
		</dd>
        
		<dt><?php echo __('Start Date Time'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['start_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Time'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['end_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Repeat'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['repeat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($studentClass['StudentClass']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student Class'), array('action' => 'edit', $studentClass['StudentClass']['class_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student Class'), array('action' => 'delete', $studentClass['StudentClass']['class_id']), null, __('Are you sure you want to delete # %s?', $studentClass['StudentClass']['class_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Classes for this Course'), array('action' => 'for_course', $studentClass['StudentClass']['course_id'])); ?> </li>
	</ul>
</div>
