<!-- Start #content -->
<div id=content style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class=content-wrapper><Br>
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
                    <form class="form-horizontal" role="form" action="sys/engine/inptKpiIndv2.php" method="post" enctype="multipart/form-data">
                        <div class=panel-body>                                
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>
                                    <label class="col-lg-6 col-md-6 control-label text-left" style="margin-bottom:3px;">KPI Title</label>
                                    <label class="col-lg-2 col-md-2 control-label text-left" style="margin-bottom:3px;">Period</label>
                                    <label class="col-lg-1 col-md-1 control-label" style="margin-bottom:3px;text-align:center;">Actual</label>
                                    <label class="col-lg-1 col-md-1 control-label" style="margin-bottom:3px;text-align:center;">Target</label>
                                    <label class="col-lg-2 col-md-2 control-label" style="margin-bottom:3px;text-align:center;">Progress</label>                                  
                                    <div class="col-lg-6 col-md-6">
                                        <?PHP $mont='2';

                                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='$mont' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                                echo '<select class="form-control select2" name="ikdi" onchange="shwTgt(this.value)">';
                                                echo '<option value="">SELECT';
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                        echo $kdiMon2['code'].' - ';
                                                        echo $kdiMon2['title'];
                                                        echo '</option>';
                                                    }
                                                
                                                echo '</select>'; ?>
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-2">
                                        <?PHP $mont='2';

                                                $kdiMon= mysql_query("SELECT * FROM monitoring WHERE idMont='$mont' ORDER BY idMtr ASC");
            
                                                echo '<select class="form-control select2" name="mnt" disabled>';
                                                echo '<option value="'.$wk6.'">'.$wk6;
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['description'].'">';
                                                        echo $kdiMon2['description'];
                                                        echo '</option>';
                                                    }
                                                
                                                echo '</select>'; ?>                                                
                                    </div>
                                    
                                    <div class="col-lg-1 col-md-1" style="text-align:center;">
                                        <input id="act" class=form-control name="act">
                                        <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                                        <input type=hidden class=form-control value="<?PHP echo $date; ?>" name="date">
                                        <input type=hidden class=form-control value="<?PHP echo $mont; ?>" name="mnt">
                                        <input type=hidden class=form-control value="<?PHP echo $wk6; ?>" name="prd">
                                    </div>
                                                         
                                    <div class="col-lg-1 col-md-1">
                                        <input id="tgt" class=form-control value="" disabled>
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-2">
                                        <input id="prg" class=form-control value="" disabled>
                                    </div>                        
                                </div>
                              </div>
                            </div>
                            <!-- End .form-group  -->
                            <br>
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>
                                    <label class="col-lg-6 col-md-6 control-label text-left" style="margin-bottom:3px;">Remark</label>
                                    <label class="col-lg-4 col-md-4 control-label text-left" style="margin-bottom:3px;">Upload Document</label>                                                                                            
                                    <div class="col-lg-6 col-md-6" style="text-align:center;">
                                        <textarea class=form-control rows=2 name="rmk" placeholder="Write some comment in here.."></textarea>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <input type=file name="nama_file">
                                    </div>                        
                                </div>
                              </div>
                            </div>
                            <!-- End .form-group  -->
                            <hr>
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>                                                                                              
                                    <div class="col-lg-6 col-md-6" style="text-align:center;"></div>
                                    <div class="col-lg-4 col-md-4">
                                        <button type=submit class="btn btn-primary">SAVE</button>
                                    </div>                        
                                </div>
                              </div>                            
                            </div>
                            <!-- End .form-group  -->                            
                        </div>
                    </form>                  
                </div>
                <!-- TAB WEEKLY end here -->
                <div class="tab-pane fade" id="monthly">
                    <form class="form-horizontal" role="form" action="sys/engine/inptKpiIndv2.php" method="post" enctype="multipart/form-data">
                        <div class=panel-body>                               
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>
                                    <label class="col-lg-6 col-md-6 control-label text-left" style="margin-bottom:3px;">KPI Title</label>
                                    <label class="col-lg-2 col-md-2 control-label text-left" style="margin-bottom:3px;">Period</label>
                                    <label class="col-lg-1 col-md-1 control-label" style="margin-bottom:3px;text-align:center;">Actual</label>
                                    <label class="col-lg-1 col-md-1 control-label" style="margin-bottom:3px;text-align:center;">Target</label>
                                    <label class="col-lg-2 col-md-2 control-label" style="margin-bottom:3px;text-align:center;">Progress</label>                                                                       
                                    <div class="col-lg-6 col-md-6">
                                        <?PHP $mont='3';

                                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='$mont' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                                echo '<select class="form-control select2" name="ikdi" onchange="shwTgt2(this.value)">';
                                                echo '<option value="">SELECT';
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                        echo $kdiMon2['code'].' - ';
                                                        echo $kdiMon2['title'];
                                                        echo '</option>';
                                                    }
                                                
                                                echo '</select>'; ?>
                                   </div>
                                    <div class="col-lg-2 col-md-2">
                                        <?PHP $mont='3';

                                                $kdiMon= mysql_query("SELECT * FROM monitoring WHERE idMont='$mont' ORDER BY idMtr ASC");
            
                                                echo '<select class="form-control select2" name="prd" disabled>';
                                                echo '<option value="'.$mt.'">'.$mt;
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['description'].'">';
                                                        echo $kdiMon2['description'];
                                                        echo '</option>';
                                                    }
                                                
                                                echo '</select>'; ?>                                                
                                   </div>                        
                                    <div class="col-lg-1 col-md-1" style="text-align:center;">
                                        <input id="act2" class=form-control name="act">
                                        <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                                        <input type=hidden class=form-control value="<?PHP echo $date; ?>" name="date">
                                        <input type=hidden class=form-control value="<?PHP echo $mont; ?>" name="mnt">
                                        <input type=hidden class=form-control value="<?PHP echo $mt; ?>" name="prd">
                                    </div>
                                  
                                    <div class="col-lg-1 col-md-1">
                                        <input id="tgt2" class=form-control value="" disabled>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <input id="prg2" class=form-control value="" disabled>
                                    </div>                        
                                </div>
                              </div>
                            </div>
                            <!-- End .form-group  -->
                            <br>
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>
                                    <label class="col-lg-6 col-md-6 control-label text-left" style="margin-bottom:3px;">Remark</label>
                                    <label class="col-lg-4 col-md-4 control-label text-left" style="margin-bottom:3px;">Upload Document</label>                                                                                            
                                    <div class="col-lg-6 col-md-6" style="text-align:center;">
                                        <textarea class=form-control rows=2 name="rmk" placeholder="Write some comment in here.."></textarea>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <input type=file name="nama_file">
                                    </div>                        
                                </div>
                              </div>
                            </div>
                            <!-- End .form-group  -->
                            <hr>
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>                                                                                              
                                    <div class="col-lg-6 col-md-6" style="text-align:center;"></div>
                                    <div class="col-lg-4 col-md-4">
                                        <button type=submit class="btn btn-primary">SAVE</button>
                                    </div>                        
                                </div>
                              </div>                            
                            </div>
                            <!-- End .form-group  -->                            
                        </div>
                    </form>
                </div>
                <!-- TAB MONTHLY end here -->
                <div class="tab-pane fade" id="quarterly">
                    <form class="form-horizontal" role="form" action="sys/engine/inptKpiIndv2.php" method="post" enctype="multipart/form-data">
                        <div class=panel-body>              
                  
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>
                                    <label class="col-lg-6 col-md-6 control-label text-left" style="margin-bottom:3px;">KPI Title</label>
                                    <label class="col-lg-2 col-md-2 control-label text-left" style="margin-bottom:3px;">Period</label>
                                    <label class="col-lg-1 col-md-1 control-label" style="margin-bottom:3px;text-align:center;">Actual</label>
                                    <label class="col-lg-1 col-md-1 control-label" style="margin-bottom:3px;text-align:center;">Target</label>
                                    <label class="col-lg-2 col-md-2 control-label" style="margin-bottom:3px;text-align:center;">Progress</label>                                  
                                    <div class="col-lg-6 col-md-6">
                                        <?PHP $mont='4';

                                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='$mont' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                                echo '<select class="form-control select2" name="ikdi" onchange="shwTgt3(this.value)">';
                                                echo '<option value="">SELECT';
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                        echo $kdiMon2['code'].' - ';
                                                        echo $kdiMon2['title'];
                                                        echo '</option>';
                                                    }
                                                
                                                echo '</select>'; ?>
                                   </div>
                                    <div class="col-lg-2 col-md-2">
                                        <?PHP $mont='4';

                                                $kdiMon= mysql_query("SELECT * FROM monitoring WHERE idMont='$mont' ORDER BY idMtr ASC");
            
                                                echo '<select class="form-control select2" name="mnt" disabled>';
                                                echo '<option value="'.$cq7.'">'.$cq7;
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['description'].'">';
                                                        echo $kdiMon2['description'];
                                                        echo '</option>';
                                                    }
                                                
                                                echo '</select>'; ?>                                                
                                   </div>                        
                                    <div class="col-lg-1 col-md-1" style="text-align:center;">
                                        <input id="act3" class=form-control name="act">
                                        <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                                        <input type=hidden class=form-control value="<?PHP echo $date; ?>" name="date">
                                        <input type=hidden class=form-control value="<?PHP echo $mont; ?>" name="mnt">
					      <input type=hidden class=form-control value="<?PHP echo $cq7; ?>" name="prd">
                                    </div>
                                  
                                    <div class="col-lg-1 col-md-1">
                                        <input id="tgt3" class=form-control value="" disabled>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <input id="prg3" class=form-control value="" disabled>
                                    </div>                        
                                </div>
                              </div>
                            </div>
                            <!-- End .form-group  -->
                            <br>
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>
                                    <label class="col-lg-6 col-md-6 control-label text-left" style="margin-bottom:3px;">Remark</label>
                                    <label class="col-lg-4 col-md-4 control-label text-left" style="margin-bottom:3px;">Upload Document</label>                                                                                            
                                    <div class="col-lg-6 col-md-6" style="text-align:center;">
                                        <textarea class=form-control rows=2 name="rmk" placeholder="Write some comment in here.."></textarea>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <input type=file name="nama_file">
                                    </div>                        
                                </div>
                              </div>
                            </div>
                            <!-- End .form-group  -->
                            <hr>
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>                                                                                              
                                    <div class="col-lg-6 col-md-6" style="text-align:center;"></div>
                                    <div class="col-lg-4 col-md-4">
                                        <button type=submit class="btn btn-primary">SAVE</button>
                                    </div>                        
                                </div>
                              </div>                            
                            </div>
                            <!-- End .form-group  -->                           
                    </div>
                    </form>                    
                </div>                
                <!-- TAB QUARTERLY end here -->                
                <div class="tab-pane fade" id="yearly">
                    <form class="form-horizontal" role="form" action="sys/engine/inptKpiIndv2.php" method="post" enctype="multipart/form-data">
                        <div class=panel-body>                                
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>
                                    <label class="col-lg-6 col-md-6 control-label text-left" style="margin-bottom:3px;">KPI Title</label>
                                    <label class="col-lg-2 col-md-2 control-label text-left" style="margin-bottom:3px;">Period</label>
                                    <label class="col-lg-1 col-md-1 control-label" style="margin-bottom:3px;text-align:center;">Actual</label>
                                    <label class="col-lg-1 col-md-1 control-label" style="margin-bottom:3px;text-align:center;">Target</label>
                                    <label class="col-lg-2 col-md-2 control-label" style="margin-bottom:3px;text-align:center;">Progress</label>                                  
                                    <div class="col-lg-6 col-md-6">
                                        <?PHP $mont='5';

                                                $kdiMon= mysql_query("SELECT * FROM kpidetindv WHERE idMont='$mont' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
            
                                                echo '<select class="form-control select2" name="ikdi" onchange="shwTgt4(this.value)">';
                                                echo '<option value="">SELECT';
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['idKpiDetIndv'].'">';
                                                        echo $kdiMon2['code'].' - ';
                                                        echo $kdiMon2['title'];
                                                        echo '</option>';
                                                    }
                                                
                                                echo '</select>'; ?>
                                   </div>
                                    <div class="col-lg-2 col-md-2">
                                        <?PHP $mont='5';

                                                $kdiMon= mysql_query("SELECT * FROM monitoring WHERE idMont='$mont' ORDER BY idMtr ASC");
            
                                                echo '<select class="form-control select2" name="mnt" disabled>';
                                                echo '<option value="'.$yr.'">'.$yr;
                  
                                                    While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                        echo '<option value="'.$kdiMon2['description'].'">';
                                                        echo $kdiMon2['description'];
                                                        echo '</option>';
                                                    }
                                                
                                                echo '</select>'; ?>                                                
                                   </div>                        
                                    <div class="col-lg-1 col-md-1" style="text-align:center;">
                                        <input id="act4" class=form-control name="act">
                                        <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                                        <input type=hidden class=form-control value="<?PHP echo $date; ?>" name="date">
                                        <input type=hidden class=form-control value="<?PHP echo $mont; ?>" name="mnt">
                                        <input type=hidden class=form-control value="<?PHP echo $yr; ?>" name="prd">
                                    </div>
                                  
                                    <div class="col-lg-1 col-md-1">
                                        <input id="tgt4" class=form-control value="" disabled>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <input id="prg4" class=form-control value="" disabled>
                                    </div>                        
                                </div>
                              </div>
                            </div>
                            <!-- End .form-group  -->
                            <br>
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>
                                    <label class="col-lg-6 col-md-6 control-label text-left" style="margin-bottom:3px;">Remark</label>
                                    <label class="col-lg-4 col-md-4 control-label text-left" style="margin-bottom:3px;">Upload Document</label>                                                                                            
                                    <div class="col-lg-6 col-md-6" style="text-align:center;">
                                        <textarea class=form-control rows=2 name="rmk" placeholder="Write some comment in here.."></textarea>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <input type=file name="nama_file">
                                    </div>                        
                                </div>
                              </div>
                            </div>
                            <!-- End .form-group  -->
                            <hr>
                            <div class=form-group>
                              <div class=col-lg-12>
                                <div class=row>                                                                                              
                                    <div class="col-lg-6 col-md-6" style="text-align:center;"></div>
                                    <div class="col-lg-4 col-md-4">
                                        <button type=submit class="btn btn-primary">SAVE</button>
                                    </div>                        
                                </div>
                              </div>                            
                            </div>
                            <!-- End .form-group  -->                            
                        </div>
                    </form>                   
                </div>
                <!-- TAB YEARLY end here -->
            </div>
            
          </div>
        </div>

      </div>
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->

    <div class=col-lg-12>
      <!-- col-lg-12 start here -->
        <!-- Modal itself -->
          <div class="modal fade" id="myModal" tabindex=-1 role=dialog aria-hidden=true>
            <div class="modal-dialog modal-lg2">
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Add KPI Details</h4>
                </div>
                <div class=modal-body>      
                <br>              
                <form class="form-horizontal" role=form action=sys/engine/inptKpiIndv.php method="post" enctype="multipart/form-data" id="validate">
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1"></label>
                        <label class="col-lg-3 col-md-3 col-sm-6 control-label text-left">Perspective</label>
                        <label class="col-lg-3 col-md-3 col-sm-6 control-label text-left">Monitoring</label>                                                     
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 control-label"></label>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <?PHP 
    
                                $kc= mysql_query("select * from kpicat order by idCat");
            
                                echo '<select class="form-control select2" name="cat" onchange="showSM(this.value)">';
                                echo '<option value="">SELECT';
                  
                                While($kc2= mysql_fetch_assoc($kc)) {

                                    echo '<option value="'.$kc2['idCat'].'">';
                                    echo $kc2['code'].' - '.$kc2['desc'];
                                    echo '</option>';
                                
                                }
                                   
                                echo '</select>';
                            ?>
                        </div>                    
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <?PHP $km= mysql_query("select * from kpimonitoring where vis='0' order by idMont asc");
            
                                    echo '<select class="form-control select2" name="mnt" disabled>';
                                    echo '<option value="3">MONTHLY';
                  
                                        While($km2= mysql_fetch_assoc($km)) {

                                            echo '<option value="'.$km2['idMont'].'">';
                                            echo $km2['description'];
                                            echo '</option>';
                                        
                                        }

                                    echo '</select>';
                            ?>
                        </div>
                    </div>
                    <!-- End .form-group  -->
                    <hr>                   
                    <div class="form-group" id="txtSM">
                    </div>
                    <!-- End .form-group  -->
                    <br>
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left">Code</label>
                        <label class="col-lg-8 col-md-8 col-sm-10 control-label text-left">Title KPI</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <input id="CD" class=form-control required name="cd" placeholder="ie. F01.1">
                        </div>                                         
                        <div class="col-lg-8 col-md-8 col-sm-10">
                            <input class=form-control required name="tk" placeholder="ie. Reduce Usage budget for ICT devices"> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <label class="col-lg-10 col-md-10 col-sm-12 control-label text-left">Description (optional)</label>                                                     
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>                 
                        <div class="col-lg-10 col-md-10">
                            <textarea class=form-control rows=3 name="dsc" placeholder="ie. Budget propose for ICT in FY 2016 will be reduce and monitoring in monthly."></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <hr>
                    <div class="form-group">
                        <label class="col-lg-1 col-md-1 col-sm-12"></label>
                        <label class="col-lg-2 col-md-2 col-sm-12 control-label text-left">Target</label>
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Unit</label>
                        <label class="col-lg-2 col-md-2 col-sm-12 control-label text-left">Weight (%)</label>
                        <label class="col-lg-3 col-md-3 col-sm-12 control-label text-left">Best Direction (<a href="">?</a>)</label>                                                     
                    </div>
                    <!-- End .form-group  -->                    
                    <div class=form-group>
                        <label class="col-lg-1 col-md-1 col-sm-12 control-label"></label>
                        <div class="col-lg-2 col-md-2">
                            <input class=form-control required name="tgt" placeholder="0-9999">
                        </div>
                        <div class="col-lg-3 col-md-3">
                        <?PHP 

                          $unt= mysql_query("select * from kpiunit order by idUnit asc");
            
                                echo '<select class="form-control select2" name="ku">';
                                echo '<option value="">SELECT';
                  
                          While($unt2= mysql_fetch_assoc($unt)) {

                            echo '<option value="'.$unt2['idUnit'].'">';
                            echo $unt2['description'];
                            echo '</option>';
                                                                  }
                            echo '</select>';
                        ?>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <input class=form-control required name="wgh" placeholder="1-100">
                            <input type=hidden class=form-control value="<?PHP echo $qIKDI3; ?>" name="idk">
                            <input type=hidden class=form-control value="<?PHP echo $yr; ?>" name="yr">
                            <input type=hidden class=form-control value="<?PHP echo $lvl; ?>" name="lvl">
                            <input type=hidden class=form-control value="<?PHP echo $idv; ?>" name="div">
                            <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="np">
                            <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                        </div>
                        <div class="col-lg-3 col-md-3">
                        <?PHP 

                          $unt= mysql_query("select * from kpiunit order by idUnit asc");
            
                                echo '<select class="form-control select2" name="bd" disabled>';
                                echo '<option value="">SELECT';
                  
                          While($unt2= mysql_fetch_assoc($unt)) {

                            echo '<option value="'.$unt2['idUnit'].'">';
                            echo $unt2['description'];
                            echo '</option>';
                                                                  }
                            echo '</select>';
                        ?>
                        </div>
                    </div>
                    <!-- End .form-group  -->                                                                                                    
                    <br>
                    <div class="">
                
                </div>
                    <div class=modal-footer style="margin-right:20px; margin-left:20px;">
                        <button type=reset class="btn btn-default">Reset</button>
                        <button type=submit class="btn btn-primary" style="margin-right:48px;">ADD</button>
                    </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
      <!-- End .modal -->        
      </div>
      <!-- col-lg-12 Input Modal end here -->            
            
      <!-- Page End here -->
    </div>