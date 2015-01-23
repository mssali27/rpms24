<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart']}]}"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
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
   <form id="chosebusiness" method="post" action="<?php echo HTTP_ROOT?>businesses/report">
	 	
	 	<div class="show-report">
   		<label>Show Report:</label>	 	
	 	<select onchange="this.form.submit()" name="data[Business][id]">
	 		<option value="">All Business</option>
	 		<?php foreach ($allbusiness as $key => $value) { ?>
	 		     <option value="<?php echo $value['Business']['id']?>" 
	 		     <?php if($value['Business']['id']==@$selectedId){?>selected="selected"<?php } ?>><?php echo $value['Business']['businessname'];?></option>
	 		<?php }?>
	 	</select>
	 	</div>


 	</form>
 </div>  
 <div id="ex0"></div>
 <div id="piechart" style="height: 300px;"></div>
<?php
$totalReview=$onestar+$twostar+$threestar+$fourstar+$fivestar;
$ratingData = array(
        '0' => array('Element','Number Of Customers'),
        '1' => array('One Star', $onestar),
        '2' => array('Two Star', $twostar),
        '3' => array('Three Star',$threestar),
        '4' => array('Four Star', $fourstar),
        '5' => array('Five Star', $fivestar)
);
$feedbackData=array();
if($success){
  $feedbackData = array(
        '0' => array('Feedback Customers','Number Of Customers'),
        '1' => array('Feedback', $success),
        '2' => array('No Feedback Customers Yet', $notFeed));

}else{
  $feedbackData = array(
        '0' => array('Feedback Customers','Number Of Customers'),
        '1' => array('Feedback', 0),
        '2' => array('No Feedback Customers Yet', 1));
        
}


?>

 <div class="apped">
    <?php if($totalReview==0)$totalReview=1;?>

 	<table class="report-table">	
 	   <tr><td></td><td>1 Star</td><td>2 Star</td><td>3 Star</td><td>4 Star</td><td>5 Star</td></tr>
 	   <tr><td>Reviews:</td><td><?php echo $onestar?></td><td><?php echo $twostar?></td><td><?php echo $threestar?></td><td><?php echo $fourstar?></td><td><?php echo $fivestar?></td></tr>
 	   <tr><td>Percentage:</td><td><?php echo number_format((float)(($onestar/$totalReview)*100), 2, '.', '').'%'?></td><td><?php echo number_format((float)(($twostar/$totalReview)*100), 2, '.', '').'%'?></td><td><?php echo number_format((float)(($threestar/$totalReview)*100), 2, '.', '').'%'?></td><td><?php echo number_format((float)(($fourstar/$totalReview)*100), 2, '.', '').'%'?></td><td><?php echo number_format((float)(($fivestar/$totalReview)*100), 2, '.', '').'%'?></td></tr>
 	</table>

