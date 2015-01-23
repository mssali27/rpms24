<script src="http://cdnjs.cloudflare.com/ajax/libs/zeroclipboard/2.1.6/ZeroClipboard.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#adminuploadban').validate({
            rules:
            {
                "data[AgencysiteSetting][bannerurl]":
                {
                    //required:true,
                    url:true,
                   // remote:ajax_url+'users/validUserEmail'
                }
            },
            messages:
            {
                "data[AgencysiteSetting][bannerurl]":
                {
                    //required:'Please enter email.',
                    url:'Please enter valid url.',
                    //remote:'Email address already exists.'
                }
            }
        
        
        });
        $('#admintab').validate({
            rules:
            {
                "data[AgencysiteSetting][companywebaddress]":
                {
                    url:true,
                  
                },
                "data[User][email]":
                {
                    required:true,
                    email:true,
                    remote:ajax_url+'dashboard/validEmail'
                },
                "data[AgencysiteSetting][additionalemailnotification]":
                {
                    required:true,
                    email:true,
                    remote:ajax_url+'dashboard/addvalidEmail'
                   
                },
                "data[User][firstname]":
                {
                    required:true
                   
                },
                "data[AgencysiteSetting][agencyname]":
                {
                    required:true
                   
                },
                "data[AgencysiteSetting][subdomainname]":
                {
                    required:true
                },
                "data[AgencysiteSetting][zip]":
                {
                    required:true
                }

            },
            messages:
            {
                "data[AgencysiteSetting][companywebaddress]":
                {
                    url:'Please enter valid url.'
                    
                },
                "data[User][email]":
                {
                    required:'This is required field.',
                    email:'Please enter a valid email.',
                    remote:'Email is already exist.'
                    
                },
                "data[AgencysiteSetting][additionalemailnotification]":
                {
                    required:'This is required field.',
                    email:'Please enter a valid email.',
                    remote:'Email is already exist.'
                  
                    
                },
                "data[User][firstname]":
                {
                    required:'This is required field.'
                   
                },
                "data[AgencysiteSetting][agencyname]":
                {
                    required:'This is required field.'
                   
                },
                "data[AgencysiteSetting][subdomainname]":
                {
                    required:'This is required field.'
                }

            }
        
        
        });
        $('#emailtalk').validate({
            rules:
            {
                "data[AgencysiteSetting][emailtalk]":
                {
                    required:true,
                    email:true,
                  
                }
            },
            messages:
            {
                "data[AgencysiteSetting][emailtalk]":
                {
                    required:'Please enter email.',
                    email:'Please enter valid email.',
                    
                }
            }
        
        
        });
         $('#changepass').validate({
            rules:
            {
                "data[User][oldpass]":
                {
                    required:true,
                    remote:ajax_url+'dashboard/checkValidPass'
                  
                },
                "data[User][password]":
                {
                    required:true,
                    minlength: 8
                },
                "data[User][cpassword]":
                {
                    required:true,
                    equalTo:'#UserPassword'
                }
            },
            messages:
            {
                "data[User][oldpass]":
                {
                    required:'Please enter current password.',
                    remote:'Please enter valid current password'
                    
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
                }
            }
        
        
        });
        


});

</script>

<div class="container">
        <div class="row">
          <div class="col-sm-3">
            <h2 class="subhead">Agency Dashboard</h2>
          </div>
          <div class="col-sm-3 nopad-left">
            <input type="text" name="add-new-biz" placeholder="+ Add New Business" class="quickfield" />
            <button type="button" class="btn arrow-submit"></button>
          </div>
          <div class="col-sm-3 nopad-right">
            <input type="text" name="search-biz" placeholder="Search Clients" class="quickfield" />
            <button type="button" class="btn arrow-submit"></button>
          </div>
          <div class="col-sm-3">
          
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-10">
            <div id="content-wrapper">
              <?php echo $this->element('nav')?>
              <div class="wrapTab">
           
           
             
            <div class="bodyTaab">
            <!--start the section-->



