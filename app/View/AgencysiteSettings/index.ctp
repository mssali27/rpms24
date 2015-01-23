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
                  <!-- mysite content section start-->           
                    <?php echo $this->Html->script('colorpicker/js/colpick.js'); ?>
<?php echo $this->Html->css('colorpicker/css/colpick.css'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#mysite').validate({
           event:'blur',
            rules:
            {
                
                "data[AgencysiteSetting][addressline1]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][country_id]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][state_id]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][city_id]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][zip]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][phone]":
                {
                    required:true,
                    number:true,
                },
                "data[AgencysiteSetting][sitetitle]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][siteheadcolor]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][sitebarcolor]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][companywebaddress]":
                {
                    required:true,
                    url:true,
                },
                 "data[AgencysiteSetting][siteheadcolor]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][sitebarcolor]":
                {
                    required:true,
                },
                "data[AgencysiteSetting][sitebackgroundcolor]":
                {
                    required:true,
                }
                
            },
            messages:
            {
                "data[AgencysiteSetting][agencyname]":
                {
                    required:'This field is required.',
                },
                "data[AgencysiteSetting][addressline1]":
                {
                    required:'This field is required.',
                },
                "data[AgencysiteSetting][country_id]":
                {
                    required:'This field is required.',
                },
                "data[AgencysiteSetting][city_id]":
                {
                    required:'This field is required.',
                },
                "data[AgencysiteSetting][zip]":
                {
                    required:'This field is required.',
                },
                "data[AgencysiteSetting][phone]":
                {
                    required:'This field is required.',
                    number:'Please enter a valid number.',
                },
                "data[AgencysiteSetting][sitetitle]":
                {
                    required:'This field is required.',
                },
                "data[AgencysiteSetting][siteheadcolor]":
                {
                    required:'This field is required.',
                },
                "data[AgencysiteSetting][sitebarcolor]":
                {
                    required:'This field is required.',
                },
                "data[AgencysiteSetting][companywebaddress]":
                {
                    required:'This field is required.',
                    url:'Please enter a valid url.',
                },
                "data[AgencysiteSetting][siteheadcolor]":
                {
                   required:'This field is required.',
                },
                 "data[AgencysiteSetting][sitebarcolor]":
                {
                   required:'This field is required.',
                },
                "data[AgencysiteSetting][sitebackgroundcolor]":
                {
                    required:'This field is required.',
                }
            }
        
        
        });
        
    
    });
</script>
 <script type="text/javascript">
 $('document').ready(function(){
   $('#SiteheadColor').colpick({
    layout:'hex',
    submit:0,
    colorScheme:'dark',
    color:"<?php echo @$setting['AgencysiteSetting']['siteheadcolor']?>",
    onChange:function(hsb,hex,rgb,el,bySetColor) {
        $(el).css('border-color','#'+hex);
        if(!bySetColor){
            $(el).val(hex);
        } 
    }
    }).keyup(function(){
        $(this).colpickSetColor(this.value);
    });
    $('#SitebarColor').colpick({
    layout:'hex',
    submit:0,
    colorScheme:'dark',
    color:"<?php echo @$setting['AgencysiteSetting']['sitebarcolor']?>",
    onChange:function(hsb,hex,rgb,el,bySetColor) {
        $(el).css('border-color','#'+hex);
        if(!bySetColor){
            $(el).val(hex);
        } 
    }
    }).keyup(function(){
        $(this).colpickSetColor(this.value);
    });
    $('#SitebackgroundColor').colpick({
    layout:'hex',
    submit:0,
    colorScheme:'dark',
    color:"<?php echo @$setting['AgencysiteSetting']['sitebackgroundcolor']?>",
    onChange:function(hsb,hex,rgb,el,bySetColor) {
        $(el).css('border-color','#'+hex);
        if(!bySetColor){
            $(el).val(hex);
        } 
    }
    }).keyup(function(){
        $(this).colpickSetColor(this.value);
    });
 });
</script>

<div class="businesses" id="my-site">

