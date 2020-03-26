<!-- Start #header -->
<div id="header">
  <div class=container-fluid>
    <div class=navbar>
      <div class="navbar-header">
        <a class="navbar-brand" href=HOME/_rdr.php?idm=03b9dccb9f840822af6d4768c8194697&&dis-03b9dccb9f840822af6d4768c819469703b9dccb9f840822af6d4768c8194697>
          <!-- <i class="im-stack text-logo-element animated bounceIn"></i> -->
          <img style="margin: 5px 5px 10px 20px;" width="30" height="30" src=assets/img/ico/ico3.png>
            <span class=text-logo style="-webkit-text-stroke: 1px black; -webkit-text-stroke-width: 2px; color: white; text-shadow: 2px 2px 0 rgb(118, 131, 153);}">
              GKMS</span>
            <span class=text-slogan></span></a></div>
              <nav class=top-nav role=navigation>
                <ul class="nav navbar-nav pull-left">
                  <!-- <li id="toggle-sidebar-li"><a href=# id="toggle-sidebar"><i class=en-arrow-left2></i></a></li> -->
                  <li><a href=# class=full-screen><i class=fa-fullscreen></i></a></li>                  
                  <li><a href=# id="toggle-header-area"><i class=ec-download></i></a></li>         
                </ul>
                <ul class="nav navbar-nav pull-right">
                      <?php if($key=='666') { ?>
                      <li class=dropdown><a href=# data-toggle=dropdown><i class=ec-cog></i></a>
                        <ul class=dropdown-menu role=menu>
				          <li><a href=_manageKpi.php><i class=st-meter></i> Manage KPI </a></li>
                          <li><a href=_addEmp.php><i class=en-user-add></i> Manage Employees </a></li>
<!--                          <li><a href=_addUsers.php><i class=en-user-add></i> Manage Users </a></li>-->
                          
                          <li><a href=_addUnit.php><i class=en-feather></i> Manage Unit </a></li>
                          <li><a href=_addJob.php><i class=fa-user></i> Manage Job Title </a></li>
                          <li><a href=_addSection.php><i class=fa-group></i> Manage Section  </a></li>
                          <li><a href=_addDep.php><i class=st-users></i> Manage Department </a></li>
                          <li><a href=_addDiv.php><i class=st-meter></i> Manage Division </a></li>
                          <li><a href=#><i class=im-coin></i> Manage BOD </a></li>
                          <li><a href=_logUsers.php><i class=st-folder></i> Log </a></li>
                        </ul>
                      </li><?php } else {} ?>                
                  <li class=dropdown>                  
                    <a href=# data-toggle=dropdown>
                      <img class=user-avatar src=assets/img/avatars/pp4.png>
                      <?PHP echo $fname; ?> <?PHP echo $lname; ?>
                    </a>
                    <ul class="dropdown-menu right" role=menu>
                      <!--<li><a href=profile.php><i class=st-user></i> Profile</a></li>-->
                      <li><a href=profile.php><i class=st-settings></i> Setting</a></li>
                      <li><a href=index.php?&&online=0&&user=<?PHP echo $np; ?>&&msg=201><i class=im-exit></i> Logout</a></li>
                      <!--<li><a href=../../index.php?idm=03b9dccb9f840822af6d4768c8194697&&dis=03b9dccb9f840822af6d4768c819469703b9dccb9f840822af6d4768c8194697&&online=0&&user=<?PHP echo $nopeg; ?>><i class=im-exit></i> Logout</a></li>-->
                    </ul>
                  </li>
                  <?PHP list($offline)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users where online='1'")); ?>    
                  <li id="toggle-right-sidebar-li"><a href=# id="toggle-right-sidebar"><i class="ec-users"></i> <span class="notification"><?PHP echo $offline; ?></span></a></li>
                </ul>
              </nav>
    </div>
	
    <!-- Start #header-area -->
	
    <div id="header-area" class="fadeInDown">
      <div class="header-area-inner">
        <ul class="list-unstyled list-inline">
          <li><div class=shortcut-button><a href=_dashCo.php><img src="assets/img/ico/11.png" width="60" height="60" style="margin-bottom:15px;"> <span>DASHBOARD</span></a></div></li>
          <li><div class=shortcut-button><a href=# data-toggle=modal data-target=#myModal3><img src="assets/img/ico/12.png" width="60" height="60" style="margin-bottom:15px;"> <span>SCORECARD</span></a></div></li>
          <li><div class=shortcut-button><a href=_sm.php><img src="assets/img/ico/13.png" width="60" height="60" style="margin-bottom:15px;"> <span>STRATEGIC</span></a></div></li> 
          <li><div class=shortcut-button><a href=_members.php?kd=<?php echo $idv; ?>><img src="assets/img/ico/14.png" width="60" height="60" style="margin-bottom:15px;"> <span>MEMBERS</span></a></div></li>
          <li><div class=shortcut-button><a href=_addKpi.php><img src="assets/img/ico/15.png" width="60" height="60" style="margin-bottom:15px;"> <span>INDIVIDUAL</span></a></div></li>
          <li><div class=shortcut-button><a href=# data-toggle=modal data-target=#myModal3><img src="assets/img/ico/16.png" width="60" height="60" style="margin-bottom:15px;"> <span>APPRAISAL</span></a></div></li>
          <li><div class=shortcut-button><a href=_monitoring.php><img src="assets/img/ico/17.png" width="60" height="60" style="margin-bottom:15px;"> <span>HELP</span></a></div></li>
        </ul>
      </div>
    </div>
	
    <!-- End #header-area -->
	
  </div>
  
  <!-- Start .header-inner -->
  
</div>

<!-- End #header -->

<!-- Modal -->
<div class="modal fade" id=myModal3 tabindex=-1 role=dialog aria-hidden=true>
  <div class="modal-dialog" style="width: 80%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type=button class=close data-dismiss="modal" aria-hidden=true>&times;</button>
        <h4 class="modal-title" id="myModal3Label">Underconstruction Page!</h4>
      </div>
      <div class="modal-body">
        <p>Will be updated soonly..</p>             
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->