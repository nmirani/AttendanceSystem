<div class="courses view">
<h2><?php echo __('Course'); ?></h2>
	<dl>
		<dt><?php echo __('Course Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($course['Course']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($course['Course']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['course_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['course_id']), null, __('Are you sure you want to delete # %s?', $course['Course']['course_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Classes'), array('controller' => 'student_classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Class'), array('controller' => 'student_classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Teachers'), array('controller' => 'courses_teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Teacher'), array('controller' => 'courses_teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attendances'); ?></h3>
	<?php if (!empty($course['Attendance'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Date Time'); ?></th>
		<th><?php echo __('Hardware Used'); ?></th>
		<th><?php echo __('Number Registered'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['Attendance'] as $attendance): ?>
		<tr>
			<td><?php echo $attendance['id']; ?></td>
			<td><?php echo $attendance['user_id']; ?></td>
			<td><?php echo $attendance['course_id']; ?></td>
			<td><?php echo $attendance['status']; ?></td>
			<td><?php echo $attendance['date_time']; ?></td>
			<td><?php echo $attendance['hardware_used']; ?></td>
			<td><?php echo $attendance['number_registered']; ?></td>
			<td><?php echo $attendance['created']; ?></td>
			<td><?php echo $attendance['modified']; ?></td>
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
	<h3><?php echo __('Related Student Classes'); ?></h3>
	<?php if (!empty($course['StudentClass'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Class Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Room'); ?></th>
		<th><?php echo __('Start Date Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Repeat'); ?></th>
		<th><?php echo __('Group'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['StudentClass'] as $studentClass): ?>
		<tr>
			<td><?php echo $studentClass['class_id']; ?></td>
			<td><?php echo $studentClass['course_id']; ?></td>
			<td><?php echo $studentClass['room']; ?></td>
			<td><?php echo $studentClass['start_date_time']; ?></td>
			<td><?php echo $studentClass['end_time']; ?></td>
			<td><?php echo $studentClass['repeat']; ?></td>
			<td><?php echo $studentClass['group']; ?></td>
			<td><?php echo $studentClass['created']; ?></td>
			<td><?php echo $studentClass['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'student_classes', 'action' => 'view', $studentClass['class_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'student_classes', 'action' => 'edit', $studentClass['class_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'student_classes', 'action' => 'delete', $studentClass['class_id']), null, __('Are you sure you want to delete # %s?', $studentClass['class_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student Class'), array('controller' => 'student_classes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Courses Teachers'); ?></h3>
	<?php if (!empty($course['CoursesTeacher'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Course Teacher Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['CoursesTeacher'] as $coursesTeacher): ?>
		<tr>
			<td><?php echo $coursesTeacher['course_teacher_id']; ?></td>
			<td><?php echo $coursesTeacher['course_id']; ?></td>
			<td><?php echo $coursesTeacher['user_id']; ?></td>
			<td><?php echo $coursesTeacher['created']; ?></td>
			<td><?php echo $coursesTeacher['modified']; ?></td>
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
