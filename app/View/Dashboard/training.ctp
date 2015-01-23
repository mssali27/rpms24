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
      
            <?php if(count($trainings)>0):?>
                <?php foreach ($trainings as $_training):?>
		
		<div class="row">

			<h2> <?php echo $_training['Training']['title'];?></h2>
                  <?php if(!empty($_training['Training']['url'])):?>
                  
                  <iframe style="width:100%;height:500px"  src="//<?php echo $_training['Training']['url'];?>" frameborder="0"rel=0  allowfullscreen></iframe>
                    <?php else:?>
                           <?php if(!empty($_training['Training']['url']));?>
                	   <?php endif;?>

		</div>
                    <?php endforeach;?>
                <?php else:?>
                    There are no Video available right now.
                <?php endif;?>
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
