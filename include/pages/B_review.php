<?PHP

    $qIKDI= mysql_query("SELECT * FROM `kpidetindv` ORDER BY idKpiDetIndv DESC LIMIT 1") or die(mysql_error());
    $qIKDI2= mysql_result($qIKDI, 0, 'idKpiDetIndv');
    $qIKDI3= $qIKDI2+'1';

?>
<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper">
    <?PHP include 'include/misc/headPTG.php'; ?>
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>

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
                    <th>Target
                    <th>Monitoring
                    <th>Approve
                    <th>Created Date
                    <th class="per7 text-center"><i class="im-cog s16"></i>
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
                                            echo '<td><a href="_viewEmp.php?kd='.$iep.'" target="_Blank">'.$qem2.' '.$qem3.'</a>';
                                            echo '<td>'.$kc2['code'];
                                            echo '<td><a href="_viewKpi.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>-';
                                            echo '<td>-';
                                            echo '<td><a href=""><span class="label label-success mr10">YES</span></a>/<a href=""><span class="label label-danger ml10">NO</span></a>';
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