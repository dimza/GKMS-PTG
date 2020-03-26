<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
    <?PHP include 'include/misc/headPTG.php'; ?>
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here usual with .row class -->
      <div class=row>

        <div class="col-lg-12 col-md-12">
          <!-- col-lg-6 start here -->
          <div class=tabs>
            <ul id=myTab2 class="nav nav-tabs nav-justified">
              <li><a href=#weekly data-toggle=tab>WEEKLY</a> 
                  <?PHP list($cWee)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv where idMont='2' AND year='$yr' AND vis='0' AND idEmp='$np'")); ?>
                  <span class="notification" style="margin-top:4px; margin-right:50px; border-radius:5px; background-color:#00ACAC;"><?PHP echo $cWee; ?></span></li>            
              <li><a href=#monthly data-toggle=tab>MONTHLY</a>
                  <?PHP list($cMon)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv where idMont='3' AND year='$yr' AND vis='0' AND idEmp='$np'")); ?>
                  <span class="notification" style="margin-top:4px; margin-right:50px; border-radius:5px; background-color:#00ACAC;"><?PHP echo $cMon; ?></span></li>
              <li><a href=#quarterly data-toggle=tab>QUARTERLY</a>
                  <?PHP list($cQua)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv where idMont='4' AND year='$yr' AND vis='0' AND idEmp='$np'")); ?>
                  <span class="notification" style="margin-top:4px; margin-right:50px; border-radius:5px; background-color:#00ACAC;"><?PHP echo $cQua; ?></span></li>
              <li><a href=#yearly data-toggle=tab>YEARLY</a>
                  <?PHP list($cYea)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv where idMont='5' AND year='$yr' AND vis='0' AND idEmp='$np'")); ?>
                  <span class="notification" style="margin-top:4px; margin-right:50px; border-radius:5px; background-color:#00ACAC;"><?PHP echo $cYea; ?></span></li>
            </ul>
              
            <div id="myTabContent2" class="tab-content">

                <div class="tab-pane fade" id="weekly">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class=row>
                                        <label class="col-lg-6 col-md-7 control-label" style="text-align:center;"></label> 
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-lime mr10 mb10">ACTUAL</span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-lime mr10 mb10">TARGET</span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-lime mr10 mb10"></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-warning mr10 mb10">Progress</span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-danger mr10 mb10"></span>
                                        </label>                        
                                    </div>
                                </div>
                            </div>
                            <!-- End .form-group  -->                  
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <?PHP 

                                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='2' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                                    echo '<select class="form-control select2" name="kdi" onchange="shwTgt(this.value)">';
                                                    echo '<option value="">SELECT KPI TITLE';
                  
                                                        While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                            echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                            echo $kdiMon2['code'].' - ';
                                                            echo $kdiMon2['title'];
                                                            echo '</option>';
                                            
                                                        }
                                                
                                                    echo '</select>';
                                            ?>
                                        </div>
                                        <div class="col-lg-1 col-md-1"  style="text-align:right;">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-left8></i></button>
                                        </div>                        
                                        <div class="col-lg-1 col-md-1" style="text-align:center;">
                                            <input class=form-control placeholder=0000>
                                            <span class="help-block text-center">Week <?php echo $wk; ?></span>
                                            <hr>
                                            <button type=button class="btn btn-sm btn-alt btn-primary">SAVE</button>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                            <span class="help-block text-center"><?php echo $tdy; ?></span>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-right8></i></button>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=00% disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1"><a href=#myModal role=button data-toggle=modal class="btn dropdown-toggle"><i class="fa-edit s24"></i></a></div>                        
                                    </div>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                        </form>
                        <br>
                        <ul id=myTab3 class="nav nav-tabs nav-justified">
                            <li><a href=#weekly data-toggle=tab><i class="im-calendar2 s24"></i> DETAIL</a></li>
                            <li><a href=#weekly2 data-toggle=tab><i class="im-calendar s24"></i> GENERAL</a></li>
                        </ul>              
                    </div>
                </div>
                <!-- TAB WEEKLY end here -->
                <div class="tab-pane fade" id="weekly2">
                    <div class="panel-body">
                        <form class="form-horizontal" role=form>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <label class="col-lg-5 col-md-5 control-label" style="text-align:center;"></label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;"></label>    
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-info mr10 mb10">Week <?php echo $wk3; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-info mr10 mb10">Week <?php echo $wk2; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-info mr10 mb10">Week <?php echo $wk; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-info mr10 mb10">Week <?php echo $wk4; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-info mr10 mb10">Week <?php echo $wk5; ?></span>
                                        </label>                       
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;"></label>
                                    </div>
                                </div>
                            </div>
                            <!-- End .form-group  -->                  
                            <div class=form-group>
                                <div class=col-lg-12>
                                    <div class=row>
                                        <div class="col-lg-5 col-md-5">
                                            <?PHP 

                                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='2' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                                    echo '<select class="form-control select2" name="kdi" onchange="shwTgt(this.value)">';
                                                    echo '<option value="">SELECT KPI TITLE';
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                        echo $kdiMon2['code'].' - ';
                                                        echo $kdiMon2['title'];
                                                        echo '</option>';
                                            
                                                    }
                                                
                                                    echo '</select>';
                                            ?>
                                        </div>
                                        <div class="col-lg-1 col-md-1" style="text-align:right;">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-left8></i></button>
                                        </div>                        
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1" style="text-align:center;">
                                            <input class=form-control placeholder=0000>
                                            <span class="help-block text-center"><b><?php echo $tdy; ?></b></span>
                                            <hr>
                                            <button type=button class="btn btn-sm btn-alt btn-primary">SAVE</button>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-right8></i></button>
                                        </div>                       
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <ul id=myTab3 class="nav nav-tabs nav-justified">
                            <li><a href=#weekly data-toggle=tab><i class="im-calendar2 s24"></i> DETAIL</a></li>
                            <li><a href=#weekly2 data-toggle=tab><i class="im-calendar s24"></i> GENERAL</a></li>
                        </ul>                
                    </div>
                </div>
                <!-- TAB WEKLY-2 end here -->

                <div class="tab-pane fade" id="monthly">
                    <div class=panel-body>
                        <form class=form-horizontal role=form>
                            <div class=form-group>
                                <div class=col-lg-12>
                                    <div class=row>
                                        <label class="col-lg-6 col-md-7 control-label" style="text-align:center;"></label> 
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-lime mr10 mb10">ACTUAL</span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-lime mr10 mb10">TARGET</span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-lime mr10 mb10"></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-warning mr10 mb10">Progress</span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-danger mr10 mb10"></span>
                                        </label>                        
                                    </div>
                                </div>
                            </div>   
                            <!-- End .form-group  -->                  
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>
                                  <div class="col-lg-6 col-md-6">
                                    <?PHP 

                                      $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='3' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                        echo '<select class="form-control select2" name="kdi" onchange="shwTgt(this.value)">';
                                        echo '<option value="">SELECT KPI TITLE';
                  
                                            While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                echo $kdiMon2['code'].' - ';
                                                echo $kdiMon2['title'];
                                                echo '</option>';
                                            
                                            }
                                                
                                        echo '</select>';
                                    ?>
                                   </div>
                                   <div class="col-lg-1 col-md-1 col-xs-12"  style="text-align:right;">
                                        <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-left8></i></button>
                                   </div>                        
                                   <div class="col-lg-1 col-md-1 col-xs-12" style="text-align:center;">
                                        <input class=form-control placeholder=0000>
                                        <span class="help-block text-center"><?php echo $mt; ?></span>
                                        <hr>
                                        <button type=button class="btn btn-sm btn-alt btn-primary">SAVE</button>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-xs-12">
                                        <input id="tgt" class=form-control value="" disabled>
                                        <span class="help-block text-center"><?PHP echo $tdy; ?></span>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-xs-12">
                                        <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-right8></i></button>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-xs-12">
                                        <input id="prg" class=form-control value="" disabled>
                                    </div>
                                    <div class="col-lg-1 col-md-1"><a href=#myModal role=button data-toggle=modal class="btn dropdown-toggle"><i class="fa-edit s24"></i></a></div>                        
                                </div>
                              </div>
                            </div>
                            <!-- End .form-group  -->
                        </form>
                        <br>
                        <ul id=myTab3 class="nav nav-tabs nav-justified">
                            <li><a href=#monthly data-toggle=tab><i class="im-calendar2 s24"></i> DETAIL</a></li>
                            <li><a href=#monthly2 data-toggle=tab><i class="im-calendar s24"></i> GENERAL</a></li>
                        </ul>              
                    </div>
                </div>
                <!-- TAB MONTHLY end here -->
                <div class="tab-pane fade" id="monthly2">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <label class="col-lg-5 col-md-5 control-label" style="text-align:center;"></label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;"></label>    
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-brown mr10 mb10"><?php echo $mt3; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-brown mr10 mb10"><?php echo $mt2; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-brown mr10 mb10"><?php echo $mt; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-brown mr10 mb10"><?php echo $mt4; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-brown mr10 mb10"><?php echo $mt5; ?></span>
                                        </label>
                                        <label class="col-lg-2 col-md-1 control-label" style="text-align:center;"></label>
                                    </div>
                                </div>
                            </div>
                            <!-- End .form-group  -->                  
                            <div class=form-group>
                                <div class=col-lg-12>
                                    <div class=row>
                                        <div class="col-lg-5 col-md-5">
                                            <?PHP 

                                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='3' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                                    echo '<select class="form-control select2" name="kdi" onchange="shwTgt(this.value)">';
                                                    echo '<option value="">SELECT KPI TITLE';
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                        echo $kdiMon2['code'].' - ';
                                                        echo $kdiMon2['title'];
                                                        echo '</option>';
                                            
                                                    }
                                                
                                                    echo '</select>';
                                            ?>
                                        </div>
                                        <div class="col-lg-1 col-md-1" style="text-align:right;">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-left8></i></button>
                                        </div>                        
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1" style="text-align:center;">
                                            <input class=form-control placeholder=0000>
                                            <span class="help-block text-center"><?php echo $tdy; ?></span>
                                            <hr>
                                            <button type=button class="btn btn-sm btn-alt btn-primary">SAVE</button>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-right8></i></button>
                                        </div>                       
                                    </div>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                        </form>
                        <br>
                        <ul id=myTab3 class="nav nav-tabs nav-justified">
                            <li><a href=#monthly data-toggle=tab><i class="im-calendar2 s24"></i> DETAIL</a></li>
                            <li><a href=#monthly2 data-toggle=tab><i class="im-calendar s24"></i> GENERAL</a></li>
                        </ul>                
                    </div>
                </div>
                <!-- TAB MONTHLY-2 end here -->

                <div class="tab-pane fade" id="quarterly">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <label class="col-lg-6 col-md-6 control-label" style="text-align:center;"></label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;"></label>    
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-dark mr10 mb10">Q<?php echo $cq2; ?> <?php echo $yr; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-dark mr10 mb10">Q<?php echo $cq5; ?> <?php echo $yr; ?></span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-dark mr10 mb10">Q<?php echo $cq6; ?> <?php echo $yr; ?></span>
                                        </label>                        
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;"></label>
                                    </div>
                                </div>
                            </div>  
                            <!-- End .form-group  -->                  
                            <div class=form-group>
                                <div class=col-lg-12>
                                    <div class=row>
                                        <div class="col-lg-6 col-md-6">
                                            <?PHP 

                                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='4' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                                    echo '<select class="form-control select2" name="kdi" onchange="shwTgt(this.value)">';
                                                    echo '<option value="">SELECT KPI TITLE';
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                        echo $kdiMon2['code'].' - ';
                                                        echo $kdiMon2['title'];
                                                        echo '</option>';
                                            
                                                    }
                                                
                                                    echo '</select>';
                                            ?>
                                        </div>
                                        <div class="col-lg-1 col-md-1" style="text-align:right;">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-left8></i></button>
                                        </div>                        
                                        <div class="col-lg-1 col-md-1" style="text-align:center;">
                                            <input class=form-control placeholder=0000>
                                            <span class="help-block text-center"><b><?php echo $tdy; ?></b></span>
                                            <hr>
                                            <button type=button class="btn btn-sm btn-alt btn-primary">SAVE</button>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-right8></i></button>
                                        </div>
                                        <div class="col-lg-1 col-md-1"><a href=#myModal role=button data-toggle=modal class="btn dropdown-toggle"><i class="fa-edit s24"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                        </form>
                    </div> 
                </div>                
                <!-- TAB QUARTERLY end here -->

                <div class="tab-pane fade" id="yearly">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <label class="col-lg-6 col-md-6 control-label" style="text-align:center;"></label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;"></label>    
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-magenta mr10 mb10">2016</span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-magenta mr10 mb10">2017</span>
                                        </label>
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;">
                                            <span class="label label-magenta mr10 mb10">2018</span>
                                        </label>                        
                                        <label class="col-lg-1 col-md-1 control-label" style="text-align:center;"></label>
                                    </div>
                                </div>
                            </div>
                            <!-- End .form-group  -->                  
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <?PHP 

                                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='5' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                                    echo '<select class="form-control select2" name="kdi" onchange="shwTgt(this.value)">';
                                                    echo '<option value="">SELECT KPI TITLE';
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                        echo $kdiMon2['code'].' - ';
                                                        echo $kdiMon2['title'];
                                                        echo '</option>';
                                            
                                                    }
                                                
                                                    echo '</select>';
                                            ?>
                                        </div>
                                        <div class="col-lg-1 col-md-1" style="text-align:right;">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-left8></i></button>
                                        </div>                        
                                        <div class="col-lg-1 col-md-1" style="text-align:center;">
                                            <input class=form-control placeholder=0000>
                                            <span class="help-block text-center"><b><?php echo $tdy; ?></b></span>
                                            <hr>
                                            <button type=button class="btn btn-sm btn-alt btn-primary">SAVE</button>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <input class=form-control placeholder=0000 disabled>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <button type=button class="btn btn-primary btn-sm btn-round"><i class=en-arrow-right8></i></button>
                                        </div>
                                        <div class="col-lg-1 col-md-1"><a href=#myModal role=button data-toggle=modal class="btn dropdown-toggle"><i class="fa-edit s24"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                        </form>
                    </div>
                </div>
                <!-- TAB QUARTERLY end here -->

            </div>
          </div>
        </div>
                

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
                  <h4 class=modal-title>Add Comment</h4>
                </div>
                <div class=modal-body>
                  <!-- content in modal, tinyMCE 4 texarea -->
                <br>
                <form class="form-horizontal" role=form action=sys/engine/tenderInput.php method="post" enctype="multipart/form-data" id="validate">
                    <div class="form-group">
                        <label class="col-lg-2 col-md-2 col-sm-12 control-label">KPI Title</label>
                            <div class="col-lg-8 col-md-8">
                            <?PHP 

                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                echo '<select class="form-control select2" name="kdi">';
                                echo '<option value="">SELECT KPI TITLE';
                  
                                While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                    echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                    echo $kdiMon2['code'].' - ';
                                    echo $kdiMon2['title'];
                                    echo '</option>';
                                            
                                }
                                                
                                echo '</select>';
                                            
                            ?>
                            </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-2 col-md-2 col-sm-12 control-label">Comment</label>                 
                        <div class="col-lg-8 col-md-8">
                            <textarea class=form-control rows=3 name="rmk" placeholder="Write some comment in here.."></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->                
                    <hr>
				    <div class=form-group>
                        <label class="col-lg-2 col-md-2 col-sm-12 control-label">Attach File</label>
                            <div class="col-lg-10 col-md-10">
                                <input type=file name="nama_file">
                                <input type=hidden class=form-control readonly value="<?PHP echo $data_tampil['nama_pegawai'] ?>" name="usr">
                                <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="dat">
                            </div>
                    </div>
                    <!-- End .form-group  -->                    
                    <br>
                    <div class=modal-footer style="margin-right:150px; margin-left:150px;">
                        <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                        <button type=submit class="btn btn-primary">ADD</button>
                    </div>
                </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
                 
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->