</div>
<div class="wrapTab">
            <div class="bodyTaab">
            <h2 class="reviews-heading">Reviews</h2>
            <div class="srchBlock2">
              <form method="post" id="search-reviews" class="form-inline" action="<?php echo HTTP_ROOT?>businesses/report">
                <input type="hidden" name="data[Business][id]" value="<?php echo @$selectedId;?>">
                <div class="form-group mm">
                <label class="sr-only"> </label>
                <p class="form-control-static">Search:</p>
                </div>
                <div class="form-group kk">
                <label class="sr-only" for="inputPassword2"> </label>
                <input type="text" name="data[searchForm][search]" placeholder="Search by firstname,lastname or business name" id="searchname" class="form-control fieldtext">
    
                </div>
                <input type="submit" value="Search" class="serasubmit btn btn-primary">
                <div class="errorTxt" style="margin-left: 59px;color:#bb0000"></div>
              </form>
              <form method="post" id="filterBy" class="form-inline" action="<?php echo HTTP_ROOT?>businesses/report">
              <input type="hidden" name="data[Business][id]" value="<?php echo @$selectedId;?>">
	              <div class="ctp-header">
					  <h1 class="report-heading">Filter By</h1>
					  <label>
					    <input type="checkbox" class="radio" value="1" name="data[BusinessReview][starrating]" <?php if(@$rating==1){ ?>checked="checked"<?php } ?>/><span>One Star</span></label>
					  <label>
					    <input type="checkbox" class="radio" value="2" name="data[BusinessReview][starrating]" <?php if(@$rating==2){ ?>checked="checked"<?php } ?> /><span>Two Star</span></label>
					  <label>
					    <input type="checkbox" class="radio" value="3" name="data[BusinessReview][starrating]" <?php if(@$rating==3){ ?>checked="checked"<?php } ?> /><span>Three Star<span></label>
            <label>
              <input type="checkbox" class="radio" value="4" name="data[BusinessReview][starrating]" <?php if(@$rating==4){ ?>checked="checked"<?php } ?> /><span>Four Star</span></label>
            <label>
              <input type="checkbox" class="radio" value="5" name="data[BusinessReview][starrating]" <?php if(@$rating==5){ ?>checked="checked"<?php } ?> /><span>Five Star</span></label>  
					</div>
			</form>
            </div>
            <div data-example-id="bordered-table " class="bs-example">
              <table class="table table-bordered table-striped">
	                <thead class="tbleHead">
	                <tr>
		                  <th>Sr. N.</th>
		                  <th><?php echo $this->Paginator->sort('Customer.firstname','First Name'); ?></th>
		                  <th><?php echo $this->Paginator->sort('Customer.firstname','Last Name'); ?></th>
		                  <th><?php echo $this->Paginator->sort('BusinessReview.ratingdate','Feedback Date'); ?></a></th>
		                  <th><?php echo $this->Paginator->sort('Customer.phonenumber','Phone'); ?></th>
		                  <th><?php echo $this->Paginator->sort('Customer.email','Email'); ?></th>
		                  <th><?php echo $this->Paginator->sort('Business.businessname','Employee'); ?></th>
		                  <th><?php echo $this->Paginator->sort('BusinessReview.ratingstar','Rating'); ?></th>
		                  <th>Action</th>                  
	                </tr>
	                </thead>
	                <tbody>
	                <?php if(!empty($customersReviews)){?>
	                <?php foreach ($customersReviews as $key => $review) {?>
	               		<tr>
	                    	<td><?php echo h($key+1); ?></td>
	                    	<td><?php echo $review['Customer']['firstname']; ?></td>
	                    	<td><?php echo $review['Customer']['lastname']; ?></td>
	                    	<td>
	                    		<?php 
	                    			$date = strtotime($review['BusinessReview']['ratingdate']);
                                    $dat = date('Y-m-d', $date);
                                    $tme = date('H:m:s A',$date);
                                    echo $dat;
	                    		?>
	                    	</td>
	                    	<td><?php echo $review['Customer']['phonenumber']; ?></td>
	                    	<td><?php echo $review['Customer']['email']; ?></td>
	                    	<td><?php echo $review['Business']['businessname']; ?></td>
	                    	<td>
	                    	<?php 
	                    	    for($i=1;$i<=5;$i++){ 
	                    	?>   	
	                    	      <?php if($i<=$review['BusinessReview']['ratingstar']){ ?>
	                    	        <img src="<?php echo HTTP_ROOT?>/img/star.png">
	                    	      <?php } else {?>
	                    	         <img src="<?php echo HTTP_ROOT?>img/small.png">
	                    	      <?php }?>
	                    	   	
	                    	<?php }?>
	                    		
	                    	   
	                    	</td>
	                    	<td><a href="<?php echo HTTP_ROOT.'businesses/customerView/'.$review['BusinessReview']['id']?>">View</a></td>
	                  	</tr>
	                <?php } ?>  	
	                <?php } else{?>  	
	                	<tr><th colspan="9" style="text-align:center;"> <?php echo "No record found.";?></th></td></tr>
	                <?php }?>
	                </tbody>
              </table>
               <?php //if(count($customersReviews)>0){?>
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
                <?php //}?>  
               
			</div>  
        </div>    
        </div>   
        </div>
        </div>       
        <?php echo $this->element('reviewsidebar')?>  
      </div>
     </div> 
  <script type="text/javascript">
$(document).ready(function(){
    $('#search-reviews').validate({
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
<script>
    google.load('visualization', '1', {packages: ['corechart']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(<?php echo json_encode($ratingData) ?>);

      var options = {
        width: 600,
        height:300,
        hAxis: {
          title: 'Rating',
          gridlines: {count: 5}
        },
        vAxis: {
          title: 'Customers (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('ex0'));

      chart.draw(data, options);
    }
  
</script>
 
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo json_encode($feedbackData) ?>);

        var options = {
          title: 'Customers Feedback Success'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
<script type="text/javascript">
	$("input:checkbox").on('click', function() {
		 $('#filterBy').submit();  
  		// var $box = $(this);
 	  //   if ($box.is(":checked")) {
    // 		var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // 		$(group).prop("checked", false);
		  //   $box.prop("checked", true);

		  // } else {
		  //   $box.prop("checked", false);
		  // }

		});
</script>
  