<?PHP

    $q= intval($_GET['kd']);

        $qsm= mysql_query("select * from `sm` where idSm='$q'") or die(mysql_error());
        $qsm2= mysql_result($qsm, 0, 'idCode');
        $qsm3= mysql_result($qsm, 0, 'description');

?>
<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper">
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <!-- Start col-lg-6 -->
            <div class="page-header">
                <i class="en-statistics s21" style="margin-bottom:0px;"></i>
                <h4>THEME - <?PHP echo $qsm2.' '.$qsm3; ?></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class="panel-title">Gauges Indicators</h4>
            </div>
            <div class="panel-body">
                <div class="text-center">            
                  <canvas width="220" height="220" data-type="canv-gauge" data-title="P6" id="gauge2"
                           data-onready="setInterval( function() { Gauge.Collection.get('gauge2').setValue( Math.random() * 52);}, 2000);"></canvas>
                </div>

            </div>            
          </div>
          <!-- End .panel -->                          
        </div>

        <div class="col-lg-8 col-md-8">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class=panel-title> Chart Performance</h4>
            </div>
            <div class=panel-body>
              <div id="11" style="width: 100%; height:223px"></div>
            </div>
          </div>
          <!-- End .panel -->
        </div>

        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title>Key Performance Indicators</h4>        
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable3">
                <thead>
                  <tr>
                    
                    <th class=per5>Id.
                    <th>Description
                    
                    <th>Target
                    <th>Actual
                    <th>Trend
                    <th>Owner 
                    <th>Modified Date
                    <th class="per7 text-center"><i class="im-cog s16"></i>
                <tbody>                   
                  <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE year='$yr' AND vis='0' AND idSm='$q' ORDER BY code ASC");
        
                          While ($kc2= mysql_fetch_assoc($kc)) {

                            $kdiMon6=$kc2['idMont'];
                            $qi=$kc2['idKpiDetIndv'];

                                            list($prg)=mysql_fetch_array(mysql_query("SELECT COUNT(actual) FROM monthkpimontindv where idKpiDetIndv='$qi' AND actual>0"));

                                            if ($kdiMon6=="2") { $prg2= 48; } 
                                            else if ($kdiMon6=="3") { $prg2= 12; } 
                                            else if ($kdiMon6=="4") { $prg2= 4; } 
                                            else if ($kdiMon6=="5") { $prg2= 1; }

                                            $prg3= $prg/$prg2;
                                            $prg4= number_format($prg3 * 100);

                                            $iep=$kc2['idEmp'];

                                            $qem= mysql_query("select * from `emp` where idUser='$iep'") or die(mysql_error());
                                            $qem2= mysql_result($qem, 0, 'fName');
                                            $qem3= mysql_result($qem, 0, 'lName');
                                  
                                            echo '<tr>';
                                            
                                            echo '<td>'.$kc2['code'];
                                            echo '<td><a href="_viewKpi.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            
                                            echo '<td>-';
                                            echo '<td>-';
                                            echo '<td class="text-center"><img class=user-avatar src=assets/img/trendnet.png>';
                                            echo '<td><a href="_viewEmp.php?kd='.$iep.'" target="_Blank">'.$qem2.' '.$qem3.'</a>';
                                            //echo '<td><div class=progress><div class="progress-bar progress-bar-purple" role=progressbar aria-valuenow='.$prg4.' aria-valuemin=0 aria-valuemax=100 style="width: '.$prg4.'%">'.$prg4.'%</div></div>';
                                            echo '<td>'.$kc2['mDate'];
                                            echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
                            
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
            
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->
    
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->