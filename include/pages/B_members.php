<?PHP

    $qIKDI= mysql_query("SELECT * FROM `kpidetindv` ORDER BY idKpiDetIndv DESC LIMIT 1") or die(mysql_error());
    $qIKDI2= mysql_result($qIKDI, 0, 'idKpiDetIndv');
    $qIKDI3= $qIKDI2+'1';

?>
<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper">
    <div class=outlet><br>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
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
                                                    <div class=shortcut-button><a href=# data-toggle=modal data-target=#myModal3><i class=en-docs></i> <span>Review</span></a></div>
                                                    <div class=shortcut-button><a href=# data-toggle=modal data-target=#myModal3><i class="im-calendar color-lime"></i> <span>Monitoring</span></a></div>
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
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <div class=page-header>
            <h4>Members</h4>
          </div>
        </div>
        <!-- col-lg-12 end here -->

        <?PHP $emp= mysql_query("SELECT * FROM emp WHERE idDiv='$idv' ORDER BY level DESC");
        
                    While ($emp2= mysql_fetch_assoc($emp)) {

                        $idp=$emp2['idPos'];
                        $ft=$emp2['avatar'];

                        if ($ft=="") { $foto="bb.jpg";} else { $foto=$ft; }

                        $qdp= mysql_query("SELECT * FROM emppos WHERE idPos='$idp'") or die(mysql_error());
                        $qdp2= mysql_result($qdp, 0, 'descr'); 

                        echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">';
                        echo '<div class="tile-stats b brall mb25"><a href="_viewEmp3.php?kd='.$emp2['idUser'].'" target="_Blank">';
                        echo '<div class=tile-stats-icon>';
                        echo '<img width="60" height="60" class=user-avatar src=assets/img/avatars/'.$foto.' style="border-radius: 5px;"></div>';

                        echo '<div class=tile-stats-content>';
                        echo '<div class=tile-stats-number>'.$emp2['fName'].' '.$emp2['lName'].'</div>';
                        echo '<div class=tile-stats-text>'.$qdp2.'</div>';
                        echo '<div class=tile-icon><i class="im-star3 s16 color-yellow"></i><i class="im-star3 s16 color-yellow"></i><i class="im-star2 s16 color-yellow"></i><i class="im-star s16 color-yellow"></i></i></div>';
                        echo '</div><div class=clearfix></div></a></div></div>';

                    }

        ?>        

        <!-- col-lg-12 Main Content of Perspective KPI View end here -->                    
      </div>
      <!-- End .row -->            
            
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->
    
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->