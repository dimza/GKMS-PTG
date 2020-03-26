Start #sidebar -->
<div id="sidebar" class="sidebar-fixed hide-sidebar">
  <!-- Start .sidebar-inner -->
  <div class="sidebar-inner">
    <!-- Start #sideNav -->
    <ul id="sideNav" class="nav nav-pills nav-stacked">
      <li class=top-search>
        <form>
          <input name=search placeholder="SEARCH MENU">
          <button type=submit><i class="ec-search s20"></i></button>
        </form>
      </li>
      <?PHP if($rlGtd=='666' or $rlGtd=='555' ) { ?>        
      <li><a href=#>CORPORATE <i class=im-file></i></a>
        <ul class="nav sub">
          <li><a href=_dashCo.php><i class="im-checkmark s16" style="margin-top:1px;"></i> Dashboard</a></li>    
          <li><a href=_scrc.php><i class="im-checkmark s16" style="margin-top:1px;"></i> Scorecard</a></li>        
          <li><a href=_sm.php><i class="im-checkmark s16" style="margin-top:1px;"></i> Strategic Map</a></li>           
        </ul>
      </li>
      <?PHP } else {}?>        
      <li><a href=#>KPI <i class=im-file></i></a>
        <ul class="nav sub">
          <li><a href=_review.php><i class="im-checkmark s16" style="margin-top:1px;"></i> Review</a></li>
          <li><a href=_addKpi.php><i class="im-checkmark s16" style="margin-top:1px;"></i> Individual</a></li>
                  
          <li><a href=_monitoring.php><i class="im-checkmark s16" style="margin-top:1px;"></i> Monitoring</a></li>
          <li><a href=_members.php><i class="im-checkmark s16" style="margin-top:1px;"></i> Members</a></li>
        </ul>
      </li>
      <li><a href=#>APPRAISAL <i class=im-file></i></a>
        <ul class="nav sub">
          <li><a href=_ipc.php>
              <i class="im-checkmark s16" style="margin-top:1px;"></i> IPC</a></li>
          <li><a href=# data-toggle=modal data-target=#myModal3>
              <i class="im-checkmark s16" style="margin-top:1px;"></i> Monitoring</a></li>    
        </ul>
      </li>
            
      <li><a href=#>REPORT <i class=im-file></i></a>
        <ul class="nav sub">
          <li><a href=# data-toggle=modal data-target=#myModal3>
              <i class="im-checkmark s16" style="margin-top:1px;"></i> Performance</a></li>
          <li><a href=# data-toggle=modal data-target=#myModal3>
              <i class="im-checkmark s16" style="margin-top:1px;"></i> Analyst</a></li>
        </ul>
      </li>

    <?PHP if($rlGtd=='666') { ?>  
      <li><a href=#>USERS <i class=en-users></i></a>
        <ul class="nav sub">
          <li><a href=_addUsers.php>
              <i class="im-checkmark s16" style="margin-top:1px;"></i> Manage Users</a></li>
          <li><a href=_logUsers.php>
              <i class="im-checkmark s16" style="margin-top:1px;"></i> Log</a></li>
        </ul>
      </li>
    <?PHP } else {}?>
    </ul>
    <!-- End #sideNav -->
    <!-- Start .sidebar-panel -->
<!--
    <div class=sidebar-panel>
      <h4 class=sidebar-panel-title><i class=st-meter></i> PERFORMANCE KPI </h4>
      <div class=sidebar-panel-content>
        <ul class=server-stats>
          <li><span class=txt>Executive Level</span> <span class=percent>0</span>
            <div id=usage-sparkline class=sparkline>Loading...</div>
            <div class=pie-chart data-percent=0></div>
          </li>
        </ul>
        <ul class=server-stats>
          <li><span class=txt>Department Level</span> <span class=percent>0</span>
            <div id=cpu-sparkline class=sparkline>Loading...</div>
            <div class=pie-chart data-percent=0></div>
          </li>
        </ul>
        <ul class=server-stats>
          <li><span class=txt>Sub Department Level</span> <span class=percent>0</span>
            <div id=ram-sparkline class=sparkline>Loading...</div>
            <div class=pie-chart data-percent=0></div>
          </li>
        </ul>
      </div>
    </div>
-->
    <!-- End .sidebar-panel -->
  </div>
  <!-- End .sidebar-inner -->
</div>
<!-- End #sidebar -->

<!-- Start #right-sidebar -->
<div id="right-sidebar" class="hide-sidebar">
<?PHP include ("chat.php");  ?>
</div>
<!-- End #right-sidebar
              <!-- Modal -->
              <div class="modal fade" id=myModal3 tabindex=-1 role=dialog aria-hidden=true>
                <div class=modal-dialog>
                  <div class=modal-content>
                    <div class=modal-header>
                      <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                      <h4 class=modal-title id=myModal3Label>Underconstruction Page!</h4>
                    </div>
                    <div class=modal-body>
                      <p>Will be updated soonly..</p>
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->