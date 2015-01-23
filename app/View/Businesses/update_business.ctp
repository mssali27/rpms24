<?php //pr($data);die;?>
<script type="text/javascript">
$(document).ready(function(){
	$('#BusinessAddForm').validate({
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
					minlength: 6
				},
				"data[User][cpassword]":
				{
					required:true,
					equalTo:'#pwd'
				},
				"data[Business][businessname]":
				{
					required:true,
				},
				"data[User][firstname]":
				{
					required:true,
				},
				"data[User][lastname]":
				{
					required:true,
				}


			},
			messages:
			{
				"data[User][email]":
				{
					required:'Please enter email.',
					email:'Please enter valid email.',
					remote:'Email address already exists.'
				},
				"data[User][password]":
				{
					required:"This field is required.",
					minlength: 'Password should be atleast 6 characters long.'
				},
				"data[User][cpassword]":
				{
					required:"This field is required.",
					equalTo:'Password and confirm password does not match.'
				},
				"data[Business][businessname]":
				{
					required:"This field is required.",
				},
				"data[User][firstname]":
				{
				  required:"This field is required.",	
				},
				"data[User][lastname]":
				{
				  required:"This field is required.",	
				}
				
			}
		
		
		});
		
	
	});
</script>

<div class="businesses container" id="edit-business">
<h1 class="business-heading">Edit Business <span><a class="go-back btn btn-primary" href="<?php echo HTTP_ROOT?>dashboard/manageUser">Go Back</a></span></h1>
<div class="add-business">

