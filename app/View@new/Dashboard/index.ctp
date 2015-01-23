<?php if(isset($selectedTab)) { ?>
<script type="text/javascript">
   var tab = '<?php echo $selectedTab; ?>';
   jQuery( document ).ready(function() {
      $('#myTab li').removeClass('active');
      $('.tab-pane').removeClass('active');
      $('#'+tab+'-tab').parent().addClass('active');  
      $('#'+tab).addClass('active');   
      $('#'+tab).addClass('in'); 
   });
</script>
<?php } ?>		
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
            <nav id="subnavbar" class="navbar">
               <div id="navbar" class="navbar-collapse collapse">
                  <ul role="tablist" class="nav navbar-nav" id="myTab">
                     <li class="active"  role="presentation"><a aria-expanded="true" aria-controls="feedback" data-toggle="tab" role="tab" id="feedback-tab" href="#feedback">Feedback</a></li>
                     <li role="presentation"><a aria-expanded="true" aria-controls="mysite" data-toggle="tab" role="tab" id="mysite-tab" href="#mysite">My Site</a></li>
                     <li role="presentation"><a  href="<?php echo HTTP_ROOT ?>dashboard/manageUser" id="users-tab">Manage Users</a></li>
                     <li role="presentation"><a aria-expanded="true" aria-controls="reporting" data-toggle="tab" role="tab" id="reporting-tab" href="#reporting">Reporting</a></li>
                     <li role="presentation"><a aria-expanded="true" aria-controls="reporting" data-toggle="tab" role="tab" id="admin-tab" href="#admin">Admin</a></li>
                     <li role="presentation"><a aria-expanded="true" aria-controls="reporting" data-toggle="tab" role="tab" id="training-tab" href="#training">Training</a></li>
                     <li role="presentation"><a aria-expanded="true" aria-controls="reporting" data-toggle="tab" role="tab" id="visibility-tab" href="#visibility">Visibility</a></li>
                  </ul>
               </div>
            </nav>
            <div class="wrapTab">
               <!--						<button type="button" class="btn adNew">Add New Business</button>-->
               <?php echo $this->Html->link(__('Add New Business'), array('controller' => 'businesses','action' => 'add'), array('class' => 'btn adNew')); ?>
               <div class="bodyTaab">
                  <h4>Business Owner</h4>
                  <div class="tab-content" id="myTabContent">
                     <div aria-labelledby="feedback-tab" id="feedback" class="tab-pane fade active in bs-example" role="tabpanel">
                        <!-- business listing -->
                        <?php App::import('Controller', 'Dashboard');
                           $dashboard = new DashboardController; ?>
                        <!-- load dashboard controller to call get reatings method -->
                      
                        <div class="srchBlock">
                           <?php echo $this->Form->create('searchForm', array('url'=>array('controller'=>'dashboard', 'action'=>'searchBusiness'))); ?>
                           <?php
                              echo $this->Form->input('search', array('type'=>'text', 'class' =>'form-control search-field fieldtext', 'placeholder' =>'type and search'));
                              echo $this->Form->input('Search', array('type'=>'submit', 'class' =>'btn btn-success'));
                              echo $this->Form->end(); 
                              ?>    
                        </div>
                        <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Sr. N.</th>
                                 <th><?php echo $this->Paginator->sort('businessname'); ?></th>
                                 <th><?php echo $this->Paginator->sort('AverageRating');?></th>
                                 <th><?php echo $this->Paginator->sort('LastReviewDate');?></th>
                                 <th><?php echo $this->Paginator->sort('LastLogin');?></th>
                                 <th><?php echo $this->Paginator->sort('TotalReview');?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($businesses as $key => $business): ?>  
                              <tr>
                                 <td><?php echo h($key+1); ?></td>
                                 <td><?php echo h($business['Business']['businessname']); ?>&nbsp;</td>
                                 <td>
                                    <!-- get averrage ratings for business -->
                                    <?php echo $dashboard -> averageRatings($business['Business']['id'] ); ?>&nbsp;
                                 </td>
                                 <td>
                                    <!-- get last review date -->
                                    <?php  echo $dashboard -> lastReviewDate($business['Business']['id'] ); ?>&nbsp;
                                 </td>
                                 <td><?php echo h($business['Business']['state']); ?>&nbsp;</td>
                                 <td>
                                    <!-- get total review -->
                                    <?php  echo $dashboard -> totalReviews($business['Business']['id'] ); ?>&nbsp;
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
      <div class="col-sm-2 sidebar-padfix">
         <div class="rating-circle">
            <span>4.21</span>
         </div>
         <div class="sidebar-box">
            <p class="rating-heading">RATING<br>AVERAGE</p>
            <p class="rating-amount">Overall out of 8 total business reviews</p>
         </div>
         <div class="sidebar-box">
            <p class="best-heading">Best Average Rated</p>
            <ol>
               <li>Company A</li>
               <li>Company B</li>
               <li>Company C</li>
            </ol>
            <p class="worst-heading">Worst Averated Rated</p>
            <ol>
               <li>Company D</li>
               <li>Company E</li>
               <li>Company F</li>
            </ol>
         </div>
      </div>
   </div>
</div>
