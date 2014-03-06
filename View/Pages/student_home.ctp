


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link('View Profile', '/student/users/profile'); ?></li>
        <li><?php echo $this->Html->link('View Courses Enrolled In', '/student/user_courses/'); ?></li>
        <li><?php echo $this->Html->link('View Timetable', '/student/time_table'); ?></li>
        <li><?php echo $this->Html->link('#View Student Attendance', '#'); ?></li>

	</ul>
</div>


    <style>
		.actions ul li ul{margin:7px 0 0 20px}
	</style>		
		