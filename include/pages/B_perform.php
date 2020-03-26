<?PHP

    $qIKDI= mysql_query("SELECT * FROM `kpidetindv` ORDER BY idKpiDetIndv DESC LIMIT 1") or die(mysql_error());
    $qIKDI2= mysql_result($qIKDI, 0, 'idKpiDetIndv');
    $qIKDI3= $qIKDI2+'1';

?>
<!-- Start #content -->
<div id="content">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper">
    <?PHP include 'include/misc/headPTG.php'; ?>
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
       
        <div class="col-lg-6 col-md-6">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class="panel-title">DIVISION</h4>
            </div>
            <div class="panel-body">
              <ul class="skills-bar-container" style="margin: 4% auto;">
                <label style="margin-bottom:5px;">FINANCE</label>
                  <span class="percent" id="html-pourcent"></span>
                    <li>
                      <span class="progressbar progressred" id="progress-html"></span>
                    </li>
  
                <label style="margin-bottom:5px;">STAKEHOLDER</label>
                  <span class="percent" id="css-pourcent"></span>
                    <li>
                      <span class="progressbar progressblue" id="progress-css"></span>
                    </li>
  
                <label style="margin-bottom:5px;">INTERNAL PROCESS</label>
                  <span class="percent" id="javascript-pourcent"></span>
                    <li>
                      <span class="progressbar progresspurple" id="progress-javascript"></span>
                    </li>
  
                <label style="margin-bottom:5px;">LEARNING & GROWTH</label>
                  <span class="percent" id="php-pourcent"></span>
                    <li>
                      <span class="progressbar progressorange" id="progress-php"></span>
                    </li>
              </ul>

            </div>             
          </div>
          <!-- End .panel -->                          
        </div>
        <div class="col-lg-6 col-md-6">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4 class="panel-title">OVERALL INDICATORS</h4>
            </div>
            <div class="panel-body">
                <div class="text-center">            
                  <canvas width="220" height="220" data-type="canv-gauge" data-title="OPERATION" id="gauge2"
                           data-onready="setInterval( function() { Gauge.Collection.get('gauge2').setValue( Math.random() * 52);}, 2000);"></canvas>
                </div>

            </div>            
          </div>
          <!-- End .panel -->                          
        </div>
        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title>KEY PERFORMANCE INDICATORS</h4>        
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable3">
                <thead>
                  <tr>
                    <th>Owner 
                    <th class=per5>Id.
                    <th>Description
                    <th class=per30>Progress
                <tbody>                   
                  <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE year='$yr' AND vis='0' AND idDiv='$idv' ORDER BY code ASC");
        
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
                                            echo '<td><a href="_viewEmp3.php?kd='.$iep.'" target="_Blank">'.$qem2.' '.$qem3.'</a>';
                                            echo '<td>'.$kc2['code'];
                                            echo '<td><a href="_viewKpi2.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            
                                            echo '<td><div class=progress><div class="progress-bar progress-bar-purple" role=progressbar aria-valuenow='.$prg4.' aria-valuemin=0 aria-valuemax=100 style="width: '.$prg4.'%">'.$prg4.'%</div></div>';

                                            //echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
                            
                                    }
                               ?>
                        </table>
            </div>
          </div>
          <!-- End .panel -->                          
        </div>
        <!-- col-lg-12 end here -->       

        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <div class=page-header>
            <h4>Department</h4>
          </div>
        </div>
        <!-- col-lg-12 end here -->

        <?PHP $ed= mysql_query("SELECT * FROM empdep WHERE idDiv='$idv'");
        
                    While ($ed2= mysql_fetch_assoc($ed)) {

                        $idp=$ed2['idDiv'];

                        $qdv= mysql_query("SELECT * FROM empdiv WHERE idDiv='$idp'") or die(mysql_error());
                        $qdv2= mysql_result($qdv, 0, 'desc'); 

                        echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">';
                        echo '<div class="tile-stats b brall mb25"><a href="_performDep.php?kd='.$ed2['idDep'].'" target="_Blank">';
                        echo '<div class=tile-stats-icon>';
                        echo '<img class=user-avatar src=assets/img/speedo.png style="margin-top:2px;"></div>';
                        //echo '<img width="50" height="50" class=user-avatar src=assets/img/avatars/dep.png>
                        echo '<div class=tile-stats-content>';
                        echo '<div class=tile-stats-number>'.$ed2['code'].'</div>';
                        echo '<div class=tile-stats-text>'.$qdv2.'</div>';
                        echo '</div><div class=clearfix></div></a></div></div>';

                    }

        ?>
        </div>
        <div class=row>
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <div class=page-header>
            <h4>Members</h4>
          </div>
        </div>
        <!-- col-lg-12 end here -->

        <?PHP $emp= mysql_query("SELECT * FROM emp WHERE idDiv='$idv' ORDER BY level DESC");
        
                    While ($emp2= mysql_fetch_assoc($emp)) {

                        $idp=$emp2['idDep'];
                        $ft=$emp2['avatar'];

                        if ($ft=="") { $foto="bb.jpg";} else { $foto=$ft; }

                        $qdp= mysql_query("SELECT * FROM empdep WHERE idDep='$idp'") or die(mysql_error());
                        $qdp2= mysql_result($qdp, 0, 'desc'); 

                        echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">';
                        echo '<div class="tile-stats b brall mb25"><a href="_viewEmp.php?kd='.$emp2['idUser'].'" target="_Blank">';
                        echo '<div class=tile-stats-icon>';
                        echo '<img width="50" height="50" class=user-avatar src=assets/img/avatars/'.$foto.'></div>';
                        echo '<div class=tile-stats-content>';
                        echo '<div class=tile-stats-number>'.$emp2['fName'].' '.$emp2['lName'].'</div>';
                        echo '<div class=tile-stats-text>'.$qdp2.'</div>';
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