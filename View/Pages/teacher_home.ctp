

<h1>Welcome Home</h1>




<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link('View your Time Table', '/teacher/time_table'); ?></li>
        <li><?php echo $this->Html->link('View Courses Taught', '/teacher/user_courses'); ?></li>
        <li><?php echo $this->Html->link('#View Student Attendance', '#'); ?></li>
        <li><?php echo $this->Html->link('#Edit Student Attendance', '#'); ?></li>

	</ul>
</div>


    <style>
		.actions ul li ul{margin:7px 0 0 20px}
	</style>		
		