<div class="account-business" id="accounted-b">

<h1 class="account-heading">My Account Detail</h1>

<!-- <div class="main-back">
<a class="go-back btn btn-primary" href="<?php echo HTTP_ROOT?>dashboard">Go Dashboard</a>
</div> -->


<div class="main-form-start">

<form accept-charset="utf-8" method="post" enctype= "multipart/form-data" id="admintab" action="<?php echo HTTP_ROOT?>dashboard/admin">
        
    <input type="hidden" name="data[Agency][id]" value="<?php echo @$agency['AgencysiteSetting']['id']?>">

    <div class="form-group">
     <label class="control-label col-sm-3" for="email">Email Address:</label>
    <div class="col-sm-9">
     <input class="form-control account-back" type="text"  id="agencyemail" name="data[User][email]" value="<?php echo @$user['User']['email']?>" readonly>
    </div>
    </div>




    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Additional Email Notification:</label> 
    <div class="col-sm-9">
    <input class="form-control account-back" type="text" id="aditionalemail" name="data[AgencysiteSetting][additionalemailnotification]" value="<?php echo @$agency['AgencysiteSetting']['additionalemailnotification']?>">
    </div>
    </div>


    <div class="form-group">
     <label class="control-label col-sm-3" for="email">First Name:</label>
     <div class="col-sm-9"> 
    <input class="form-control account-back" type="text" id="ufirstname" name="data[User][firstname]" value="<?php echo @$user['User']['firstname']?>">
    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Last Name:</label>
    <div class="col-sm-9"> 
    <input class="form-control account-back" type="text" id="ulastname" name="data[User][lastname]" value="<?php echo @$user['User']['lastname']?>">
    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Company Name:</label>
    <div class="col-sm-9"> 
    <input class="form-control account-back" type="text" id="agencyemail" name="data[AgencysiteSetting][agencyname]" value="<?php echo @$agency['AgencysiteSetting']['agencyname']?>">
    </div>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Street Address:</label>
    <div class="col-sm-9">
    <input class="field text full form-control account-back" type="text" id="AddressLine1" name="data[AgencysiteSetting][addressline1]" value="<?php echo @$agency['AgencysiteSetting']['addressline1']?>" >
    </div>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Street Address Line2:</label>
    <div class="col-sm-9">
    <input class="field text full form-control account-back" type="text" id="AddressLine2" name="data[AgencysiteSetting][addressline2]" value="<?php echo @$agency['AgencysiteSetting']['addressline2']?>" >
    </div>
    </div>


   <div class="form-group">
   <label class="control-label col-sm-3" for="email">Country:</label>
   <div class="col-sm-9">
   <select class="account-selected" id="find_country" name="data[AgencysiteSetting][country_id]">
    <option value=""><?php  echo "Select Country"?></option>
                               <?php foreach($countries as $key=>$val){?>
                                    <option <?php if(@$agency['AgencysiteSetting']['country_id']==$key){?>selected="selected"<?php }?> value="<?php echo $key?>"><?php echo $val?></option>
                                <?php } ?>
   </select>

   </div>
   </div>



    <div class="form-group">
    <label class="control-label col-sm-3" for="email">State/Province:</label>
    <div class="col-sm-9">
    <select class="account-selected" id="find_state" name="data[AgencysiteSetting][state_id]">
                        <option value="">Select State</option>
                        <?php foreach($states as $key=>$val){?>
                                    <option <?php if(@$agency['AgencysiteSetting']['state_id']==$key){?>selected="selected"<?php }?> value="<?php echo $key?>"><?php echo $val?></option>
                        <?php } ?>
    </select>

    </div>
    </div>



    
    <div class="form-group">
    <label class="control-label col-sm-3" for="email">City:</label>
    <div class="col-sm-9">               
    <select class="account-selected" id="find_city" name="data[AgencysiteSetting][city_id]">
    <option value="">Select City</option>
                        <?php foreach($cities as $key=>$val){?>
                                    <option <?php if(@$agency['AgencysiteSetting']['city_id']==$key){?>selected="selected"<?php }?> value="<?php echo $key?>"><?php echo $val?></option>
                        <?php } ?>
    </select>
    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Zip:</label>
    <div class="col-sm-9">
    <input class="form-control account-back" type="text" id="AgencyZip" maxlength="20" name="data[AgencysiteSetting][zip]" value="<?php echo @$agency['AgencysiteSetting']['zip']?>">

    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Phone:</label>
    <div class="col-sm-9">
    <input class="form-control account-back" type="tel" id="AgencyPhone" maxlength="255" name="data[AgencysiteSetting][phone]" value="<?php echo @$agency['AgencysiteSetting']['phone']?>">
    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Company Web Address:</label>
    <div class="col-sm-9">
    <input class="form-control account-back" type="text" id="Agencywebaddress" maxlength="100" name="data[AgencysiteSetting][companywebaddress]" value="<?php echo @$agency['AgencysiteSetting']['companywebaddress']?>">
    </div>
    </div>
   
    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Agency Subdomain:</label>
    <div class="col-sm-9">
    <input class="form-control account-back" type="text" maxlength="20" id="AgencySubdomain" name="data[AgencysiteSetting][subdomainname]" value="<?php echo @$agency['AgencysiteSetting']['subdomainname']?>">
    </div>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Agency Domain:</label>
    <div class="col-sm-9">
    <input class="form-control account-back" type="text" maxlength="20" id="Agencydomain" name="data[AgencysiteSetting][domainname]" value="<?php echo @$agency['AgencysiteSetting']['domainname']?>">
    </div>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Agency Logo:</label>
    <div class="col-sm-9">

    <div class="fileUpload btn">
    <span>Upload</span>
    <input type="file" class="upload" id="agencylogo" name="data[AgencysiteSetting][agencylogo]"/>
    </div>


    <!-- <input type="file" id="agencylogo" name="data[AgencysiteSetting][agencylogo]"> -->
    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Logo:</label>
    <div class="col-sm-9">
    <?php if(isset($agency['AgencysiteSetting']['agencylogo'])){?><img src="<?php echo HTTP_ROOT;?>/img/agencylogo/medium/<?php echo @$agency['AgencysiteSetting']['agencylogo'] ?>" style="width:20%;height:100px;float:left"/><?php }?>
    <input type="hidden" id="logoag" name="data[Agency][logoname]" value="<?php echo @$agency['AgencysiteSetting']['agencylogo']?>">

    </div>
    </div>



    <div class="form-group">
    <label for="email" class="control-label col-sm-3">&nbsp;</label>  
    <div class="col-sm-9 submitting"> 
        <input type="submit" value="Submit" class="submit btn btn-primary">
     </div> 
    </div>

