<?php 
$controller=$this->params['controller'];
$action=$this->params['action'];
?>
<nav id="subnavbar" class="navbar">
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li <?php if(($controller==='dashboard' && $action==='index')||($controller==='dashboard' && $action==='')||($controller==='dashboard' && $action==='searchBusiness')){?>class="active"<?php }?>><a href="<?php echo HTTP_ROOT?>dashboard">Feedback</a></li>
        <li <?php if($controller==='dashboard' && $action==='manageUser'){?>class="active"<?php }?>><a href="<?php echo HTTP_ROOT?>dashboard/manageUser">Manage Users</a></li>
        <li <?php if(($controller==='agencysiteSettings' && $action==='index')||($controller==='agencysiteSettings' && $action==='')){?>class="active"<?php }?>><a href="<?php echo HTTP_ROOT?>agencysiteSettings">My Site</a></li>
        <li <?php if(($controller==='businesses' && $action==='report') || ($controller==='businesses' && $action==='customerView')){?>class="active"<?php }?>><a href="<?php echo HTTP_ROOT?>businesses/report">Reporting</a></li>
 <li <?php if(($controller==='dashboard' && $action==='admin')){?>class="active"<?php }?>><a href="<?php echo HTTP_ROOT?>dashboard/admin">Admin</a></li>

      




       <li <?php if(($controller==='dashboard' && $action==='training')){?>class="active"<?php }?>><a href="<?php echo HTTP_ROOT?>dashboard/training">Training</a></li>
        <li><a href="#">Visibility</a></li>
      </ul>
    </div>
</nav>

