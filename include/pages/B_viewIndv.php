<?PHP

        $ikdc= intval($_GET['id']);
        $incnc= intval($_GET['cn']);
        $idc= intval($_GET['ic']);

      //call Query Table Emp
	  $qDcom= mysql_query("select * from kpidetcom where idKpiDetCom='$ikdc'");
	  $dtDcom = mysql_fetch_array($qDcom);

        $nc= $dtDcom['idCat'];
        $ncnc= $dtDcom['idCatNoCom'];
                                
        $nc2= mysql_query("select * from `kpicat` where idCat='$nc'") or die(mysql_error());
        $cde= mysql_result($nc2, 0, 'code'); //S
        $tle= mysql_result($nc2, 0, 'desc');
                                
        $ncnc2= mysql_query("select * from `catnocom` where idCatNoCom='$ncnc'") or die(mysql_error());
        $cde2= mysql_result($ncnc2, 0, 'code'); //01
        $tle2= mysql_result($ncnc2, 0, 'title'); 

?>
<!-- Start #content -->
<div id=content>
  <div class=content-wrapper>
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->

      <div class=row>
        <!-- Start .row -->
        <div class="col-lg-6 col-md-6">
          <!-- col-lg-6 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title>
                    <i class=en>
                        <img class=user-avatar src=assets/img/speedo1.png >
                    </i> <?PHP echo $tle2; ?><Br> code: <b><?php echo $cde; ?><?php echo $cde2; ?></b></h4>
            </div>
            <div class=panel-body>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class=per5>id 
                    <th class=per30>Description
                    <th class="per5 text-center">Target
                    <th class="per5 text-center">Actual
                    <th class="per5 text-center">Rank
                <tbody>
                    <?PHP
                                $qCom2= mysql_query("SELECT * FROM kpidetcom where idCat='$idc' AND year='$yr' AND vis='0' AND idCatNoCom='$ncnc' AND idSubNoCom>'0' GROUP BY idSubNoCom");
                            
                                    while ($dtCom2= mysql_fetch_assoc($qCom2))
                                
                                    {

                                        $nc= $dtCom2['idCat'];
                                        $ncnc= $dtCom2['idCatNoCom'];
                                        $ncsnc= $dtCom2['idSubNoCom'];
                                
                                        $nc2= mysql_query("select * from `kpicat` where idCat='$nc'") or die(mysql_error());
                                        $cde= mysql_result($nc2, 0, 'code'); //S
                                
                                        $ncnc2= mysql_query("select * from `catnocom` where idCatNoCom='$ncnc'") or die(mysql_error());
                                        $cde2= mysql_result($ncnc2, 0, 'code'); //01
                                        $tle= mysql_result($ncnc2, 0, 'title'); 
                                
                                        $ncsnc2= mysql_query("select * from `catsubnocom` where idSubNoCom='$ncsnc'") or die(mysql_error());
                                        $cde3= mysql_result($ncsnc2, 0, 'code'); //1
                                        $tle2= mysql_result($ncsnc2, 0, 'title');
                                                             
                                            echo '<tr>';
                                            echo '<td>';
                                            echo $cde;
                                            echo $cde2.'.'.$cde3;
                                            echo '<td><a href="">';
                                            echo $tle2;
                                            echo '<td class="text-center">-';
                                            echo '<td class="text-center">-';
                                            echo '<td class="text-center"><img class=user-avatar src=assets/img/trendup.png >';
                                                               
                                    } 
                    ?>
                    </table>           
                </div>
          </div>
          <!-- End .panel -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">

            </div>
       		  <div class=panel-body>
                  <form class="form-horizontal" style="padding-bottom:7px;">
                <div class="form-group">
                  <label class="col-lg-3 col-md-2 col-sm-12 text-left">Title KPI</label>                 
                  <div class="col-lg-8 col-md-8">
                    <p>Reduce Usage budget for ICT devices</p> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->                  
                <div class="form-group">
                  <label class="col-lg-3 col-md-2 col-sm-12 text-left">Description</label>                 
                  <div class="col-lg-8 col-md-8">
                    <p align="justified">Budget propose for ICT in FY 2016 will be reduce and monitoring in monthly, value of reduce per monthly in 5% from total budget divide by month. Budget 1 Year USD 50,000</p> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-3 col-md-2 col-sm-12 text-left">Monitoring</label>                 
                  <div class="col-lg-8 col-md-8">
                    <p>Quarterly</p> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-3 col-md-2 col-sm-12 text-left">Unit KPI</label>                 
                  <div class="col-lg-8 col-md-8">
                    <p>Currency</p> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->
                <div class="form-group">
                  <label class="col-lg-3 col-md-2 col-sm-12 text-left">Status</label>                 
                  <div class="col-lg-8 col-md-8">
                    <p>-</p> 
                  </div>                                   
                </div>
                <!-- End .form-group  -->                      
                  </form>
                </div>                                 
          </div>
          <!-- End .panel -->                  
        </div>
        <!-- col-lg-6 end here -->                    
        <div class="col-lg-6 col-md-6">
          <!-- Start col-lg-6 -->
          <div class="panel panel-teal toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class=panel-heading>
              <h4 class=panel-title><i class=im-bars></i> Reduce Usage budget for ICT devices</h4>
            </div>
            <div class=panel-body>
              <div id="chartContainer" style="width: 100%; height:250px"></div>
            </div>
         </div>
          <!-- End .panel -->
          <div class="panel panel-default plain">
          </div>
          <!-- End .panel -->
        </div>
        <!-- End col-lg-6 -->
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