</form>

</div>










<div class="upload-banner">
    <form accept-charset="utf-8" method="post" enctype= "multipart/form-data" id="adminuploadban" action="<?php echo HTTP_ROOT?>dashboard/admin/uploadbanner">
       <h1 class="account-heading">Upload Banner</h1>
       <input type="hidden" name="data[Agency][id]" value="<?php echo @$agency['AgencysiteSetting']['id']?>">


       <div class="form-group">
       <label class="control-label col-sm-3" for="email">Upload Banner:</label>
       <div class="col-sm-9">

       <div class="fileUpload btn">
        <span>Upload</span>
        <input type="file" class="upload" id="agencybanner" name="data[AgencysiteSetting][banner]"/>
        </div> 

       <!-- <input type="file" id="agencybanner" name="data[AgencysiteSetting][banner]"> -->
       </div>
       </div>


       <div class="form-group">
       <label class="control-label col-sm-3" for="email">Current Banner:</label>
       <div class="col-sm-9">
       <?php if(isset($agency['AgencysiteSetting']['banner'])){?><img src="<?php echo HTTP_ROOT;?>/img/banner/medium/<?php echo @$agency['AgencysiteSetting']['banner'] ?>" style="width:20%;height:100px;float:left"/><?php }?>
       </div>
       </div>





        <input type="hidden" id="bannerag" name="data[Agency][banner]" value="<?php echo @$agency['AgencysiteSetting']['banner']?>">

       <div class="form-group">
       <label class="control-label col-sm-3" for="email">Landing page url on banner:</label>
       <div class="col-sm-9">  
       <input class="form-control account-back" type="text" maxlength="50" id="bannerurl" name="data[AgencysiteSetting][bannerurl]" value="<?php echo @$agency['AgencysiteSetting']['bannerurl']?>">
       </div>
       </div>
        

       <div class="form-group">
       <label class="control-label col-sm-3" for="email">&nbsp;</label>
       <div class="col-sm-9 submitting">
       <input type="submit" class="submit btn btn-primary" value="Submit">
       </div>
       </div>


    </form>

