<script type="text/javascript">
$(document).ready(function(){
    $('#BusinessAddForm').validate({
           event:'blur',
            rules:
            {
                "data[User][email]":
                {
                    required:true,
                    email:true,
                    remote:ajax_url+'users/validUserEmail'
                },
                
                "data[User][password]":
                {
                    required:true,
                    minlength: 8
                },
                "data[User][cpassword]":
                {
                    required:true,
                    equalTo:'#pwd'
                },
                "data[Business][businessname]":
                {
                    required:true
                },
                "data[User][firstname]":
                {
                    required:true
                },
                "data[User][lastname]":
                {
                    required:true
                },
                "data[Business][businessname]":
                {
                    required:true
                },
                "data[Business][addressline1]":
                {
                    required:true
                },
                "data[Business][country]":
                {
                    required:true
                },
                "data[Business][state]":
                {
                    required:true
                },
                "data[Business][city]":
                {
                    required:true
                },
                "data[Business][zip]":
                {
                    required:true
                },
                "data[Business][phone]":
                {
                    required:true,
                    number:true
                },
                "data[Business][companywebaddress]":
                {
                    required:true,
                    url:true
                },
                "data[Business][feedbackthreshold]":
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
                    minlength: 'Password should be atleast 8 characters long.'
                },
                "data[User][cpassword]":
                {
                    required:"This field is required.",
                    equalTo:'Password and confirm password does not match.'
                },
                "data[Business][businessname]":
                {
                    required:"This field is required."
                },
                "data[User][firstname]":
                {
                    required:"This field is required."
                },
                "data[User][lastname]":
                {
                    required:"This field is required."
                },
                "data[Business][business_category_id]":
                {
                    required:"This field is required."
                },
                "data[Business][business_category_id]":
                {
                    required:"This field is required."
                },
                "data[Business][addressline1]":
                {
                    required:"This field is required."
                },
                "data[Business][country]":
                {
                    required:"This field is required."
                },
                "data[Business][state]":
                {
                    required:"This field is required."
                },
                "data[Business][city]":
                {
                    required:"This field is required."
                },
                "data[Business][zip]":
                {
                    required:"This field is required."
                },
                "data[Business][phone]":
                {
                    required:"This field is required.",
                    number:"Please enter digit."
                },
                "data[Business][companywebaddress]":
                {
                    required:"This field is required.",
                    number:"Please enter a valid url."
                },
                "data[Business][feedbackthreshold]":
                {
                    required:"This field is required.",
                }
                
            }
        
        
        });
        
    
    });
</script>

<div class="businesses container">

<h1 class="business-heading">Add Business <span><a class="go-back btn btn-primary" href="<?php echo HTTP_ROOT?>dashboard/manageUser">Go Back</a></span></h1>
<!-- <div class="main-back">
<a class="go-back btn btn-primary" href="<?php echo HTTP_ROOT?>dashboard/manageUser">Go Back</a></div> --> 

<div class="add-business">



<div class="main-form-start">
<form class="form-horizontal"  accept-charset="utf-8" method="post" id="BusinessAddForm" action="<?php echo HTTP_ROOT?>businesses/add">


    

     
    <!--Business Name :<input type="text" required="required" id="BusinessBusinessname" maxlength="255" name="data[Business][businessname]"></br>-->
     


    


   <div class="form-group">
      <label class="control-label col-sm-4" for="email">First Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control form-back" required="required" id="UserFirstname" placeholder="Enter First Name" name="data[User][firstname]">
      </div>
    </div>







    

   <div class="form-group">
      <label class="control-label col-sm-4" for="email">Last Name:</label>
      <div class="col-sm-8">
        <input type="text" required="required" class="form-control form-back" id="UserLastname" placeholder="Enter Last Name" name="data[User][lastname]">
      </div>
    </div>


   

    <div class="form-group">
      <label class="control-label col-sm-4" for="email"> Email Id:</label>
      <div class="col-sm-8">
        <input type="email" id="UserEmail" name="data[User][email]" placeholder="Enter Email Id" class="form-control form-back">
      </div>
    </div>









    
    <div class="form-group">
      <label class="control-label col-sm-4" for="email">Password:</label>
      <div class="col-sm-8">
        <input type="password" class="field text full required form-control form-back" id="pwd"  placeholder="Enter Password" name="data[User][password]" required="required">
      </div>
    </div>









     
    <div class="form-group">
      <label class="control-label col-sm-4" for="email">Confirm Password:</label>
      <div class="col-sm-8">
        <input type="password" class="field text full required form-control form-back" id="UserPassword" placeholder="Enter Confirm Password" name="data[User][cpassword]" required="required">
      </div>
    </div>



  
   <div class="form-group">
      <label class="control-label col-sm-4" for="email">Business Name:</label>
      <div class="col-sm-8">
        <input type="text" class="field text full required form-control form-back" id="Businessname" placeholder="Enter Business Name" name="data[Business][businessname]" required="required">
      </div>
    </div>






    <?php /*Parent Business:<select  id="ParentId" name="data[Business][parent_id]">
                                <option value=""><?php echo "Select Parent Bussiness"?></option>
                                <?php foreach($parentBusinesses as $key=>$val){?>
                                    <option value="<?php echo $key?>"><?php echo $val?></option>
                                <?php } ?>
                           </select></br> */ ?>
 <div class="form-group">
  <label class="control-label col-sm-4" for="email">Main Business Category:</label>
   <div class="col-sm-8">
    <select class="form-selected" required="required" id="BusinessBusinessCategoryId" name="data[Business][business_category_id]">
                            <option value=""><?php echo "Select Bussiness Category"?></option>
                                <?php foreach($businessCategories as $key=>$val){?>
                                    <option value="<?php echo $key?>"><?php echo $val?></option>
                                <?php } ?>
                        </select></br>
                   </div>
                  </div>

     

	<div class="form-group">
      <label class="control-label col-sm-4" for="email">Street Address:</label>
      <div class="col-sm-8">
        <input type="text" class="field text full required form-control form-back" maxlength="255" id="BusinessAddressline" placeholder="Enter Street Address" name="data[Business][addressline1]" required="required">
      </div>
    </div>







    

     <div class="form-group">
      <label class="control-label col-sm-4" for="email">Street Address Line 2:</label>
      <div class="col-sm-8">
        <input type="text" class="field text full required form-control form-back" maxlength="255" id="BusinessAddressline2" placeholder="Enter Street Address Line 2" name="data[Business][addressline2]" required="required">
      </div>
    </div>



 <div class="form-group">
 <label class="control-label col-sm-4" for="email">Country:</label>
 <div class="col-sm-8">
    <select class="form-selected" required="required" id="find_country" name="data[Business][country]">
                <option value=""><?php echo "Select Country"?></option>
                                <?php foreach($countries as $key=>$val){?>
                                    <option value="<?php echo $key?>"><?php echo $val?></option>
                                <?php } ?>
                </select></div>
    </div>


