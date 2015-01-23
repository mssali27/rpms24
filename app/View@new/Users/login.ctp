<div class="container">
   <div id="login-box">
      <img src="<?php echo $this->webroot; ?>/img/login-arrow.png" alt="Agency Login" class="login-arrow" />
      <h2>agency <b>login</b></h2>
      <?php
         echo $this->Form->create('User', array('url'=>array('controller'=>'users', 'action'=>'login'))); ?>
      <div class="row">
         <div class="col-md-4">
            <label>email address:</label>
         </div>
         <div class="col-md-8 loginfield">
            <?php echo $this->Form->input('email', array('type'=>'email')); ?>
         </div>
      </div>
      <div class="row pushdown">
         <div class="col-md-4">
            <label>password:</label>
         </div>
         <div class="col-md-8 loginfield">
            <?php  echo $this->Form->input('password', array('type'=>'password'));	?>
         </div>
      </div>
      <div class="row loginbuttons">
         <div class="col-md-6">
            <?php echo $this->Html->link(__('forgot password'), array('controller' => 'users','action' => 'forgot'), array('class' => 'btn btn-forgot')); ?>
         </div>
         <div class="col-md-6">
            <?php echo $this->Form->input('submit', array('type'=>'submit', 'class' =>'btn btn-submit')); ?>
         </div>
      </div>
   </div>
</div>