</div></div>





<div class="email-talk">
    <form accept-charset="utf-8" method="post" enctype= "multipart/form-data" id="emailtalk" action="<?php echo HTTP_ROOT?>dashboard/admin/emailtalk">
        <h1 class="account-heading">Email Talk To Notification Pro</h1>
        <input type="hidden" name="data[Agency][id]" value="<?php echo @$agency['AgencysiteSetting']['id']?>">

        <div class="form-group">
        <label class="control-label col-sm-3" for="email">Email Id:</label>
        <div class="col-sm-9"> 
        <input class="form-control account-back" type="text" id="emailtalk" name="data[AgencysiteSetting][emailtalk]" value="<?php echo @$agency['AgencysiteSetting']['emailtalk']?>">
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="email">&nbsp;</label>
        <div class="col-sm-9 submitting">
        <input type="submit" class="submit btn btn-primary need-talk" value="Submit">
        </div>
        </div>

    </form>    
</div>



<div class="main-change-password">
    <form accept-charset="utf-8" method="post" enctype= "multipart/form-data" id="changepass" action="<?php echo HTTP_ROOT?>dashboard/admin/changepass">
        <h1 class="account-heading">Change Password</h1>
        <input type="hidden" name="data[Agency][id]" value="<?php echo @$agency['AgencysiteSetting']['id']?>">

        <div class="form-group">
        <label class="control-label col-sm-3" for="email">Cuurent Password:</label>
        <div class="col-sm-9">
        <input class="form-control account-back" type="password" id="oldpass" name="data[User][oldpass]">
        </div>
        </div>


        <div class="form-group">
        <label class="control-label col-sm-3" for="email">New Password:</label>
        <div class="col-sm-9">
        <input class="form-control account-back" type="password" required="required" id="UserPassword" name="data[User][password]">
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="email">Confirm Password:</label>
        <div class="col-sm-9">
        <input class="form-control account-back" type="password" required="required" id="cpass" name="data[User][cpassword]">
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="email">&nbsp;</label>
        <div class="col-sm-9 submitting">
        <input type="submit" class="submit btn btn-primary" value="Submit">
        </div>
        </div>

    </form>    
</div>




