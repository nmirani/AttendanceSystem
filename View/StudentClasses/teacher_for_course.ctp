<div class="studentClasses index">
	<h2><?php echo __('Student Classes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('class_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('room'); ?></th>
            <th><?php echo $this->Paginator->sort('day_of_week'); ?></th>
			<th><?php echo $this->Paginator->sort('frequency'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
            <th><?php echo $this->Paginator->sort('start_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('repeat'); ?></th>
			<th><?php echo $this->Paginator->sort('group'); ?></th>
			
			
	</tr>
	<?php foreach ($studentClasses as $studentClass): ?>
	<tr>
		<td><?php echo h($studentClass['StudentClass']['class_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($studentClass['Course']['course_id'], array('controller' => 'courses', 'action' => 'view', $studentClass['Course']['id'])); ?>
		</td>
		<td><?php echo h($studentClass['StudentClass']['room']); ?>&nbsp;</td>
        <td><?php echo h($studentClass['StudentClass']['day_of_week']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['StudentClass']['frequency']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['StudentClass']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['StudentClass']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['StudentClass']['end_time']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['StudentClass']['repeat']); ?>&nbsp;</td>
		<td><?php echo h($studentClass['StudentClass']['group']); ?>&nbsp;</td>
		
		
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Course Detail'), array('controller' => 'courses', 'action' => 'view', $course_id)); ?> </li>
        
	</ul>
</div>