<form accept-charset="utf-8" method="post" enctype= "multipart/form-data" id="mysite" action="<?php echo HTTP_ROOT?>agencysiteSettings/index">
<input type="hidden" name="data[AgencysiteSetting][id]" value="<?php echo @$setting['AgencysiteSetting']['id']?>">
    <h1 class="account-heading">Agency Site Setting</h1>

    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Site Title:</label>
    <div class="col-sm-9">
    <input class="form-control account-back" type="text" maxlength="20" id="SiteTitle" name="data[AgencysiteSetting][sitetitle]" value="<?php echo @$setting['AgencysiteSetting']['sitetitle']?>">
    </div>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Site Header Color:</label>
    <div class="col-sm-9">
    <input class="form-control account-back" type="text" maxlength="20" id="SiteheadColor" name="data[AgencysiteSetting][siteheadcolor]" value="<?php echo @$setting['AgencysiteSetting']['siteheadcolor']?>">
    </div>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Site Bar Color:</label>
    <div class="col-sm-9">
    <input class="form-control account-back" type="text" maxlength="20" id="SitebarColor" name="data[AgencysiteSetting][sitebarcolor]" value="<?php echo @$setting['AgencysiteSetting']['sitebarcolor']?>">
    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Site Background Color:</label>
    <div class="col-sm-9">
    <input class="form-control account-back" type="text" maxlength="20" id="SitebackgroundColor" name="data[AgencysiteSetting][sitebackgroundcolor]" value="<?php echo @$setting['AgencysiteSetting']['sitebackgroundcolor']?>">
    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Site Background Image:</label>
    <div class="col-sm-9">

    <div class="fileUpload btn">
    <span>Upload</span>
    <input type="file" class="upload" id="SitebackgroundImage" name="data[AgencysiteSetting][sitebackgroundimageurl]">
    </div>    


    <!-- <input type="file" id="SitebackgroundImage" name="data[AgencysiteSetting][sitebackgroundimageurl]"> -->
    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Background Image:</label>
    <div class="col-sm-9">
    <?php if(isset($setting['AgencysiteSetting']['sitebackgroundimageurl'])){?><img src="<?php echo HTTP_ROOT;?>/img/agencylogo/medium/<?php echo @$setting['AgencysiteSetting']['sitebackgroundimageurl'] ?>" style="width:20%;height:100px;float:left"/><?php }?>
   <input type="hidden" id="background" name="data[Agency][background]" value="<?php echo @$setting['AgencysiteSetting']['sitebackgroundimageurl']?>">
   </div>
   </div>



   <div class="form-group">
   <label class="control-label col-sm-3" for="email">Favicon Icon:</label>
   <div class="col-sm-9">

    <div class="fileUpload btn">
    <span>Upload</span>
    <input type="file" id="favicon" name="data[AgencysiteSetting][faviconimageurl]" value="<?php echo @$setting['AgencysiteSetting']['faviconimageurl']?>" class="upload">
    </div>

   <?php /* <input type="file" id="favicon" name="data[AgencysiteSetting][faviconimageurl]" value="<?php echo @$setting['AgencysiteSetting']['faviconimageurl']?>"> */?>
   </div>
   </div>



   <div class="form-group">
   <label class="control-label col-sm-3" for="email">Icon Image:</label>
   <div class="col-sm-9">
   <?php if(isset($setting['AgencysiteSetting']['faviconimageurl'])){?><img src="<?php echo HTTP_ROOT;?>img/agencylogo/<?php echo @$setting['AgencysiteSetting']['faviconimageurl'] ?>" style="float:left"/><?php }?>
     <input type="hidden" id="favicon" name="data[Agency][favicon]" value="<?php echo @$setting['AgencysiteSetting']['faviconimageurl']?>">
    </div>
    </div>



  <?php /* Effective Date:<input type="text" maxlength="20" id="EffectiveDate" name="data[AgencysiteSetting][effectivedate]" value="<?php echo @$setting['AgencysiteSetting']['effectivedate']?>"></br>
   Termination Date:<input type="text" maxlength="20" id="TerminationDate" name="data[AgencysiteSetting][terminationdate]" value="<?php echo @$setting['AgencysiteSetting']['terminationdate']?>"></br> */ ?>
   

   <div class="form-group">
   <label class="control-label col-sm-3" for="email">Setting Description:</label>
   <div class="col-sm-9">
    <textarea class="setting-desription" id="SettingDescription" name="data[AgencysiteSetting][settingsdescription]"><?php echo @$setting['AgencysiteSetting']['settingsdescription']?></textarea>
   </div>
   </div>

    <div class="form-group">
    <label class="control-label col-sm-3" for="email">&nbsp;</label>  
    <div class="col-sm-9 submitting"> 
        <input type="submit" class="submit btn btn-primary" value="Submit">
     </div> 
    </div>

</form>


                  <!-- end mysite content -->

                       
          
              </div>
            </div>
          </div>
         
        </div> 
</div>

<?php echo $this->element('reviewsidebar')?>
     