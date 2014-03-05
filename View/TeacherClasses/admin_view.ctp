<div class="TeacherClasses view">
<h2><?php echo __('Teacher Class'); ?></h2>
	<dl>
		<dt><?php echo __('Class Id'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['class_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($TeacherClass['Course']['course_id'], array('controller' => 'courses', 'action' => 'view', $TeacherClass['Course']['course_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['room']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Day of week'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['day_of_week']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Frequency'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['frequency']); ?>
			&nbsp;
		</dd>
        
		<dt><?php echo __('Start Date Time'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['start_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Time'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['end_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Repeat'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['repeat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($TeacherClass['TeacherClass']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Teacher Class'), array('action' => 'edit', $TeacherClass['TeacherClass']['class_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Teacher Class'), array('action' => 'delete', $TeacherClass['TeacherClass']['class_id']), null, __('Are you sure you want to delete # %s?', $TeacherClass['TeacherClass']['class_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Classes for this Course'), array('action' => 'for_course', $TeacherClass['TeacherClass']['course_id'])); ?> </li>
	</ul>
</div>
