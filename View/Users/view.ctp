<div class="users view">
<h2>User</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Id</dt>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>>Name</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Username</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
			<?php echo $user['User']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Name</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['last_name']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>>Email</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
	    <?php if ($current_user['id'] == $user['User']['id'] || $current_user['user_type'] == 'admin'): ?>
		    <li><?php echo $this->Html->link('Edit User', array('action' => 'edit', $user['User']['id'])); ?> </li>
		    <li><?php echo $this->Form->postLink('Delete User', array('action' => 'delete', $user['User']['id']), array('confirm'=>'Are you sure you want to delete that user?')); ?> </li>
		<?php endif; ?>
	</ul>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Attendances'); ?></h3>
	<?php if (!empty($user['Attendance'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Date Time'); ?></th>
		<th><?php echo __('Hardware Used'); ?></th>
		<th><?php echo __('Number Registered'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Attendance'] as $attendance): ?>
		<tr>
			<td><?php echo $attendance['id']; ?></td>
			<td><?php echo $attendance['user_id']; ?></td>
			<td><?php echo $attendance['course_id']; ?></td>
			<td><?php echo $attendance['status']; ?></td>
			<td><?php echo $attendance['date_time']; ?></td>
			<td><?php echo $attendance['hardware_used']; ?></td>
			<td><?php echo $attendance['number_registered']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attendances', 'action' => 'view', $attendance['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attendances', 'action' => 'edit', $attendance['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attendances', 'action' => 'delete', $attendance['id']), null, __('Are you sure you want to delete # %s?', $attendance['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Courses Teachers'); ?></h3>
	<?php if (!empty($user['CoursesTeacher'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Course Teacher Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['CoursesTeacher'] as $coursesTeacher): ?>
		<tr>
			<td><?php echo $coursesTeacher['course_teacher_id']; ?></td>
			<td><?php echo $coursesTeacher['course_id']; ?></td>
			<td><?php echo $coursesTeacher['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'courses_teachers', 'action' => 'view', $coursesTeacher['course_teacher_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses_teachers', 'action' => 'edit', $coursesTeacher['course_teacher_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses_teachers', 'action' => 'delete', $coursesTeacher['course_teacher_id']), null, __('Are you sure you want to delete # %s?', $coursesTeacher['course_teacher_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Courses Teacher'), array('controller' => 'courses_teachers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related User Tags'); ?></h3>
	<?php if (!empty($user['UserTag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Tag Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Tag'); ?></th>
		<th><?php echo __('Tag Type'); ?></th>
		<th><?php echo __('In Use'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UserTag'] as $userTag): ?>
		<tr>
			<td><?php echo $userTag['tag_id']; ?></td>
			<td><?php echo $userTag['user_id']; ?></td>
			<td><?php echo $userTag['tag']; ?></td>
			<td><?php echo $userTag['tag_type']; ?></td>
			<td><?php echo $userTag['in_use']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_tags', 'action' => 'view', $userTag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_tags', 'action' => 'edit', $userTag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_tags', 'action' => 'delete', $userTag['id']), null, __('Are you sure you want to delete # %s?', $userTag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Tag'), array('controller' => 'user_tags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related User Courses'); ?></h3>
	<?php if (!empty($user['UserCourse'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('User Courses Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Group'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UserCourse'] as $userCourse): ?>
		<tr>
			<td><?php echo $userCourse['user_courses_id']; ?></td>
			<td><?php echo $userCourse['user_id']; ?></td>
			<td><?php echo $userCourse['course_id']; ?></td>
			<td><?php echo $userCourse['group']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_courses', 'action' => 'view', $userCourse['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_courses', 'action' => 'edit', $userCourse['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_courses', 'action' => 'delete', $userCourse['id']), null, __('Are you sure you want to delete # %s?', $userCourse['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Course'), array('controller' => 'user_courses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
