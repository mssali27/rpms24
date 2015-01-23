<script type="text/javascript">
$(document).ready(function(){
   $('#UserLoginForm').validate({
         rules:
         {
            "data[User][email]":
            {
               required:true,
               email:true,
               remote:ajax_url+'users/checkUserEmail'
            },
            
            "data[User][password]":
            {
               required:true,
               minlength: 8
            }
         },
         messages:
         {
            "data[User][email]":
            {
               required:'Please enter email.',
               email:'Please enter valid email.',
               remote:'Email does not exists.'
            },
            "data[User][password]":
            {
               required:"This field is required.",
               minlength: 'Password should be atleast 8 characters long.'
            }
            
         }
      
      
      });
      
   
   });
</script>
<div class="container">
   <div id="login-box">
      <img src="<?php echo $this->webroot; ?>/img/login-arrow.png" alt="Agency Login" class="login-arrow" />
      <h2>agency login</h2>
      <?php
         echo $this->Form->create('User', array('url'=>array('controller'=>'users', 'action'=>'login'))); ?>
      <div class="row">
         <div class="col-md-3 login-add">
            <label>email address:</label>
         </div>
         <div class="col-md-9 loginfield">
            <?php echo $this->Form->input('email', array('type'=>'email')); ?>
         </div>
      </div>
      <div class="row pushdown">
         <div class="col-md-3 login-add">
            <label>password:</label>
         </div>
         <div class="col-md-9 loginfield">
            <?php  echo $this->Form->input('password', array('type'=>'password'));	?>
         </div>
      </div>
      <div class="row loginbuttons">
         <div class="col-md-3">
            
         </div>
         <div class="col-md-9">

         <div class="login-btns">
            <?php echo $this->Form->input('submit', array('type'=>'submit', 'class' =>'btn explore-submit btn-primary')); ?>

            <span><?php echo $this->Html->link(__('forgot password'), array('controller' => 'users','action' => 'forgot'), array('class' => 'btn explore-btn btn-warning')); ?></span>

           
         </div>

         

          

    


            
         </div>
      </div>
   </div>
</div>