<div class="registration-email">
 <form accept-charset="utf-8" method="post" enctype= "multipart/form-data" id="register-emailNotification" action="<?php echo HTTP_ROOT?>dashboard/admin/regEmail">
     
            <h1 class="account-heading">Registration Email Notification</h1>
            <input type="hidden" name="data[Agency][id]" value="<?php echo @$agency['AgencysiteSetting']['id']?>">
            <input type="hidden" name="data[Template][id]" value="<?php echo @$emailtemplate['AgencyTemplate']['id']?>">
             <input type="hidden" name="data[Template][name]" value="Registered email notification.">


            <div class="form-group"> 
            <label class="control-label col-sm-3" for="email">Business Owner Signup Link:</label> 
            <div class="col-sm-9">   
            <div id="signupurl">
            <div id="clipboard-text" name="clipboard-text" onclick="this.select();">
            <?php echo HTTP_ROOT.'users/registerBusinessUser/'.base64_encode(@$agency['AgencysiteSetting']['id'])?>
            </div>
            </div>
            </div>
            </div>



            <div class="form-group">
            <label class="control-label col-sm-3" for="email">&nbsp;</label>  
            <div class="col-sm-9">
           <?php echo $this->Html->link('Preview', '/users/registerBusinessUser/'.base64_encode(@$agency['AgencysiteSetting']['id']), array('target' => '_blank','class'=>"preview")); ?>
            <input class="copy-field" data-clipboard-target="clipboard-text" id="btn-To-Copy" value="Copy" type="button">
            </div>
            </div>



            <div class="form-group" id="new-chk">
            <label class="control-label col-sm-3" for="email">&nbsp;</label>
            <div class="col-sm-9 inner-kk">

            <input type="checkbox" id="signuplink" class="css-checkbox" checked="checked" name="data[link]" checked="checked"/>
            <label for="signuplink" name="checkbox2_lbl" class="css-label lite-orange-check">Show Business Owner Link:</label>



            <!-- <input type="checkbox" id="signuplink" name="data[link]" checked="checked"> -->
            </div>
            </div>

           <div class="form-group"> 
           <label class="control-label col-sm-3" for="email">Email Subject:</label> 
           <div class="col-sm-9">           
           <input class="form-control account-back" type="text" id="email-subject" name="data[AgencyTemplate][emailsubject]" value="<?php echo @$emailtemplate['AgencyTemplate']['emailsubject']?>">
           </div>
           </div>

           <div class="form-group"> 
           <label class="control-label col-sm-3" for="email">Sender Name:</label>
           <div class="col-sm-9">  
           <input class="form-control account-back" type="text" id="sender-name" name="data[AgencyTemplate][sendername]" value="<?php echo @$emailtemplate['AgencyTemplate']['sendername']?>">
           </div>
           </div>

           <div class="form-group">
           <label class="control-label col-sm-3" for="email">Sender email:</label>
           <div class="col-sm-9">
           <input class="form-control account-back" type="text" id="sender-email" name="data[AgencyTemplate][senderemail]" value="<?php echo @$emailtemplate['AgencyTemplate']['senderemail']?>">
           </div>
           </div>





           <div class="form-group">
           <label class="control-label col-sm-3" for="email">Email Content:</label>
           <div class="col-sm-9">
           <textarea name="data[AgencyTemplate][emailcontent]" id="cktext"><?php echo @$emailtemplate['AgencyTemplate']['emailcontent']?></textarea>
           </div>
           </div>



           <div class="form-group">
            <label class="control-label col-sm-3" for="email">&nbsp;</label>
            <div class="col-sm-9">
            <input class="restore-default" onclick="InsertText();" type="button" value="Restore Default">
             <input type="button" value="Merge Fields" class="btn btn-primary" data-toggle="modal" data-target="#emailcontent-model">
            </div>
            </div>



            <div class="modal fade" id="emailcontent-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Click Insert button to mearge field</h4>
                  </div>
                  <div class="modal-body">
                      <?php $fields=explode(',',@$defaultemplate['DefaultTemplate']['mergefields'])?>
                      <table>
                        <?php foreach ($fields as $key => $value) { ?>
                             <tr><td><?php echo $value?></td><td style="margin-left:100px">
                             <input type="button" value="Insert" class="insbtncon">
                             </td></tr>
                        <?php }?>
                      </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
            <label class="control-label col-sm-3" for="email">Email Signature:</label>
            <div class="col-sm-9">
            <textarea id="cktext1" name="data[AgencyTemplate][signature]"><?php echo @$emailtemplate['AgencyTemplate']['signature']?></textarea>
            </div>
            </div>

            <div class="form-group">
            <label class="control-label col-sm-3" for="email">&nbsp;</label>
            <div class="col-sm-9">
            <input class="restore-default" onclick="InsertText1();" type="button" value="Restore Default">
            <input type="button" value="Merge Fields" class="btn btn-primary" data-toggle="modal" data-target="#sgnature-model">
            </div>
            </div>


            <div class="modal fade" id="sgnature-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Click Insert button to mearge field</h4>
                  </div>
                  <div class="modal-body">
                      <?php $fields=explode(',',@$defaultemplate['DefaultTemplate']['mergefields'])?>
                      <table>
                        <?php foreach ($fields as $key => $value) { ?>
                             <tr><td><?php echo $value?></td><td style="margin-left:100px">
                             <input type="button" value="Insert" class="insbtn">
                             </td></tr>
                        <?php }?>
                      </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>



            <div class="form-group">
            <label class="control-label col-sm-3" for="email">&nbsp;</label>
            <div class="col-sm-9">
            <button type="submit" class="submit btn btn-primary">Submit</button>
            </div>
            </div>


           
           <textarea cols="100" id="txtArea" rows="3" style="display:none;" name="data[DefaultTemplate][content]"><?php echo @$defaultemplate['DefaultTemplate']['content']?></textarea>
           <textarea cols="100" id="dfltsign" rows="3" style="display:none;" name="data[DefaultTemplate][signature]"><?php echo @$defaultemplate['DefaultTemplate']['signature']?></textarea> 

