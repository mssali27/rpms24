<div class="emailTemplates form">
<?php echo $this->Form->create('EmailTemplate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Email Template'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('business_id');
		echo $this->Form->input('emailtemplatename');
		echo $this->Form->input('emailsubject');
		echo $this->Form->input('sendername');
		echo $this->Form->input('senderemail');
		echo $this->Form->input('emailcontent');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EmailTemplate.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('EmailTemplate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Email Templates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Businesses'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
	</ul>
</div>
