<script type="text/javascript">
$(document).ready(function(){
    $('#manage-search').validate({
         rules:
            {
               "data[searchForm][search]":
                {
                    required:true,
                }   
            },
         messages:
            {   
               "data[searchForm][search]":
                {
                    required:"This is required field.",
                }    
            },
             messages: {},
             errorElement : 'div',
             errorLabelContainer: '.errorTxt'  
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
           
            <a href="<?php echo HTTP_ROOT?>businesses/add" class="btn adNew">Add New Business</a>
             
            <div class="bodyTaab">
            <h4>Business Owner</h4>

            <div class="srchBlock">
              <form class="form-inline" id="manage-search" method="post" action="<?php echo HTTP_ROOT?>dashboard/manageUser">
              <form accept-charset="utf-8" method="post" id="searchFormIndexForm" action="<?php echo HTTP_ROOT?>dashboard/searchBusiness">
                <div class="form-group">
                <label class="sr-only"> </label>
                <p class="form-control-static"><strong>Search:</strong></p>
                </div>
                <div class="form-group">
                <label for="inputPassword2" class="sr-only"> </label>
                <input type="text" class="form-control fieldtext" id="inputPassword2" placeholder="Type name or category" name="data[searchForm][search]">
    
                </div>
                <input type="submit" class="btn btn-success" value="Search"/>
                <div style="margin-left: 59px;color:#bb0000" class="errorTxt"></div>
              </form>
            </div>
            <div class="bs-example" data-example-id="bordered-table ">
              <table class="table table-bordered table-striped">
                <thead class="tbleHead">
                <tr>
                  <th>Sr. N.</th>
                  <th><?php echo $this->Paginator->sort('businessname','Business Name'); ?></th>
                  <th><?php echo $this->Paginator->sort('BusinessCategory.name','Category'); ?></th>
                  <th><?php echo $this->Paginator->sort('Business.companywebaddress','Web Address');  ?></th>
                  <th><?php echo $this->Paginator->sort('createdat','Registration Date'); ?> </th>
                  <th><?php echo $this->Paginator->sort('Business.status','Status');  ?></th>
                  <th><?php echo $this->Paginator->sort('Business.account_type','Acount Type'); ?></th>
                  <th><?php echo 'Action'; ?></th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php App::import('Controller', 'Dashboard');
                           $dashboard = new DashboardController; ?>
                          
                 <?php if(!empty($businesses)){ ?>  
                 <?php foreach ($businesses as $key => $business): ?> 
               <tr>
                             <td><?php echo h($key+1); ?></td>
                              <td><?php echo h($business['Business']['businessname']); ?>&nbsp;</td>
                              <td><?php echo $this->Html->link($business['BusinessCategory']['name'], array('controller' => 'business_categories', 'action' => 'view', $business['BusinessCategory']['id'])); ?>&nbsp;</td>
                              <td><?php echo h($business['Business']['companywebaddress']); ?>&nbsp;</td>
                              <?php 
                                    $date = strtotime($business['Business']['createdat']);
                                   
                                    $dat = date('Y-m-d', $date);
                                    $tme = date('H:m:s A',$date);
                              ?>
                              <td><?php echo h($dat); ?>&nbsp;</td>
                              <td>
                              <?php if($business['Business']['status']){?>
                              <img src="<?php echo HTTP_ROOT?>img/green_dots.png" width="25" height="11">
                              <?php } else {?>
                               <img src="<?php echo HTTP_ROOT?>img/red-dots.png" width="25" height="11">

                              <?php } ?>
                              </td>
                              <td>paid</td>
                             <td><div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                  Action
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo HTTP_ROOT.'businesses/updateBusiness/'.base64_encode($business['Business']['id'])?>">Edit</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo HTTP_ROOT.'businesses/resetPassword/'.base64_encode($business['Business']['user_Id'])?>">Password</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" 
                                  onclick="if(!confirm('Do you want to delete this record?')){return false;}" title="Delete" href="<?php echo HTTP_ROOT.'businesses/deleteBusiness/'.base64_encode($business['Business']['id']).'/'.base64_encode($business['Business']['user_Id'])?>">Delete</a></li>
<li role="presentation"><a role="menuitem" tabindex="-1" onclick="if(!confirm('Do you want to resend the new password and user name?')){return false;}" title="Delete" href="<?php echo HTTP_ROOT.'businesses/resendCredentail/'.base64_encode($business['Business']['user_Id'])?>">Resend Credentials</a></li>
                                 <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo HTTP_ROOT.'businesses/businessDashboard/'.base64_encode($business['Business']['user_Id'])?>">Manage</a></li>
                                </ul>
                              </div>
                            </td>
                            
                  </tr>
               
                
                 <?php endforeach; ?>
                 <?php } else {?>
                   <tr><th colspan="8" style="text-align:center;"> <?php echo "No record found.";?></th></td></tr>
                 <?php } ?>
                </tbody>
              </table>

              <?php if(!empty($businesses)){ ?>
               <p>
                           <?php
                              echo $this->Paginator->counter(array(
                              'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                              ));
                              ?> 
                        </p>
                        <div class="paging">
                           <?php
                              echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                              echo $this->Paginator->numbers(array('separator' => ''));
                              echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                              ?>
                        </div>
                <?php }?>        
              </div> 
            </div>             
          
              </div>
            </div>
          </div>
          <?php echo $this->element('reviewsidebar')?>
        </div>
      </div>