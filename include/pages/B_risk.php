<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
    <div class=row>
      <!-- Start .row -->
      <!-- Start .page-header -->
      <div class="col-lg-12 heading">
        <img src=assets/img/q.png width="330" height="75" style="margin-top:0px; margin-left:7px;"></img></a> 
        <!-- Start .bredcrumb -->
        <ul id=crumb class=breadcrumb>
        </ul>
        <!-- End .breadcrumb -->
        <!-- Start .option-buttons -->
        <div class=option-buttons>
          <div class=btn-toolbar role=toolbar>
            <div class="btn-group dropdown">        
            </div>
            <div class="btn-group dropdown"><a class="btn dropdown-toggle" data-toggle=dropdown id=dropdownMenu1><i class="br-grid s24"></i></a>
              <div class="dropdown-menu pull-right" role=menu aria-labelledby=dropdownMenu1>
                <div class=option-dropdown>
                  <div class=shortcut-button><a href=#myModal role=button data-toggle=modal><i class=br-plus></i> <span>Add KPI's</span></a></div>
                  <div class=shortcut-button><a href=#><i class="im-calendar color-lime"></i> <span>Monitoring</span></a></div>
                  <div class=shortcut-button><a href=#><i class="br-target2 color-magenta"></i> <span>Report</span></a></div>
                </div>
              </div>
            </div>
              
            <div class=btn-group><a class="btn dropdown-toggle" data-toggle=dropdown id=dropdownMenu3><i class="ec-help s24"></i></a>
              <div class="dropdown-menu pull-right" role=menu aria-labelledby=dropdownMenu3>
                <div class=option-dropdown>
                  <p>Need HELP for suggestion? <a href=# id=app-tour class="btn btn-success ml15">Contact US</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End .option-buttons -->          
      </div>
      <!-- End .page-header -->
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
                <h4 class=panel-title><h5>STRATEGIC INITIATIVES</h5></h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable2">
                <thead>
                  <tr> 
                    <th>No.
                    <th>KPI ID
                    <th>Description
                    <th>Likelihood
                    <th>Impact
                    <th>Modified Date
                    <th class="per8 text-center"><i class="im-cog s16"></i>
                <tbody> 
                  <?PHP 

                        $qsi= mysql_query("SELECT * FROM risk WHERE vis='0' AND idEmp='$np' ORDER BY idRisk ASC");

                        $num = 1;
                        $i=0;
    
                            While ($qsi2= mysql_fetch_assoc($qsi))
                              
                              {
                                  
                                echo '<tr>';
                                echo '<td class="text-center">'.$num;
                                echo '<td><a href="'.$qsi2['idKpiDetIndv'].'">'.$qsi2['idKpiDetIndv'].'</a>';
                                echo '<td>'.$qsi2['description'];
                                echo '<td>'.$qsi2['likelihood'];
                                echo '<td>'.$qsi2['impact'];
                                echo '<td>'.$qsi2['mDate'];
                                echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a> | ';
                                echo '<a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';

                                $num++;
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