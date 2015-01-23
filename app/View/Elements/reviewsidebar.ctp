<?php
//pr($businessesdata);die;
 $count=0;$overallRat=0;$compnyrating=array();$i=0;
 foreach ($businessesdata as $key => $business){
   if(!$business['Business']['averageRating']){
         $overallRat=$overallRat+0;
         $rat=0;
   } else{
         $overallRat=$overallRat+$business['Business']['averageRating'];
          $rat=$business['Business']['averageRating'];
          $count++;
   }
   $compnyrating[$i]['name']=$business['Business']['businessname'];
   $compnyrating[$i]['averageRatings']=$rat;
   $i++;
  
  }
?>
<div class="col-sm-2 sidebar-padfix">
         <div class="rating-circle">
            <?php 

              $ratings=array();
              foreach($compnyrating as $key=>$value){
                  $ratings[$key]=$value['averageRatings'];
              }
              array_multisort($ratings, SORT_DESC, $compnyrating);
            ?>
             <?php if($count>0){?>
            <span><?php echo number_format((float)$overallRat/$count, 2, '.', '');?></span>
            <?php } else {?>
               <span><?php echo number_format((float)0, 2, '.', '');?></span>
            <?php }?>
         </div>
         <div class="sidebar-box">
            <p class="rating-heading">RATING<br>AVERAGE</p>
            <p class="rating-amount"><?php echo "Overall out of $count total business reviews" ?></p>
         </div>
         <div class="sidebar-box">
            <p class="best-heading">Best Average Rated</p>
            <ol>
              <?php if(!empty($compnyrating)){?>
               <?php for($j=0;$j<3;$j++){?>
               <?php if(isset($compnyrating[$j])){?>
                  <li><?php
                          echo $compnyrating[$j]['name']
                   ?></li>
               <?php }?>
               <?php }?>
             <?php }?> 
            </ol>
            <?php array_multisort($ratings, SORT_ASC, $compnyrating);?>
            <p class="worst-heading">Worst Average Rated</p>
            <ol>
               <?php if(!empty($compnyrating)){?>
                <?php for($j=0;$j<3;$j++){?>
                <?php if(isset($compnyrating[$j])){?>
                  <li><?php echo $compnyrating[$j]['name']?></li>
               <?php }?>
               <?php }?>
               <?php }?>
            </ol>
         </div>
      </div>