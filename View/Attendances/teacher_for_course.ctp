<div class="courses index">
	<h2><?php echo __('Attendance'); ?></h2>
    
    
    
    
    
	<?php foreach ($Course['StudentClass'] as $studentClass): ?>
    <table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'Class ID'; ?></th>
			<th><?php echo 'Course'; ?></th>
			<th><?php echo 'Room'; ?></th>
            <th><?php echo 'Day of week'; ?></th>
			<th><?php echo 'Frequency'; ?></th>
			<th><?php echo 'Start Date'; ?></th>
            <th><?php echo 'Start Time'; ?></th>
			<th><?php echo 'End Time'; ?></th>
			<th><?php echo 'Repeat'; ?></th>
			<th><?php echo 'Group'; ?></th>
			
			
	</tr>
	<tr>
		<td><?php echo h($studentClass['class_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($Course['Course']['course_id'], array('controller' => 'courses', 'action' => 'view', $Course['Course']['id'])); ?>
		</td>
		<td><?php echo h($studentClass['room']); ?>&nbsp;</td>
        <td><?php echo h($studentClass['day_of_week']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['frequency']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['start_date']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['start_time']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['end_time']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['repeat']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['group']); ?>&nbsp;</td>
		
		
	</tr>
    </table>
    
    
    
    <style>
		.green td{background:green}
		.red td{background:red}
	</style>
    
    
    
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'Student'; ?></th>
            <th><?php echo 'Date'; ?></th>
			<th><?php echo 'Time'; ?></th>
            <th><?php echo 'Hardware Used'; ?></th>
            <th><?php echo 'Status'; ?></th>
            <th><?php echo 'Action'; ?></th>
	</tr>
    
	<?php 
	
		$next_date = ($studentClass['frequency'] == 'Every alternate week') ? 14 : 7;
	
		$start_date = $studentClass['start_date'];
		

		while(date('l', strtotime($start_date)) !=  $studentClass['day_of_week'] ){
				$start_date = date('Y-m-d', strtotime($start_date . "+1 days"));

		}
		
		
		$running_date = $start_date  ;

		while ($running_date <= date('Y-m-d')){
		
		$status = false;
	
			foreach($Attendances as $attendance){

				if($attendance['Attendance']['class_id'] != $studentClass['class_id']) continue;

				if($attendance['Attendance']['date'] == $running_date && $attendance['Attendance']['status']) {
					$status = true;	
					break;
				}
				
			}
	
	?>
	    <tr class="<?php //echo ($status) ? 'green' : 'red' ; ?>">
        
        	<td><?php echo $Student['User']['username']; ?></td>
		<?php if(!$status){ ?>
        
            <td><?php echo date('Y-m-d', strtotime($running_date)); ?></td>
            <td>-</td>
            <td>-</td>
            <td>Absent</td>
            <td class="actions"><?php echo $this->Html->link(__('Edit'), array('action' => 'add',  
																								'date' => date('Y-m-d', strtotime($running_date)),
																								'user_id' =>  $Student['User']['id'],
																								'class_id' => $studentClass['class_id'],
																								'course_id' => $studentClass['course_id'],
																								) ); ?></td>
        
        <?php } ?>
        
        
        <?php if($status){ ?>
        
            <td><?php echo date('Y-m-d', strtotime($running_date)); ?></td>
            <td><?php echo $attendance['Attendance']['time']; ?></td>
            <td><?php echo $attendance['Attendance']['hardware_used']; ?></td>
            <td>Present</td>
        	<td class="actions"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attendance['Attendance']['id']) ); ?></td>
        <?php } ?>
        	
        </tr>
        
        
        
	<?php 
			$running_date = date('Y-m-d', strtotime($running_date . "+$next_date days"));;
			//debug($running_date ); die;
		} 
	?>
	</table>
    
    
    
    
<?php endforeach; ?>
	
    
    
    
    
    
    
    
    
    
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
    	<li><?php echo $this->Html->link(__('View Student Enrolled'), array('controller' => 'user_courses', 'action' => 'students', $course_id) ); ?></li>
		<li><?php echo $this->Html->link(__('Home'), '/'); ?></li>
	</ul>
</div>
<?php //debug($Course); ?>