</textarea>
     
      </form>
      </div> 

















<script>
$('document').ready(function(){
    $('#signuplink').click(function() {
    if( $(this).is(':checked')) {
        $("#signupurl").show();
    } else {
        $("#signupurl").hide();
    }
}); 
});
</script>
<script type="text/javascript">
        var client = new ZeroClipboard(document.getElementById("btn-To-Copy"));
        client.on("ready", function (readyEvent) {
            client.on("aftercopy", function (event) {
           });
        });
</script>
<script>
     $(document).ready(function(){
        $("#mergfields").click(function(){
          $("#mrgArea").show();
          
        });
        $("#mergfieldsdflt").click(function(){
          $("#mrgAreadflt").show();
          
        });
         var validator = $("#register-emailNotification").validate(
            {
              ignore: [],
              rules: { 
                    "data['AgencyTemplate']['emailcontent']":{
                            required: function() 
                            {
                                CKEDITOR.instances.cktext.updateElement();
                                
                            }
                          
                    },
                    "data[AgencyTemplate][signature]":{
                            required: function() 
                            {
                                CKEDITOR.instances.cktext1.updateElement();
                                
                            }
                          
                    },
                    "data[AgencyTemplate][emailsubject]":{
                            required:true
                        },
                    "data[AgencyTemplate][sendername]":{
                            required:true
                        },
                    "data[AgencyTemplate][senderemail]":{
                            required:true,
                            email:true
                        }     
                },
                messages:
                    {

                    "data['AgencyTemplate']['emailcontent']":{
                        required:"This is required field",
                    },
                    "data['AgencyTemplate']['signature']":{
                        required:"This is required field",
                    },
                    "data[AgencyTemplate][emailsubject]":{
                           required:"This is required field.",
                        },
                    "data[AgencyTemplate][sendername]":{
                            required:"This is required field.",
                        },
                    "data[AgencyTemplate][senderemail]":{
                            required:"This is required field.",
                            email:"Please enter valid email.",
                        }      
                },
                errorPlacement: function(error, $elem) {
                    if ($elem.is('textarea')) {
                        $elem.next().css('border', '1px solid red');
                        error.insertAfter($elem.next());
                        CKEDITOR.instances.cktext.focus();
                    }else{
                         error.insertAfter($elem); 
                    }
                },
            }); 
        validator.focusInvalid = function() {
            if( this.settings.focusInvalid ) {
                try {
                    var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
                    if (toFocus.is("textarea")) {
                         if(CKEDITOR.instances.cktext.getData()==''){
                            CKEDITOR.instances.cktext.focus();
                         }else{
                            CKEDITOR.instances.cktext1.focus();
                         }
                    } else {
                        toFocus.filter(":visible").focus();
                    }
                } catch(e) {
                }
            }
        }
    });
