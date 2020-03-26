<!-- Start #content -->
<div id=content style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
      <div class="row">
        <!-- Start .row -->
        <div class="col-lg-12 col-md-12">
          <!-- Start col-lg-6 -->
            <div class="page-header">
                <i class="fa-table s21" style="margin-bottom:0px;"></i>
                <h4>Log login users to GKMS Software</h4>
            </div>
        </div>
      </div>
      <!-- End .row -->
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <!-- Start .row -->         
        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title>Users List</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id=datatable>
                <thead> 
                    <tr>
                        <th>level
                        <th>Id.
                        <th>Full Name
                        <th>Division
                            
                        <th>Status
                        <th>Last Login
                        <th class="per10 text-center"><i class="im-cog s16"></i>
                <tbody>
                    <?PHP 
                        
                        $empQ= mysql_query("SELECT * FROM emp ORDER BY fName ASC");
		
						      While ($empQ2= mysql_fetch_assoc($empQ)) 
                              
                              {
                                  
                                  $iPos = $empQ2['idPos'];
                                  $iDiv = $empQ2['idDiv'];
                                  //$vis = $empQ2['vis'];
                                  $iu = $empQ2['idUser'];

                                    $ius= mysql_query("select * from `users` where idUser='$iu'") or die(mysql_error());
                                    $ius2= mysql_result($ius, 0, 'lastLog');
                                    $ius3= mysql_result($ius, 0, 'granted');
                                    $ius4= mysql_result($ius, 0, 'status');
                                  
                                    $iDiv2= mysql_query("select * from `empdiv` where idDiv='$iDiv'") or die(mysql_error());
                                    $iDiv3= mysql_result($iDiv2, 0, 'code');
                                  
                                echo '<tr>';
                                echo '<td>';
                                  
                                  if ($ius3=='0') { echo '<i class="im-star3 s14 color-yellow"></i>'; }
                                  else if ($ius3=='555') { echo '<i class="im-star3 s14 color-yellow"> </i><i class="im-star3 s14 color-yellow"> </i><i class="im-star3 s14 color-yellow"></i>'; }
                                  else { echo '<i class="st-star s14 color-yellow"></i> <i class="st-star s14 color-yellow"></i> <i class="st-star s14 color-yellow"></i> <i class="st-star s14 color-yellow"></i>'; }  
                                
                                  echo '<td>'.$empQ2['idUser'];
								                  echo '<td><a href="_addEmp.php?sw=1&&kd='.$empQ2['idUser'].'" target="_Blank">'.$empQ2['fName'].' '.$empQ2['lName'];
                                echo '<td>'.$iDiv3;
                                echo '<td>';
                                  
                                    if ($ius4=='0') { echo '<span class="label label-success mr10">Active</span>'; } 
                                    else if ($ius4=='1') { echo '<span class="label label-orange mr10">Suspend</span>'; }
                                    else { echo '<span class="label label-danger mr10">Disable</span>'; }
                                  
                                echo '<td>'.$ius2;
                                echo '<td class="text-center"><a href="editKpi.php?kd='.$empQ2["idEmp"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
							
                              }
					?>                        
              </table>
            </div>
          </div>
          <!-- End .panel -->                          
        </div>
        <!-- col-lg-12 end here -->             
      </div>
      <!-- End .row -->
            
      <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <!-- Button to trigger twitter bootstrap modal -->
          <!-- <a href=#myModal role=button class="btn btn-alt btn-danger mb25" data-toggle=modal>Launch TinyMCE in bootstrap modal</a> -->
          <!-- Modal itself -->
          <div class="modal fade" id="myModal" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add KPI Details</h4>
                </div>
                <div class=modal-body>
                  <!-- content in modal, tinyMCE 4 texarea -->
                <br>
                
                <form class="form-horizontal" role=form action=sys/engine/tenderInput.php method="post" enctype="multipart/form-data" id="validate">
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Title KPI</label>                 
                    <div class="col-lg-2 col-md-2">
                        <input class=form-control required name="rn" placeholder="ie. F01.1"> 
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input class=form-control required name="rn" placeholder="ie. Reduce Usage budget for ICT devices"> 
                    </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description (optional)</label>                 
                  <div class="col-lg-8 col-md-8">
                    <textarea class=form-control rows=2 name="rmk" placeholder="ie. Budget propose for ICT in FY 2016 will be reduce and monitoring in monthly."></textarea> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <hr>
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Target</label>
                    <div class="col-lg-4 col-md-4">
                        <input class=form-control required name="tgt" placeholder="0-9999">
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <?PHP 

                          $unt= mysql_query("select * from kpiunit order by idKpiUnit asc");
            
                        echo '<select class="form-control select2" name="ku">';
                        echo '<option value="">SELECT UNIT';
                  
                          While($unt2= mysql_fetch_assoc($unt)) {

                            echo '<option value="'.$unt2['idKpiUnit'].'">';
                            echo $unt2['description'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>                    
                </div>
                <!-- End .form-group  -->                    
                <div class=form-group>
                    <label class="col-lg-2 col-md-2 col-sm-12 control-label">Monitoring</label>
                    <div class="col-lg-4 col-md-4">
                      <?PHP 

                          $km= mysql_query("select * from kpimonitoring order by idKpiMonitoring asc");
            
                        echo '<select class="form-control select2" name="km">';
                        echo '<option value="">SELECT';
                  
                          While($km2= mysql_fetch_assoc($km)) {

                            echo '<option value="'.$km2['idKpiMonitoring'].'">';
                            echo $km2['description'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                      <select class="form-control select2" name="ku">
                          <option value="">Which The Best Direction?
                          <option value="">UP
                          <option value="">DOWN
                          <option value="">None
                        </select>
                    </div>                    
                </div>
                <!-- End .form-group  -->                    
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Catagory</label>
                    <div class="col-lg-4 col-md-4">
                      <?PHP $kc= mysql_query("select * from kpicatagory order by idkpicatagory");
            
                        echo '<select class="form-control select2" name="type" onchange="shwNo(this.value)">';
                        echo '<option value="">SELECT';
                  
                          While($kc2= mysql_fetch_assoc($kc)) {

                            echo '<option value="'.$kc2['idkpicatagory'].'">';
                            echo $kc2['description'].' - '.$kc2['code'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <input class=form-control required name="cdk" placeholder="ie. F01.1">
                    </div>
                </div>
                <!-- End .form-group  -->                    
                <br>
                <div class=modal-footer style="margin-right:150px; margin-left:150px;">
                  <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                  <button type=submit class="btn btn-primary">ADD</button>
                </form>
                </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
      <!-- /.modal -->
      </div>
      <!-- col-lg-12 end here -->            
            
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->