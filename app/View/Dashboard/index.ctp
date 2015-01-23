<script type="text/javascript">
$(document).ready(function(){
    $('#feedback-search').validate({
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
        <form id="addnewbus" method="post" action="<?php echo HTTP_ROOT;?>businesses/add/addnew">
           <input type="text" name="data[Business][name]" placeholder="+ Add New Business" class="quickfield" />
           <input type="submit" class="btn arrow-submit" value="">
        </form>   
      </div>
      <div class="col-sm-3 nopad-right">
         <input type="text" name="search-biz" placeholder="Search Clients" class="quickfield" />
         <input type="submit" class="btn arrow-submit" value="">
      </div>
      <div class="col-sm-3">
      </div>
   </div>
   <div class="row">
      <div class="col-sm-10">
         <div id="content-wrapper">
             <?php echo $this->element('nav')?>
            <div class="wrapTab">
               <!--						<button type="button" class="btn adNew">Add New Business</button>-->
               <?php /* echo $this->Html->link(__('Add New Business'), array('controller' => 'businesses','action' => 'add'), array('class' => 'btn adNew')); */ ?>
               <div class="bodyTaab">
                  <h4>Business Owner</h4>
                  <div class="tab-content" id="myTabContent">
                     <div aria-labelledby="feedback-tab" id="feedback" class="tab-pane fade active in bs-example" role="tabpanel">
                        <!-- business listing -->
                        <?php App::import('Controller', 'Dashboard');
                           $dashboard = new DashboardController; ?>
                        <!-- load dashboard controller to call get reatings method -->
                      
                        
                        <div class="srchBlock">
                             <form class="form-inline" id="feedback-search" method="post" action="<?php echo HTTP_ROOT?>dashboard/searchBusiness">
                             <form accept-charset="utf-8" method="post" id="searchFormIndexForm" action="<?php echo HTTP_ROOT?>dashboard/searchBusiness">
                             
                               <div class="form-group">
                               <label for="inputPassword2" class="sr-only"> </label>
                               <input type="text" class="form-control fieldtext" id="inputPassword2" placeholder="Type and search" name="data[searchForm][search]">
                   
                               </div>
                               <input type="submit" class="btn btn-success" value="Search"/>
                               <div style="margin-left: 14px;color:#bb0000" class="errorTxt"></div>
                             </form>
                        </div>     
                        <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Sr. N.</th>
                                 <th><?php echo $this->Paginator->sort('Business.businessname','Business Name'); ?></th>
                                 <th><?php echo $this->Paginator->sort('Business.averageRating','AverageRating');?></th>
                                 <th><?php echo $this->Paginator->sort('Business.lastReviewdate','LastReviewDate');?></th>
                                 <th><?php echo $this->Paginator->sort('User.lastlogin','LastLogin');?></th>
                                 <th><?php echo $this->Paginator->sort('Business.totalReviews','TotalReview');?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $k=0; if(!empty($businesses)){ ?>  
                              <?php foreach ($businesses as $key => $business):

                                 // if(!$business['Business']['averageRating']){
                                 //    continue;
                                 // }
                              ?>  

                              <tr>
                                 <td><?php echo h($k+1);$k++; ?></td>
                                 <td><?php echo h($business['Business']['businessname']); ?>&nbsp;</td>
                                 <td>
                                    <!-- get averrage ratings for business -->
                                    <?php
                                         $avgrating=($business['Business']['averageRating'])?number_format((float)$business['Business']['averageRating'], 2, '.', ''):'--' ;
                                         echo $avgrating; 
                                    ?>&nbsp;
                                   
                                 </td>
                                 <td>
                                    <!-- get last review date -->
                                    <?php 
                                     if(!$business['Business']['lastReviewdate']){
                                          $LRdat="No Reviews";
                                      }else{
                                          $Rdate=strtotime($business['Business']['lastReviewdate']);
                                          $LRdat=date('Y-m-d',$Rdate);
                                      } 
                                     
                                    echo $LRdat; ?>&nbsp;
                                 </td>
                                 <?php 
                                    if($business['User']['lastlogin']){
                                        $date=strtotime($business['User']['lastlogin']);
                                        $dat=date('Y-m-d',$date);
                                    }else{
                                         $dat='---' ;
                                    }
                                   
                                 ?>
                                 <td><?php echo h($dat); ?>&nbsp;</td>
                                 <td>
                                    <!-- get total review -->
                                    <?php  
                                        //echo $dashboard -> totalReviews($business['Business']['id'] ); 
                                        echo $business['Business']['totalReviews'];
                                    ?>&nbsp;
                                 </td>
                              </tr>
                              <?php endforeach; ?>
                              <?php }else { ?>
                               <tr><th colspan="6" style="text-align:center;"> <?php echo "No record found.";?></th></td></tr>
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
                        <!-- business list ends -->
                     </div>
                     <div aria-labelledby="mysite-tab" id="mysite" class="tab-pane fade bs-example" role="tabpanel">
                        <p>My site content</p>
                     </div>
                     <div aria-labelledby="users-tab" id="users" class="tab-pane fade bs-example" role="tabpanel">
                        <!-- business users -->
                        <!-- search form -->
                        <?php echo $this->Form->create('searchFormUser', array('url'=>array('controller'=>'dashboard', 'action'=>'searchBusinessUser'))); 
                           echo $this->Form->input('search', array('type'=>'text', 'class' =>'form-control search-field', 'placeholder' =>'type and search'));
                           echo $this->Form->input('Search', array('type'=>'submit', 'class' =>'btn btn-success'));
                           echo $this->Form->end(); 
                           ?>  
                        <table cellpadding="0" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>Sr. N.</th>
                                 <th><?php echo $this->Paginator->sort('businessname'); ?></th>
                                 <th><?php echo $this->Paginator->sort('Category');?></th>
                                 <th><?php echo $this->Paginator->sort('WebAddress');?></th>
                                 <th><?php echo $this->Paginator->sort('RegistrationDate');?></th>
                                 <th><?php echo $this->Paginator->sort('Status');?></th>
                                 <th><?php echo $this->Paginator->sort('AccountType');?></th>
                                 <th class="actions"><?php echo __('Actions'); ?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($businesses as $key => $business): ?>  
                              <tr>
                                 <td><?php echo h($key+1); ?></td>
                                 <td><?php echo h($business['Business']['businessname']); ?>&nbsp;</td>
                                 <td><?php echo $this->Html->link($business['BusinessCategory']['name'], array('controller' => 'business_categories', 'action' => 'view', $business['BusinessCategory']['id'])); ?>&nbsp;</td>
                                 <td><?php echo h($business['Business']['companywebaddress']); ?>&nbsp;</td>
                                 <td><?php echo h($business['Business']['createdat']); ?>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $business['Business']['id'])); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('controller' => 'businesses', 'action' => 'edit', $business['Business']['id'])); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'businesses','action' => 'delete', $business['Business']['id']), array(), __('Are you sure you want to delete # %s?', $business['Business']['id'])); ?>
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
                              ?> 
                        </p>
                        <div class="paging">
                           <?php
                              echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                              echo $this->Paginator->numbers(array('separator' => ''));
                              echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                              ?>
                        </div>
                     </div>
                     <!-- end business users -->		
                     <div aria-labelledby="reporting-tab" id="reporting" class="tab-pane fade bs-example" role="tabpanel">
                        Reportings
                     </div>
                     <div aria-labelledby="admin-tab" id="admin" class="tab-pane fade bs-example" role="tabpanel">
                        Manage admins 
                     </div>
                     <div aria-labelledby="training-tab" id="training" class="tab-pane fade bs-example" role="tabpanel">
                        Manage training 
                     </div>
                     <div aria-labelledby="visibility-tab" id="visibility" class="tab-pane fade bs-example" role="tabpanel">
                        Visibility
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
       <?php echo $this->element('reviewsidebar')?>
   </div>
</div>
