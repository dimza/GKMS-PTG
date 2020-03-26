<?PHP

    $var = @$_GET['kd'];
    $var2 = @$_GET['id'];
    $alrt = @$_GET['al']; 

    $qIKDI= mysql_query("SELECT * FROM `kpidetindv` ORDER BY idKpiDetIndv DESC LIMIT 1") or die(mysql_error());
    $qIKDI2= mysql_result($qIKDI, 0, 'idKpiDetIndv');
    $qIKDI3= $qIKDI2+'1';

  if ($lvl=='2') {

        $qcat= mysql_query("select * from `kpicat` where idCat='1'") or die(mysql_error());
        $qcat2= mysql_result($qcat, 0, 'wDiv');

        $qcat5= mysql_query("select * from `kpicat` where idCat='2'") or die(mysql_error());
        $qcat6= mysql_result($qcat5, 0, 'wDiv');

        $qcat9= mysql_query("select * from `kpicat` where idCat='3'") or die(mysql_error());
        $qcat10= mysql_result($qcat9, 0, 'wDiv');

        $qcat13= mysql_query("select * from `kpicat` where idCat='4'") or die(mysql_error());
        $qcat14= mysql_result($qcat13, 0, 'wDiv');

    } else if ($lvl=='1') {

        $qcat= mysql_query("select * from `kpicat` where idCat='1'") or die(mysql_error());
        $qcat2= mysql_result($qcat, 0, 'wDep');

        $qcat5= mysql_query("select * from `kpicat` where idCat='2'") or die(mysql_error());
        $qcat6= mysql_result($qcat5, 0, 'wDep');

        $qcat9= mysql_query("select * from `kpicat` where idCat='3'") or die(mysql_error());
        $qcat10= mysql_result($qcat9, 0, 'wDep');

        $qcat13= mysql_query("select * from `kpicat` where idCat='4'") or die(mysql_error());
        $qcat14= mysql_result($qcat13, 0, 'wDep');

    } else if ($lvl=='0') {

        $qcat= mysql_query("select * from `kpicat` where idCat='1'") or die(mysql_error());
        $qcat2= mysql_result($qcat, 0, 'wIndv');

        $qcat5= mysql_query("select * from `kpicat` where idCat='2'") or die(mysql_error());
        $qcat6= mysql_result($qcat5, 0, 'wIndv');

        $qcat9= mysql_query("select * from `kpicat` where idCat='3'") or die(mysql_error());
        $qcat10= mysql_result($qcat9, 0, 'wIndv');

        $qcat13= mysql_query("select * from `kpicat` where idCat='4'") or die(mysql_error());
        $qcat14= mysql_result($qcat13, 0, 'wIndv');

    } else {}

?>
<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper"><br>
        <?PHP //include 'include/misc/headPTG.php'; ?>
        <div class=outlet>
        <!-- Start .outlet -->
            <!-- Page start here ( usual with .row ) -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- col-lg-12 start here -->
              <div class=page-header>
                <h4>ADD DETAILS KPI</h4>
              </div>
          </div>
          <!-- End col-lg-12 -->            
                <div class=row>
                    <div class="col-lg-12 col-md-12">
                        <form class="form-horizontal" role=form action=sys/engine/inptKpiIndv.php method="post" enctype="multipart/form-data" id="validate">
                    <div class="form-group">
                        <label class="col-lg-2 col-md-2 control-label text-left">Perspective</label>
                        <label class="col-lg-3 col-md-3 col-sm-6 control-label text-left">Monitoring</label>                                                     
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <div class="col-lg-2 col-md-2 col-sm-12">
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
                        <div class="col-lg-3 col-md-3 col-sm-12">
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
                  
                    <div class="form-group" id="txtSM">
                    </div>
                    <!-- End .form-group  -->
                    <hr> 
                    <div class="form-group">
                        <label class="col-lg-2 col-md-2 control-label text-left">Code</label>
                        <label class="col-lg-6 col-md-6 control-label text-left">Title KPI</label>                                                      
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">
                        <div class="col-lg-2 col-md-2">
                            <input id="CD" class=form-control required name="cd" placeholder="ie. P6.01">
                        </div>                                         
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input class=form-control required name="tk" placeholder="ie. Document Control Accuracy"> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-8 col-md-8 control-label text-left">Description (optional)</label>          
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">            
                        <div class="col-lg-8 col-md-8">
                            <textarea class=form-control rows=3 name="dsc" placeholder="ie. Document control responsible for managing company documents while also ensuring their accuracy, quality and integrity. Registering in out document minimum one day after document has received."></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->                            
                    <hr>
                    <div class="form-group">
                        <label class="col-lg-8 col-md-8 control-label text-left">Calculation</label>          
                    </div>
                    <!-- End .form-group  -->                    
                    <div class="form-group">            
                        <div class="col-lg-8 col-md-8">
                            <textarea class=form-control rows=3 name="clc" placeholder="ie. Measures accuracy registered document. A=Outstanding Doc. To Registered, B=Sum of document in the month, C=Target your KPI in each month, Result=(A/B)*8,3"></textarea> 
                        </div>                                   
                    </div>
                    <!-- End .form-group  -->                            
                    <div class="form-group">
                        <label class="col-lg-2 col-md-2 control-label text-left">Weight (%)</label>
                        <label class="col-lg-3 col-md-3 control-label text-left">Target /Year</label>
                        <label class="col-lg-3 col-md-3 control-label text-left">Unit</label>               
                    </div>
                    <!-- End .form-group  -->                    
                    <div class=form-group>
                        <div class="col-lg-2 col-md-2">
                            <input class=form-control required name="wgh" placeholder="1-100">
				            <input type=hidden class=form-control value="<?PHP $mnt=3; echo $mnt; ?>" name="mnt">
                            <input type=hidden class=form-control value="<?PHP echo $qIKDI3; ?>" name="idk">
                            <input type=hidden class=form-control value="<?PHP echo $yr; ?>" name="yr">
                            <input type=hidden class=form-control value="<?PHP echo $idspv; ?>" name="spv">
                            <input type=hidden class=form-control value="<?PHP echo $lvl; ?>" name="lvl">
                            <input type=hidden class=form-control value="<?PHP echo $idv; ?>" name="div">
                            <input type=hidden class=form-control value="<?PHP echo $idp; ?>" name="dep">
                            <input type=hidden class=form-control value="<?PHP echo $ids; ?>" name="sec">
                            <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="np">
                            <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                        </div>                        
                        <div class="col-lg-3 col-md-3">
                            <input class=form-control required name="tgt" placeholder="0123456789">
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
                    </div>
                    <!-- End .form-group  -->                                                                                                    
                    <br>
                    <div class="">
                
                </div>
                    <div class=modal-footer style="text-align:left;">
                        <button type=reset class="btn btn-default">Reset</button>
                        <button type=submit class="btn btn-primary" style="margin-right:90px;">ADD</button>
                    </div>
                </form>
        </div>
                    <!-- col-lg-12 Main Content of Perspective KPI View end here -->                    
                </div>
                <!-- End .row -->
      </div>
      <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->