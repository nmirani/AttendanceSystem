
	<?php 
		$user_type = isset($title_for_layout) ? $title_for_layout : '' ;
		$user_type_with_colon = isset($title_for_layout) ? ': ' . $title_for_layout : '' ;
	?>



<div class="users index">
	<h2><?php echo __('User Tags'); ?><?php echo $user_type_with_colon ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('tag_id'); ?></th>
            <th><?php echo $this->Paginator->sort('tag'); ?></th>
			<th><?php echo $this->Paginator->sort('tag_type'); ?></th>
			
	</tr>
	<?php foreach ($userTags as $UserTag): ?>
	<tr>
		<td><?php echo h($UserTag['UserTag']['tag_id']); ?>&nbsp;</td>
        <td><?php echo h($UserTag['UserTag']['tag']); ?>&nbsp;</td>
		<td><?php echo h($UserTag['UserTag']['tag_type']); ?>&nbsp;</td>
		
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
    	<li><?php echo $this->Html->link(__('View List of Students'), array('controller' => 'users', 'action' => 'student')); ?></li>
	</ul>
</div>
