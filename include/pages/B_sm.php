<!-- Start #content -->
<div id="content" style="margin-left:0px;">
    <!-- Start .content-wrapper -->
    <div class="content-wrapper">
        <div class="outlet"><br>
            <!-- Start .outlet -->
                <!-- Page start here ( usual with .row ) -->
                <div class="row">
                    <!-- Start .page-header -->
                    <div class="col-lg-12 heading">
                        <img src=assets/img/q.png width="330" height="75" style="margin-top:0px; margin-left:7px;"></img></a> 
                            <!-- Start .bredcrumb -->
                            <ul id="crumb" class="breadcrumb">
                            </ul>
                            <!-- End .breadcrumb -->
                                <!-- Start .option-buttons -->
                                <div class=option-buttons>
                                    <div class=btn-toolbar role=toolbar>
                                        <div class="btn-group dropdown">        
                                            <form style="margin-top:8px;">
                                                <select class="form-control select2" name="ngr" disabled>
                                                    <option value="">YEAR 2016
                                                    <option value="">YEAR 2015
                                                    <option value="">YEAR 2014
                                                </select>
                                                <!--<button type=button class="btn btn-danger btn-round"><i class=en-arrow-right8></i></button>-->
                                            </form>
                                        </div>
                                        <div class="btn-group dropdown"><a class="btn dropdown-toggle" data-toggle=dropdown id=dropdownMenu1><i class="br-grid s24"></i></a>
                                            <div class="dropdown-menu pull-right" role=menu aria-labelledby=dropdownMenu1>
                                                <div class=option-dropdown>
                                                    <div class=shortcut-button><a href=# data-toggle=modal data-target=#myModal3><i class=en-plus3></i> <span>Add Theme</span></a></div>
                                                    <div class=shortcut-button><a href=# data-toggle=modal data-target=#myModal3><i class="im-settings color-lime"></i> <span>Manage</span></a></div>
                                                    <div class=shortcut-button><a href=# data-toggle=modal data-target=#myModal3><i class="fa-dashboard color-magenta"></i> <span>Report</span></a></div>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class=btn-group><a class="btn dropdown-toggle" data-toggle=dropdown id=dropdownMenu3><i class="ec-help s24"></i></a>
                                            <div class="dropdown-menu pull-right" role=menu aria-labelledby=dropdownMenu3>
                                              <div class=option-dropdown>
                                                <p>Need HELP for suggestion? <a href="mailto:dhimas.yuli@gunanusa.co.id?subject=GKMS Help Support Request&body=Kindly help for assitance for GKMS Application!" id=app-tour class="btn btn-success ml15">Contact US</a></p>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .option-buttons -->          
                    </div>
                    <!-- End .page-header -->            
                    <?PHP 
                        include_once("sys/engine/listSmStk.php");
                        include_once("sys/engine/listSmFin.php"); 
                    ?>
                </div>          
                <div class="row">
                    <?PHP 
                        include_once("sys/engine/listSmIp.php");
                        include_once("sys/engine/listSmLg.php");  
                    ?>
                </div>

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
                  <h4 class=modal-title>Add a KPI Corporate Details</h4>
                </div>
                <div class=modal-body>
                  <!-- content in modal, tinyMCE 4 texarea -->
                <br>
                
                <form class="form-horizontal" role=form action=sys/engine/inptKpiCor.php method="post" enctype="multipart/form-data" id="validate">
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Perspective</label>
                    <div class="col-lg-4 col-md-4">
                      <?PHP $qcat= mysql_query("select * from kpicat order by idCat");
            
                        echo '<select class="form-control select2" name="pspc" onchange="shwCd(this.value)">';
                        echo '<option value="">SELECT';
                  
                          While($dtCat= mysql_fetch_assoc($qcat)) {

                            echo '<option value="'.$dtCat['idCat'].'">';
                            echo $dtCat['desc'].' - '.$dtCat['code'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                    <div class="col-lg-4 col-md-4" id="txtHint">
                    </div>
                </div>
                <!-- End .form-group  -->                    
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Title KPI</label>                 
                  <div class="col-lg-8 col-md-8">
                    <input class=form-control required name="tk" placeholder="title max 55 characters" maxlength="60"> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description (optional)</label>                 
                  <div class="col-lg-8 col-md-8">
                    <textarea class=form-control rows=4 name="dscr" placeholder="ie. Budget propose for ICT in FY 2016 will be reduce and monitoring in monthly, value of reduce per monthly in 5% from total budget divide by month. Budget 1 Year USD 50,000"></textarea> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tags</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tags" value="mis, engineering, procurement" name="tgs">
                    <input type="hidden" class=form-control value="<?PHP echo $np; ?>" name="usr">                     
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
          <div class="modal fade" id="myModal2" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add a Sub KPI Corporate Details </h4>
                </div>
                <div class=modal-body>
                  <!-- content in modal, tinyMCE 4 texarea -->
                <br>
                
                <form class="form-horizontal" role=form action=sys/engine/inptKpiCor.php method="post" enctype="multipart/form-data" id="validate">
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">KPI Title</label>
                    <div class="col-lg-8 col-md-8">
                      <?PHP $qKDC= mysql_query("select * from kpidetcom GROUP by idCatNoCom");
            
                        echo '<select class="form-control select2" name="kt">';
                        echo '<option value="">SELECT';
                  
                          While($dtKDC= mysql_fetch_assoc($qKDC)) {

                            echo '<option value="'.$dtKDC['idKpiDetCom'].'">';
                            echo $dtKDC['idCat'].' - '.$dtKDC['idCatNoCom'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                </div>
                <!-- End .form-group  -->                    
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Title KPI</label>                 
                  <div class="col-lg-8 col-md-8">
                    <input class=form-control required name="tk" placeholder="ie. Reduce Usage budget for ICT devices">
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Description (optional)</label>                 
                  <div class="col-lg-8 col-md-8">
                    <textarea class=form-control rows=4 name="dscr" placeholder="ie. Budget propose for ICT in FY 2016 will be reduce and monitoring in monthly, value of reduce per monthly in 5% from total budget divide by month. Budget 1 Year USD 50,000"></textarea> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Tags</label>
                  <div class="col-lg-8 col-md-8">
                    <input class="form-control tags" value="mis, engineering, procurement" name="tgs">
                    <input type="hidden" class=form-control value="<?PHP echo $np; ?>" name="usr">                     
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