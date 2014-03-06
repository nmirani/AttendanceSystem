
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		
            	<li><?php echo $this->Html->link('View Student List', '/admin/users/student/'); ?></li>
                <li><?php echo $this->Html->link('View Teacher List', '/admin/users/teacher/'); ?></li>
                <li><?php echo $this->Html->link('View Admin List', '/admin/users/admin/'); ?></li>
        <li><?php echo $this->Html->link('View Courses', '/admin/courses'); ?></li>
        <li><?php echo $this->Html->link('View Timetable', '/admin/time_table'); ?></li>
	</ul>
</div>


    <style>
		.actions ul li ul{margin:7px 0 0 20px}
	</style>		
		