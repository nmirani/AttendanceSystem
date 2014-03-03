

<h1>Welcome Home</h1>





<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li>
			<?php echo $this->Html->link('Users', '/admin/users'); ?>
            <ul>
            	<li><?php echo $this->Html->link('Students', '/admin/users/student/'); ?></li>
                <li><?php echo $this->Html->link('Teachers', '/admin/users/teacher/'); ?></li>
                <li><?php echo $this->Html->link('Admins', '/admin/users/admin/'); ?></li>
            </ul>
        
        </li>
        <li><?php echo $this->Html->link('Courses', '/admin/courses'); ?></li>
        <li><?php echo $this->Html->link('Events', '#'); ?></li>
	</ul>
</div>


    <style>
		.actions ul li ul{margin:7px 0 0 20px}
	</style>		
		