<div class="form-group">
 <label class="control-label col-sm-4" for="email">State/Province:</label>

 <div class="col-sm-8">
    <select class="form-selected" required="required" id="find_state" name="data[Business][state]">
                        <option value="">Select State</option>
                    </select></div>
    </div>







  <div class="form-group">
 <label class="control-label col-sm-4" for="email"> City:</label>
 <div class="col-sm-8">
   <select class="form-selected" required="required" id="find_city" name="data[Business][city]">
    <option value="">Select City</option>
    </select></div>
    </div>
   

    <div class="form-group">
      <label class="control-label col-sm-4" for="email">Zip:</label>
      <div class="col-sm-8">
        <input type="text" class="field text full required form-control form-back" maxlength="20" id="BusinessZip" placeholder="Enter zip" name="data[Business][zip]" required="required">
      </div>
    </div>






 
     

   <div class="form-group">
      <label class="control-label col-sm-4" for="email">Phone:</label>
      <div class="col-sm-8">
        <input type="tel" class="field text full required form-control form-back" maxlength="255" id="BusinessPhone" placeholder="Enter Phone" name="data[Business][phone]" required="required">
      </div>
    </div>

 




     

   <div class="form-group">
      <label class="control-label col-sm-4" for="email">Company Web Address:</label>
      <div class="col-sm-8">
        <input type="text" class="field text full required form-control form-back" maxlength="100" id="BusinessCompanywebaddress" placeholder="Enter Company Web Address" name="data[Business][companywebaddress]" required="required">
      </div>
    </div>






   <?php /* Company Email Address:<input type="text" id="BusinessCompanyemailaddress" name="data[Business][companyemailaddress]"></br> */ ?>



    <div class="form-group">
   <label class="control-label col-sm-4" for="email">Feedback Threshold:</label>
   <div class="col-sm-8">
    <select class="form-selected" id="feedbackthreshold" name="data[Business][feedbackthreshold]">
    <option value="">Select</option>
    <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    
    </select></br>	
     </div>
    </div>

    <div class="form-group">
<label class="control-label col-sm-4" for="email">Number of automated E-mail attempts :</label>
 <div class="col-sm-8">
    <select class="form-selected" id="automatedenailattempts" name="data[Business][automatedenailattempts]">
        <option value="">Select</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        </select></br>

</div>
    </div>



 

    <div class="form-group">


   <label class="control-label col-sm-4" for="email">Email Frequency:</label>
<div class="col-sm-8">
    <select class="form-selected" id="emailfrequency" name="data[Business][emailfrequency]">
                    <option value="">Select</option>
            	<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>>
			    </select></br>
</div>
    </div>

  <div class="form-group">
 <label class="control-label col-sm-4" for="email">Social Sharing Checker:</label>
 <div class="col-sm-8">
   <select class="form-selected" name="data[Business][Attendees][]" multiple="multiple" id="BusinessAttendees">
                        <option value=""><?php echo "Social Sharing Checker"?></option>
                                <?php foreach($socialmedia as $key=>$val){?>
                                    <option value="<?php echo $key?>"><?php echo $val?></option>
                                <?php } ?>
                        </select> 
</div>
    </div>
         
     <div class="form-group">
 <label class="control-label col-sm-4" for="email">Visibility Checker:</label> 
 <div class="col-sm-8">
    <select class="form-selected" name="data[Business][visibilitychecker][]" multiple="multiple" id="BusinessVisibilitychecker">
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