<div class="main-form-start">
<form accept-charset="utf-8" method="post" id="BusinessAddForm" action="<?php echo HTTP_ROOT?>businesses/updateBusiness">
	<input type="hidden" id="id" name="data[User][id]" value="<?php echo $data['Business']['user_Id'];?>">
	<!--Business Name :<input type="text" required="required" id="BusinessBusinessname" maxlength="255" name="data[Business][businessname]"></br>-->

	<div class="form-group">
         <label class="control-label col-sm-4">First Name:</label>   
            <div class="col-sm-8">
                 <input type="text" id="UserFirstname"  placeholder="Enter First Name" class="form-control form-back" name="data[User][firstname]" value="<?php echo @$userdata['User']['firstname'];?>">
           </div>
    </div>


   <div class="form-group">
         <label class="control-label col-sm-4">Last Name:</label>   
            <div class="col-sm-8">
                <input type="text" id="UserLastname" placeholder="Enter Last Name" class="form-control form-back" name="data[User][lastname]" value="<?php echo @$userdata['User']['lastname'];?>">
           </div>
    </div>


	<input type="hidden" id="id" name="data[User][id]" value="<?php echo $data['Business']['id'];?>">
	<input type="hidden" id="id" name="data[Business][id]" value="<?php echo $data['Business']['id'];?>">
	

      <div class="form-group">
         <label class="control-label col-sm-4">Business Name:</label>   
            <div class="col-sm-8">
                <input type="text" id="Businessname" class="form-control form-back" placeholder="Enter Business Name" name="data[Business][businessname]" value="<?php echo $data['Business']['businessname'];?>">
           </div>
    </div>



     <div class="form-group">
         <label class="control-label col-sm-4">Parent Business:</label> 
	        <div class="col-sm-8">
	        <select class="form-selected" id="ParentId" name="data[Business][parent_id]">
								<option value=""><?php echo "Select Parent Bussiness"?></option>
								<?php foreach($parentBusinesses as $key=>$val){?>
								    <option <?php if($data['Business']['parent_id']==$key){?>selected="selected"<?php }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php } ?>
						   </select>
				 </div>
    </div>


    <div class="form-group">
         <label class="control-label col-sm-4">Main Business Category:</label> 
         <div class="col-sm-8">
	      <select class="form-selected" required="required" id="BusinessBusinessCategoryId" name="data[Business][business_category_id]">
							<option value=""><?php echo "Select Bussiness Category"?></option>
								<?php foreach($businessCategories as $key=>$val){?>
								    <option <?php if($data['Business']['business_category_id']==$key){?>selected="selected"<?php }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php } ?>
		  </select>
            </div>
    </div>


   <div class="form-group">
         <label class="control-label col-sm-4">Street Address:</label>   
            <div class="col-sm-8">
                <input type="text" required="required" class="form-control form-back" placeholder="Enter Street Address" id="BusinessAddressline1" maxlength="255" name="data[Business][addressline1]" value="<?php echo $data['Business']['addressline1'];?>">
	
           </div>
    </div>


    <div class="form-group">
         <label class="control-label col-sm-4">Street Address Line 2:</label>   
            <div class="col-sm-8">
                <input type="text" required="required" class="form-control form-back" placeholder="Enter Street Address Line 2" id="BusinessAddressline2" maxlength="255" name="data[Business][addressline2]" value="<?php echo $data['Business']['addressline2'];?>">
	
           </div>
    </div>




	

    <div class="form-group">
       <label class="control-label col-sm-4">Country:</label> 
        	<div class="col-sm-8">
	   			<select class="form-selected" required="required" id="find_country" name="data[Business][country]">
					<option value=""><?php echo "Select Country"?></option>
								<?php foreach($countries as $key=>$val){?>
								    <option <?php if($data['Business']['country']==$key){?>selected="selected"<?php }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php } ?>
				</select>
        </div>
    </div>


 


	  <div class="form-group">
	       <label class="control-label col-sm-4">State/Province:</label> 
	        <div class="col-sm-8">
				<select class="form-selected" required="required" id="find_state" name="data[Business][state]">
							<option value="">Select State</option>
							<?php foreach($states as $key=>$val){?>
									    <option <?php if($data['Business']['state']==$key){?>selected="selected"<?php }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php } ?>
						</select>
	    		 </div>
	    </div>









   <div class="form-group">
	   <label class="control-label col-sm-4">City:</label> 
	    <div class="col-sm-8">
			<select class="form-selected" required="required" id="find_city" name="data[Business][city]">
				<option value="">Select City</option>
						<?php foreach($cities as $key=>$val){?>
								    <option <?php if($data['Business']['city']==$key){?>selected="selected"<?php }?> value="<?php echo $key?>"><?php echo $val?></option>
						<?php } ?>
				</select>

 				 </div>
	    </div>



      <div class="form-group">
         <label class="control-label col-sm-4">Zip:</label>   
            <div class="col-sm-8">
               <input type="text" required="required" placeholder="Enter zip" class="form-control form-back" id="BusinessZip" maxlength="20" name="data[Business][zip]" value="<?php echo $data['Business']['zip'];?>">
	
           </div>
    </div>



  <div class="form-group">
         <label class="control-label col-sm-4">Phone:</label>   
            <div class="col-sm-8">
              <input class="form-control form-back" type="tel" required="required" class="form-control" placeholder="Enter Phone" id="BusinessPhone" maxlength="255" name="data[Business][phone]" value="<?php echo $data['Business']['phone'];?>">
	
           </div>
    </div>

	   <div class="form-group">
         <label class="control-label col-sm-4">Company Web Address:</label>   
            <div class="col-sm-8">
             <input type="text" required="required" class="form-control form-back" placeholder="Enter Company Web Address" id="BusinessCompanywebaddress" maxlength="100" name="data[Business][companywebaddress]" value="<?php echo $data['Business']['companywebaddress'];?>">
           </div>
    </div>


 

	 <div class="form-group">
         <label class="control-label col-sm-4">Feedback Threshold:</label>   
            <div class="col-sm-8">
	        <?php
	        $feed = $data['Business']['feedbackthreshold'];
			
	        ?>
			<select class="form-selected" required="required" id="feedbackthreshold" name="data[Business][feedbackthreshold]">
			<option value="">Select</option>
			<?php $limit = 10;
			for($i = 1; $i <= $limit; $i++)
			{
			?>
		<option <?php if($i==$feed)  { ?> selected="selected" value="<?php echo $data['Business']['feedbackthreshold']; } else { ?>" value="<?php echo $i; } ?>"><?php  echo $i; ?> </option>
				<?php
			}
		?>

		</select>

  	</div>
    </div>


 <div class="form-group">
         <label class="control-label col-sm-4">Number of automated E-mail attempts :</label>   
            <div class="col-sm-8">
            <?php
            
	        $auto_email = $data['Business']['automatedenailattempts'];
	         

	        ?>

	<select class="form-selected" required="required" id="automatedenailattempts" name="data[Business][automatedenailattempts]">
		<option value="">Select</option>
		 	<?php $limit_emial = 10;
			for($i = 1; $i <= $limit_emial; $i++)
			{
			?>
			<option <?php if($i==$auto_email)  { ?> selected="selected"  value="<?php echo $data['Business']['automatedenailattempts']; } else { ?>" value="<?php echo $i; } ?>"><?php  echo $i; ?> </option>
				<?php
			}
		?>
		</select>
       </div>
     </div>  


    <div class="form-group">
         <label class="control-label col-sm-4">Email Frequency:</label>   
            <div class="col-sm-8">
            	<?php
            
	        $emial_freq = $data['Business']['emailfrequency'];
	        ?>

	<select class="form-selected" required="required" id="emailfrequency" name="data[Business][emailfrequency]">
					 
            <option value="">Select</option>
		 	<?php $limit_freq = 10;
			for($i = 1; $i <= $limit_freq; $i++)
			{
			?>
			<option <?php if($i==$emial_freq)  { ?> selected="selected" value="<?php echo $data['Business']['emailfrequency']; } else { ?>" value="<?php echo $i; } ?>"><?php  echo $i; ?> </option>
				<?php
			}
		?>
               


  
					</select>
             </div>
         </div>     


  <div class="form-group">
         <label class="control-label col-sm-4">Social Sharing Checker:</label>   
            <div class="col-sm-8">

	 <select class="form-selected" name="data[Business][Attendees][]" multiple="multiple" id="BusinessAttendees">
						<option value=""><?php echo "Social Sharing Checker"?></option>
								<?php foreach($socialmedia as $key=>$val){?>
								    <option value="<?php echo $key?>"><?php echo $val?></option>
								<?php } ?>
						</select>
        </br>
    </div>
   </div> 



     <div class="form-group">
         <label class="control-label col-sm-4">Visibility Checker:</label>   
            <div class="col-sm-8">
        
	<select class="form-selected" name="data[Business][visibilitychecker][]" multiple="multiple" id="BusinessAttendees">
						<option value=""><?php echo "Social Sharing Checker"?></option>
								<?php foreach($socialmedia as $key=>$val){?>
								    <option value="<?php echo $key?>"><?php echo $val?></option>
								<?php } ?>
						</select>

					</div>
				</div>




  <div class="form-group">
    <label class="control-label col-sm-4" for="email">&nbsp;</label>  
    <div class="col-sm-8 submitting"> 
        <input type="submit" class="submit btn btn-primary" value="Submit">
     </div> 
    </div>					

</form>
</div>
</div>
 
