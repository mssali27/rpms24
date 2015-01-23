<div class="agencysiteSettings index">
	<h2><?php echo __('Agencysite Settings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sitetitle'); ?></th>
			<th><?php echo $this->Paginator->sort('siteheadcolor'); ?></th>
			<th><?php echo $this->Paginator->sort('sitebarcolor'); ?></th>
			<th><?php echo $this->Paginator->sort('sitebackgroundcolor'); ?></th>
			<th><?php echo $this->Paginator->sort('sitebackgroundimageurl'); ?></th>
			<th><?php echo $this->Paginator->sort('faviconimageurl'); ?></th>
			<th><?php echo $this->Paginator->sort('effectivedate'); ?></th>
			<th><?php echo $this->Paginator->sort('terminationdate'); ?></th>
			<th><?php echo $this->Paginator->sort('settingsdescription'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($agencysiteSettings as $agencysiteSetting): ?>
	<tr>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($agencysiteSetting['User']['id'], array('controller' => 'users', 'action' => 'view', $agencysiteSetting['User']['id'])); ?>
		</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['sitetitle']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['siteheadcolor']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['sitebarcolor']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['sitebackgroundcolor']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['sitebackgroundimageurl']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['faviconimageurl']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['effectivedate']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['terminationdate']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['settingsdescription']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($agencysiteSetting['AgencysiteSetting']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $agencysiteSetting['AgencysiteSetting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $agencysiteSetting['AgencysiteSetting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $agencysiteSetting['AgencysiteSetting']['id']), array(), __('Are you sure you want to delete # %s?', $agencysiteSetting['AgencysiteSetting']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Agencysite Setting'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
