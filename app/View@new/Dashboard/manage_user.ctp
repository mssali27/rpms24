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
                  <ul class="nav navbar-nav">
                    <li ><a href="<?php echo HTTP_ROOT?>dashboard/index">Feedback</a></li>
                    <li><a href="#">My Site</a></li>
                    <li class="active"><a href="#">Manage Users</a></li>
                    <li><a href="#">Reporting</a></li>
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">Training</a></li>
                    <li><a href="#">Visibility</a></li>
                  </ul>
                </div>
              </nav>
              <div class="wrapTab">
           
            <a href="<?php echo HTTP_ROOT?>businesses/add" class="btn adNew">Add New Business</a>
             
            <div class="bodyTaab">
            <h4>Business Owner</h4>

            <div class="srchBlock">
              <form class="form-inline">
                <div class="form-group">
                <label class="sr-only"> </label>
                <p class="form-control-static"><strong>Search:</strong></p>
                </div>
                <div class="form-group">
                <label for="inputPassword2" class="sr-only"> </label>
                <input type="text" class="form-control fieldtext" id="inputPassword2" placeholder="type and search here">
                </div>
                <button type="button" class="btn btn-success">Search</button>
              </form>
            </div>
            <div class="bs-example" data-example-id="bordered-table ">
              <table class="table table-bordered table-striped">
                <thead class="tbleHead">
                <tr>
                  <th><?php echo $this->Paginator->sort('Sr.N.'); ?></th>
                  <th><?php echo $this->Paginator->sort('Business Name'); ?> </th>
                  <th><?php echo $this->Paginator->sort('Category'); ?></th>
                  <th><?php echo $this->Paginator->sort('Web Address'); ?></th>
                  <th><?php echo $this->Paginator->sort('Registration Date'); ?> </th>
                  <th><?php echo $this->Paginator->sort('Status'); ?></th>
                   <th><?php echo $this->Paginator->sort('Account Type'); ?></th>
                    <th><?php echo $this->Paginator->sort('Action'); ?></th>
                  
                </tr>
                </thead>
                <tbody>
                 <?php foreach ($businesses as $key => $business): ?> 
               <tr>
                             <th scope="row"><?php echo h($key+1); ?></th>
                              <td><?php echo h($business['Business']['businessname']); ?>&nbsp;</td>
                              <td><?php echo $this->Html->link($business['BusinessCategory']['name'], array('controller' => 'business_categories', 'action' => 'view', $business['BusinessCategory']['id'])); ?>&nbsp;</td>
                              <td><?php echo h($business['Business']['companywebaddress']); ?>&nbsp;</td>
                              <td><?php echo h($business['Business']['createdat']); ?>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><img src="<?php echo HTTP_ROOT?>img/green_dots.png" width="25" height="11"></td>
                             <td><div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                  Action
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Password</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Resend Credentials</a></li>
                                 <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Manage</a></li>
                                </ul>
                              </div>
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