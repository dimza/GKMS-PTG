<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <div class="content-wrapper">
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class="row">
        <!-- Start .row -->
        <div class="col-lg-12 col-md-12">
          <!-- Start col-lg-6 -->
            <div class="page-header">
                <i class="st-settings s21" style="margin-bottom:0px;"></i>
                <h4>Edit Individual KPI</h4>
            </div>
            <div class="panel panel-default plain <?PHP echo $hd; ?> toggle showControls">
                <!-- Start .panel -->
                <div class="panel-heading white-bg" style="border-bottom: 1px solid #e4e9eb;">                
                    <h4 class=panel-title><h5><?PHP echo $qkc2; ?> | <?PHP echo $qki4.' '.$qki2; ?></h5></h4>
                </div>
       		    <div class=panel-body>
                    <form class="form-horizontal" role="form" action="sys/engine/updtKpiIndv.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-4 text-left" style="margin-bottom:3px;">Acknowledge by.</label>
                            <label class="col-sm-8 col-xs-8 text-left" style="margin-bottom:3px;">Theme</label>
                            <div class="col-sm-4 col-xs-4">
                                <input class=form-control required name="spv" disabled value="<?PHP echo $qspv2; ?>">
                            </div>
                            <div class="col-sm-8 col-xs-8">
                                <?PHP $rsm= mysql_query("select * from sm order by idSm asc");
            
                                        echo '<select class="form-control select2" name="ism" disabled>';
                                        echo '<option value="'.$qki14.'">'.$qsm2.' '.$qsm3;
                  
                                        While($rsm2= mysql_fetch_assoc($rsm)) { echo '<option value="'.$rsm2['idSm'].'">'.$rsm2['idCode'].' - '.$rsm2['description'].'</option>'; }
                                        
                                        echo '</select>';
                                ?> 
                            </div>
                        </div>
                        <!-- End .form-group  -->
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Code</label>
                            <label class="col-sm-3 col-xs-4 text-left" style="margin-bottom:3px;">Perspective</label>
                            <label class="col-sm-8 col-xs-6 text-left" style="margin-bottom:3px;">Title</label>
                                <div class="col-sm-1 col-xs-2">
                                    <input class=form-control required name="cd" value="<?PHP echo $qki4; ?>"> 
                                </div>
                                <div class="col-sm-3 col-xs-4">
                                    <?PHP $qcat= mysql_query("select * from kpicat order by idCat asc");
            
                                        echo '<select class="form-control select2" name="cat" disabled>';
                                        echo '<option value='.$qki7.'>'.$qkc2;
                  
                                        While($qcat2= mysql_fetch_assoc($qcat)) { echo '<option value="'.$qcat2['idCat'].'">'.$qcat2['desc'].'</option>'; }
                                        
                                        echo '</select>';
                                    ?> 
                                </div>
                                <div class="col-sm-8 col-xs-6">
                                    <input class=form-control required name="tk" value="<?PHP echo $qki2; ?>" disabled> 
                                </div>                                   
                        </div>
                        <!-- End .form-group  -->
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 col-xs-2 text-left" style="margin-bottom:3px;">Weight (1-100)</label>
                            <label class="col-sm-2 col-xs-2 text-left" style="margin-bottom:3px;">Target /Year</label>
                            <label class="col-sm-4 col-xs-4 text-left" style="margin-bottom:3px;">Unit</label>
                            <label class="col-sm-4 col-xs-4 text-left" style="margin-bottom:3px;">Monitoring Type</label>
                            <div class="col-sm-2 col-xs-2">
                                <input class=form-control required name="wgh" value="<?PHP echo $qki12; ?>"></div>                            
                            <div class="col-sm-2 col-xs-2">
                                <?PHP list($trg)=mysql_fetch_array(mysql_query("select SUM(target) from `monthkpimontindv` where idKpiDetIndv='$q'")); ?>
                                <input class=form-control name="tgt" disabled value="<?PHP echo $trg; ?>"></div>                         
                            <div class="col-sm-4 col-xs-4">
                                <?PHP $unt= mysql_query("select * from kpiunit order by idUnit asc");
            
                                        echo '<select class="form-control select2" name="ku">';
                                        echo '<option value="'.$qki8.'">'.$qku6;
                  
                                        While($unt2= mysql_fetch_assoc($unt)) { echo '<option value="'.$unt2['idUnit'].'">'.$unt2['description'].'</option>'; }
                                        
                                        echo '</select>';
                                ?></div>
                                                
                            <div class="col-sm-4 col-xs-4">
                                <?PHP $km= mysql_query("select * from kpimonitoring where vis='0' order by idMont asc");
            
                                        echo '<select class="form-control select2" name="mnt" disabled>';
                                        echo '<option value="">'.$qmt2;
                  
                                        While($km2= mysql_fetch_assoc($km)) { echo '<option value="'.$km2['idMont'].'">'.$km2['description'].'</option>'; }
                                
                                        echo '</select>';
                                ?></div>                        
                        </div>
                        <!-- End .form-group  -->
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-4 col-xs-4 text-left" style="margin-bottom:3px;">Calculation</label>
                            <label class="col-sm-8 col-xs-8 text-left" style="margin-bottom:3px;">Description</label>
                                <div class="col-sm-4 col-xs-4" style="text-align: justify;">
                                    <textarea class=form-control rows=3 name="calc" disabled><?PHP echo $qki15; ?></textarea> 
                                </div>
                                <div class="col-sm-8 col-xs-8" style="text-align: justify;">
                                    <textarea class=form-control rows=3 name="dsc"><?PHP echo $qki3; ?></textarea> 
                                </div>                                   
                        </div>
                        <!-- End .form-group  -->
                        <div class="modal-footer">
                            <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="ide">
                            <input type=hidden class=form-control value="<?PHP echo $q; ?>" name="idk">
                            <button type=submit class="btn btn-primary" <?PHP //echo $dsb; ?>>UPDATE</button>
                        </div>
                    </form>
                </div>                                 
            </div>
            <!-- End .panel -->
            <div class="panel panel-default plain <?PHP echo $hd2; ?> toggle">
                <!-- Start .panel -->
                <div class="panel-heading white-bg">
                    <h4 class=panel-title><h5>Input Target Manually</h5></h4>
                </div>              
                <div class=panel-body>
                    <form class="form-horizontal" role="form" action="sys/engine/updtKpiTgt.php" method="post" enctype="multipart/form-data">
                    <?PHP if ($qki9=='3') { ?>
                    <div class="form-group">
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Jan-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Feb-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Mar-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Apr-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">May-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Jun-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Jul-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Aug-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Sep-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Oct-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Nov-<?PHP echo $yr; ?></label>
                        <label class="col-sm-1 col-xs-2 text-left" style="margin-bottom:3px;">Dec-<?PHP echo $yr; ?></label>
                        <?PHP
                        
                        $qm= mysql_query("select * from `month` where idKpiDetIndv='$q'") or die(mysql_error());
                        $qm2= mysql_result($qm, 0, 'jan');
                        $qm3= mysql_result($qm, 0, 'feb');
                        $qm4= mysql_result($qm, 0, 'mar');
                        $qm5= mysql_result($qm, 0, 'apr');
                        $qm6= mysql_result($qm, 0, 'may');
                        $qm7= mysql_result($qm, 0, 'jun');
                        $qm8= mysql_result($qm, 0, 'jul');
                        $qm9= mysql_result($qm, 0, 'aug');
                        $qm10= mysql_result($qm, 0, 'sep');
                        $qm11= mysql_result($qm, 0, 'oct');
                        $qm12= mysql_result($qm, 0, 'nov');
                        $qm13= mysql_result($qm, 0, 'decm');
                                           
                        ?>
                        
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="jan" value="<?PHP echo $qm2; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="feb" value="<?PHP echo $qm3; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="mar" value="<?PHP echo $qm4; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="apr" value="<?PHP echo $qm5; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="may" value="<?PHP echo $qm6; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="jun" value="<?PHP echo $qm7; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="jul" value="<?PHP echo $qm8; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="aug" value="<?PHP echo $qm9; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="sep" value="<?PHP echo $qm10; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="oct" value="<?PHP echo $qm11; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="nov" value="<?PHP echo $qm12; ?>"> 
                            </div>
                            <div class="col-sm-1 col-xs-2">
                                <input class=form-control required name="dec" value="<?PHP echo $qm13; ?>">
                                <input type=hidden class=form-control value="<?PHP echo $today; ?>" name="dt">
                                <input type=hidden class=form-control value="<?PHP echo $q; ?>" name="idk">
                            </div>
                    </div>
                    <!-- End .form-group  -->
                    <?PHP } else if ($qki9=='4') { ?>
                    <div class="form-group">
                        <label class="col-sm-3 text-left" style="margin-bottom:3px;">Q1-<?PHP echo $yr; ?></label>
                        <label class="col-sm-3 text-left" style="margin-bottom:3px;">Q2-<?PHP echo $yr; ?></label>
                        <label class="col-sm-3 text-left" style="margin-bottom:3px;">Q3-<?PHP echo $yr; ?></label>
                        <label class="col-sm-3 text-left" style="margin-bottom:3px;">Q4-<?PHP echo $yr; ?></label>
                        <?PHP
                        
                        $qq= mysql_query("select * from `quarter` where idKpiDetIndv='$q'") or die(mysql_error());
                        $qq2= mysql_result($qq, 0, 'Q1');
                        $qq3= mysql_result($qq, 0, 'Q2');
                        $qq4= mysql_result($qq, 0, 'Q3');
                        $qq5= mysql_result($qq, 0, 'Q4');
                        ?>                   
                            <div class="col-sm-3">
                                <input class=form-control required name="q1" value="<?PHP echo $qq2; ?>"> 
                            </div>
                            <div class="col-sm-3">
                                <input class=form-control required name="q2" value="<?PHP echo $qq3; ?>"> 
                            </div>
                            <div class="col-sm-3">
                                <input class=form-control required name="q3" value="<?PHP echo $qq4; ?>"> 
                            </div>
                            <div class="col-sm-3">
                                <input class=form-control required name="q4" value="<?PHP echo $qq5; ?>"> 
                            </div>
                    </div>
                    <!-- End .form-group  -->
                    <?PHP } else if ($qki9=='5') { ?>
                    <div class="form-group">
                        <label class="col-sm-12 text-left" style="margin-bottom:3px;">YEAR <?PHP echo $yr; ?></label>
                        <?PHP
                        
                        $qy= mysql_query("select * from `year` where idKpiDetIndv='$q'") or die(mysql_error());
                        $qy2= mysql_result($qy, 0, 'year');
                        ?>                    
                            <div class="col-sm-12">
                                <input class=form-control required name="yr" value="<?PHP echo $qy2; ?>"> 
                            </div>
                    </div>
                    <!-- End .form-group  -->
                    <?PHP } else if ($qki9=='2') { ?>
                    <div class="form-group">
                        <?PHP
                        
                        $qw= mysql_query("select * from `week` where idKpiDetIndv='$q'") or die(mysql_error());
                        $qw2= mysql_result($qw, 0, 'week01');
                        $qw3= mysql_result($qw, 0, 'week02');
                        $qw4= mysql_result($qw, 0, 'week03');
                        $qw5= mysql_result($qw, 0, 'week04');
                        $qw6= mysql_result($qw, 0, 'week05');
                        $qw7= mysql_result($qw, 0, 'week06');
                        $qw8= mysql_result($qw, 0, 'week07');
                        $qw9= mysql_result($qw, 0, 'week08');
                        $qw10= mysql_result($qw, 0, 'week09');
                        $qw11= mysql_result($qw, 0, 'week10');
                        $qw12= mysql_result($qw, 0, 'week11');
                        $qw13= mysql_result($qw, 0, 'week12');
                        $qw14= mysql_result($qw, 0, 'week13');
                        $qw15= mysql_result($qw, 0, 'week14');
                        $qw16= mysql_result($qw, 0, 'week15');
                        $qw17= mysql_result($qw, 0, 'week16');
                        $qw18= mysql_result($qw, 0, 'week17');
                        $qw19= mysql_result($qw, 0, 'week18');
                        $qw20= mysql_result($qw, 0, 'week19');
                        $qw21= mysql_result($qw, 0, 'week20');
                        $qw22= mysql_result($qw, 0, 'week21');
                        $qw23= mysql_result($qw, 0, 'week22');
                        $qw24= mysql_result($qw, 0, 'week23');
                        $qw25= mysql_result($qw, 0, 'week24');
                        $qw26= mysql_result($qw, 0, 'week25');
                        $qw27= mysql_result($qw, 0, 'week26');
                        $qw28= mysql_result($qw, 0, 'week27');
                        $qw29= mysql_result($qw, 0, 'week28');
                        $qw30= mysql_result($qw, 0, 'week29');
                        $qw31= mysql_result($qw, 0, 'week30');
                        $qw32= mysql_result($qw, 0, 'week31');
                        $qw33= mysql_result($qw, 0, 'week32');
                        $qw34= mysql_result($qw, 0, 'week33');
                        $qw35= mysql_result($qw, 0, 'week34');
                        $qw36= mysql_result($qw, 0, 'week35');
                        $qw37= mysql_result($qw, 0, 'week36');
                        $qw38= mysql_result($qw, 0, 'week37');
                        $qw39= mysql_result($qw, 0, 'week38');
                        $qw40= mysql_result($qw, 0, 'week39');
                        $qw41= mysql_result($qw, 0, 'week40');
                        $qw42= mysql_result($qw, 0, 'week41');
                        $qw43= mysql_result($qw, 0, 'week42');
                        $qw44= mysql_result($qw, 0, 'week43');
                        $qw45= mysql_result($qw, 0, 'week44');
                        $qw46= mysql_result($qw, 0, 'week45');
                        $qw47= mysql_result($qw, 0, 'week46');
                        $qw48= mysql_result($qw, 0, 'week47');
                        $qw49= mysql_result($qw, 0, 'week48');
                        ?> 
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-01</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-02</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-03</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-04</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-05</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-06</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-07</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-08</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-09</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-10</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-11</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-12</label>                    
                            <div class="col-sm-1">
                                <input class=form-control required name="week01" value="<?PHP echo $qw2; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week02" value="<?PHP echo $qw3; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week03" value="<?PHP echo $qw4; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week04" value="<?PHP echo $qw5; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week05" value="<?PHP echo $qw6; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week06" value="<?PHP echo $qw7; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week07" value="<?PHP echo $qw8; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week08" value="<?PHP echo $qw9; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week09" value="<?PHP echo $qw10; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week10" value="<?PHP echo $qw11; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week11" value="<?PHP echo $qw12; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week12" value="<?PHP echo $qw13; ?>"> 
                            </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-13</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-14</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-15</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-16</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-17</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-18</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-19</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-20</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-21</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-22</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-23</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-24</label>                    
                            <div class="col-sm-1">
                                <input class=form-control required name="week13" value="<?PHP echo $qw14; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week14" value="<?PHP echo $qw15; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week15" value="<?PHP echo $qw16; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week16" value="<?PHP echo $qw17; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week17" value="<?PHP echo $qw18; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week18" value="<?PHP echo $qw19; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week19" value="<?PHP echo $qw20; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week20" value="<?PHP echo $qw21; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week21" value="<?PHP echo $qw22; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week22" value="<?PHP echo $qw23; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week23" value="<?PHP echo $qw24; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week24" value="<?PHP echo $qw25; ?>"> 
                            </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-25</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-26</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-27</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-28</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-29</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-30</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-31</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-32</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-33</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-34</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-35</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-36</label>                    
                            <div class="col-sm-1">
                                <input class=form-control required name="week25" value="<?PHP echo $qw26; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week26" value="<?PHP echo $qw27; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week27" value="<?PHP echo $qw28; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week28" value="<?PHP echo $qw29; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week29" value="<?PHP echo $qw30; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week30" value="<?PHP echo $qw31; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week31" value="<?PHP echo $qw32; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week32" value="<?PHP echo $qw33; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week33" value="<?PHP echo $qw34; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week34" value="<?PHP echo $qw35; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week35" value="<?PHP echo $qw36; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week36" value="<?PHP echo $qw37; ?>"> 
                            </div>
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-37</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-38</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-39</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-40</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-41</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-42</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-43</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-44</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-45</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-46</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-47</label>
                        <label class="col-sm-1 text-left" style="margin-bottom:3px;">Week-48</label>                    
                            <div class="col-sm-1">
                                <input class=form-control required name="week37" value="<?PHP echo $qw38; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week38" value="<?PHP echo $qw39; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week39" value="<?PHP echo $qw40; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week40" value="<?PHP echo $qw41; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week41" value="<?PHP echo $qw42; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week42" value="<?PHP echo $qw43; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week43" value="<?PHP echo $qw44; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week44" value="<?PHP echo $qw45; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week45" value="<?PHP echo $qw46; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week46" value="<?PHP echo $qw47; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week47" value="<?PHP echo $qw48; ?>"> 
                            </div>
                            <div class="col-sm-1">
                                <input class=form-control required name="week48" value="<?PHP echo $qw49; ?>"> 
                            </div>
                    </div>
                    <!-- End .form-group  -->
                    <?PHP } ?>
                    <div class="modal-footer">
                        <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="ide">
                        <input type=hidden class=form-control value="<?PHP echo $q; ?>" name="idk">
                        <input type=hidden class=form-control value="<?PHP echo $qki9; ?>" name="idm">
                        <button type=submit class="btn btn-primary" <?PHP echo $dsb; ?>>UPDATE</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- End .panel -->            
        </div>
        <!-- End col-lg-12 Content --> 
        <div class="col-lg-6 col-md-6">
          <!-- Start col-lg-6 -->
            <div class="panel panel-default plain <?PHP echo $hd2; ?> toggle">
                <!-- Start .panel -->
                <div class="panel-heading white-bg">
                    <h4 class=panel-title><h5>Adjustment Target Value</h5></h4>
                </div>              
                <div class=panel-body>
                    <form class="form-horizontal" role="form" action="sys/engine/updtKpiTgt.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-lg-2 col-md-2 col-sm-12 control-label">Period</label>
                            <div class="col-lg-4 col-md-4">
                                <?PHP $mont='2';

                                        $kdiMon= mysql_query("SELECT * FROM monthkpimontindv WHERE idKpiDetIndv='$q' ORDER BY idMtr ASC");
            
                                            echo '<select class="form-control select2" name="mnt" onchange="shwTgt(this.value)">';
                                            echo '<option value="">SELECT';
                  
                                            While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                $idmt=$kdiMon2['idMtr'];

                                                $qmtr= mysql_query("SELECT * FROM `monitoring` WHERE idMtr='$idmt'") or die(mysql_error());
                                                $qmtr2= mysql_result($qmtr, 0, 'description');

                                                echo '<option value="'.$kdiMon2['idMontIndv'].'">';
                                                echo $qmtr2;
                                                echo '</option>';
                                            }
                                                
                                                echo '</select>'; ?>                                                
                                   </div>
                        <label class="col-lg-2 col-md-2 col-sm-12 control-label">Target</label>                        
                            <div class="col-lg-4 col-md-4" style="text-align:center;">
                                <input id ="tgt" class=form-control name="tgt" placeholder="0000">
                            </div>                         
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                            <div class="col-lg-10 col-md-10" style="text-align:center;">
                                <textarea class=form-control rows=2 name="rmk"  placeholder="Write some comment in here..">
                                
                                </textarea>
                            </div>                         
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-12 control-label">Attach</label>
                                <div class="col-lg-10 col-md-10">
                                    <input type=file name="nama_file" class=form-control>
                                </div>                         
                    </div>
                    <!-- End .form-group  -->
                    <div class="modal-footer">
                        <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="ide">
                        <input type=hidden class=form-control value="<?PHP echo $q; ?>" name="idk">
                        <input type=hidden class=form-control value="<?PHP echo $qki9; ?>" name="idm">
                        <button type=submit class="btn btn-primary" <?PHP echo $dsb; ?>>UPDATE</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- End .panel -->            
        </div>
        <!-- End col-lg-6 Content -->
        <div class="col-lg-6 col-md-6">
          <!-- Start col-lg-6 -->
            <div class="panel panel-default plain <?PHP echo $hd2; ?> toggle">
                <!-- Start .panel -->
                <div class="panel-heading white-bg">
                    <h4 class=panel-title><h5>Adjustment Actual Value</h5></h4>
                </div>              
                <div class=panel-body>
                    <form class="form-horizontal" role="form" action="sys/engine/updtKpiTgt.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-12 control-label">Period</label>
                                <div class="col-lg-4 col-md-4">
                                    <?PHP   $mont='2'; $kdiMon= mysql_query("SELECT * FROM monthkpimontindv WHERE idKpiDetIndv='$q' ORDER BY idMtr ASC");
            
                                                echo '<select class="form-control select2" name="mnt" onchange="shwAct(this.value)">';
                                                echo '<option value="">SELECT';
                  
                                                While($kdiMon2= mysql_fetch_assoc($kdiMon)) {

                                                    $idmt=$kdiMon2['idMtr'];

                                                    $qmtr= mysql_query("SELECT * FROM `monitoring` WHERE idMtr='$idmt'") or die(mysql_error());
                                                    $qmtr2= mysql_result($qmtr, 0, 'description');

                                                    echo '<option value="'.$kdiMon2['idMontIndv'].'">';
                                                    echo $qmtr2;
                                                    echo '</option>';
                                            }
                                                
                                                echo '</select>'; ?>                                                
                                </div>
                            <label class="col-lg-2 col-md-2 col-sm-12 control-label">Actual</label>                        
                                <div class="col-lg-4 col-md-4" style="text-align:center;">
                                    <input id="act" class=form-control name="act" placeholder="0000">
                                </div>                         
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-12 control-label">Remark</label>
                                <div class="col-lg-10 col-md-10" style="text-align:center;">
                                    <textarea class=form-control rows=2 name="rmk" id="rmk" placeholder="Write some comment in here..">
                                    </textarea>
                                </div>                         
                        </div>
                        <!-- End .form-group  -->
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-12 control-label">Attach</label>
                                <div class="col-lg-10 col-md-10">
                                    <input type=file name="nama_file" class=form-control>
                                </div>                         
                        </div>
                        <!-- End .form-group  -->
                    <div class="modal-footer">
                        <input type=hidden class=form-control value="<?PHP echo $np; ?>" name="ide">
                        <input type=hidden class=form-control value="<?PHP echo $q; ?>" name="idk">
                        <input type=hidden class=form-control value="<?PHP echo $qki9; ?>" name="idm">
                        <button type=submit class="btn btn-primary" <?PHP echo $dsb; ?>>UPDATE</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- End .panel -->            
        </div>
        <!-- End col-lg-6 Content -->                                  
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