</script>
<script type="text/javascript">
   window.onload = function()
   {
      CKEDITOR.replace( 'cktext' , {
        resize_enabled: false,
        removeButtons: 'Save,NewPage,Preview,Templates',
        width: '80%'});
      CKEDITOR.replace( 'cktext1', {
        resize_enabled: false,
        removeButtons: 'Save,NewPage,Preview,Templates',
        width: '80%' });

      CKEDITOR.instances.cktext.on('contentDom', function() {
        CKEDITOR.instances.cktext.document.on('keyup', function(event) {
           if(CKEDITOR.instances.cktext.getData()==''){
                $("[for='cktext']").css('display','block');
                $('#cktext').removeClass('valid');
                $('#cktext').addClass('error');
                $('#cktext').next().css('border','1px solid red');
           }else{
                $("[for='cktext']").css('display','none');
                $('#cktext').removeClass('error');
                $('#cktext').addClass('valid');
                $('#cktext').next().css('border','none');
           }
        });
    });

    CKEDITOR.instances.cktext1.on('contentDom', function() {
        CKEDITOR.instances.cktext1.document.on('keyup', function(event) {
           if(CKEDITOR.instances.cktext1.getData()==''){
                $("[for='cktext1']").css('display','block');
                $('#cktext1').removeClass('valid');
                $('#cktext1').addClass('error');
                $('#cktext1').next().css('border','1px solid red');
           }else{
                $("[for='cktext1']").css('display','none');
                $('#cktext1').removeClass('error');
                $('#cktext1').addClass('valid');
                $('#cktext1').next().css('border','none');
           }
        });
    });  
   };
   function InsertText() {
        var editor = CKEDITOR.instances.cktext;
        var value = document.getElementById( 'txtArea' ).value;
         $("[for='cktext']").css('display','none');
                    $('#cktext').removeClass('error');
                    $('#cktext').addClass('valid');
                    $('#cktext').next().css('border','none');
        if ( editor.mode == 'wysiwyg' )
        {
            editor.setData( value );
         
        }
        else
            alert( 'You must be in WYSIWYG mode!' );
    }
    function InsertText1() {
        var editor = CKEDITOR.instances.cktext1;
        var value = document.getElementById('dfltsign').value;
         $("[for='cktext1']").css('display','none');
                    $('#cktext1').removeClass('error');
                    $('#cktext1').addClass('valid');
                    $('#cktext1').next().css('border','none');
        if ( editor.mode == 'wysiwyg' )
        {
            editor.setData( value );
         
        }
        else
            alert( 'You must be in WYSIWYG mode!' );
    }

     $('document').ready(function(){
        $('.insbtn').on('click',function(){
            var value=$(this).parent().prev().html();
            var editor = CKEDITOR.instances.cktext1;
            if ( editor.mode == 'wysiwyg' )
            {
                editor.insertHtml( value );
                 $('.close').click();
               
            }
            else
                alert( 'You must be in WYSIWYG mode!' );
             CKEDITOR.instances.cktext1.focus();
        });
        $('.insbtncon').on('click',function(){
            var value=$(this).parent().prev().html();
            console.log(value);
            var editor = CKEDITOR.instances.cktext;
            if ( editor.mode == 'wysiwyg' )
            {
                editor.insertHtml( value );
                $('.close').click();
                
            }
            else
                alert( 'You must be in WYSIWYG mode!' );
            CKEDITOR.instances.cktext.focus();
        });
    });

</script>

<!--end section-->
                        
          
            </div>
          </div>
         
        </div>
        </div>


   
       <?php echo $this->element('reviewsidebar')?>