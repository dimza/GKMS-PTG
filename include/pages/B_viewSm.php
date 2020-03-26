<!-- Start #content -->
<div id="content">
  <div class="content-wrapper">
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class="row">
        <!-- Start .row -->
       
        <div class="col-lg-4 col-md-4">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelMove panelClose">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border: none;">
              <h4 class="panel-title"></h4>
            </div>
            <div class="panel-body" style="border-top: 1px solid #e4e9eb;">
              <ul class="skills-bar-container">
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
        <div class="col-lg-4 col-md-4">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelMove panelClose">
            <div class="panel-heading white-bg" style="border: none;">
              <h4 class="panel-title"></h4>               
            </div>
            <aside id="profile">
            
              <img src="assets/img/avatars/<?php echo $foto; ?>"/>
                <h2><?php echo $qem2.' '.$qem3; ?></h2>
                <p><?php echo $qpos2; ?></p>
                <!-- <a class="btn">Ask me!</a> -->
            </aside>

          </div>
          <!-- End .panel -->                          
        </div>        
        <div class="col-lg-4 col-md-4">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelMove panelClose">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border: none;">
              <h4 class="panel-title"></h4>
            </div>
            <div class="panel-body" style="border-top: 1px solid #e4e9eb;">
                <div class="text-center">            
                  <canvas width="220" height="220" data-type="canv-gauge" data-title="<?php echo $qem2; ?>" id="gauge2"
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
              <table class="table display" id="datatable">
                <thead>
                  <tr> 
                    <th class=per5>Id.
                    <th class="per65">Description
                    <th class=per8>Target
                    <th class=per8>Actual
                    <th class="per6 text-center">Trend
                    <th class="per8 text-center"><i class="im-cog s16"></i>
                            <tbody> 
                            <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE year='$yr' AND vis='0' AND idEmp='$qem9' ORDER BY code ASC");
    
                        While ($kc2= mysql_fetch_assoc($kc)) 
                              
                                    {
                                  
                                        $ikdi = $kc2['idKpiDetIndv'];
                                        $ic = $kc2['idCat'];
                                        $iu = $kc2['idUnit'];

                                        $ictg= mysql_query("select * from `kpicat` where idCat='$ic'") or die(mysql_error());
                                        $ictg2= mysql_result($ictg, 0, 'code');
                                  
                                        $imt= mysql_query("select * from `kpiunit` where idUnit='$iu'") or die(mysql_error());
                                        $imt2= mysql_result($imt, 0, 'code');
                                        $imt3= mysql_result($imt, 0, 'symbol');

                                        list($trg)=mysql_fetch_array(mysql_query("select SUM(target) from `monthkpimontindv` where idKpiDetIndv='$ikdi'"));
                                  
                                        $sum = mysql_query("SELECT sum(actual) FROM monthkpimontindv WHERE idKpiDetIndv='$ikdi'") or die(mysql_error());
                                        while ($row = mysql_fetch_array($sum)) { $mkmi= $row['sum(actual)']; }
                                  
                                        if ($mkmi=='') { $mkmi2='0';} else { $mkmi2=$mkmi; }
                                  
                                        list($tg)=mysql_fetch_array(mysql_query("select SUM(target) from `monthkpimontindv` where idKpiDetIndv='$ikdi'"));

                                        $scr= $mkmi/$tg;
                                        $scr2= number_format($scr * 100, 0);
                                  
                                        $wgh= $kc2['weight'];
                                        $scr3= $scr2*$wgh/100;
                                  
                                        $trd= mysql_query("select * from `monthkpimontindv` where idKpiDetIndv='$ikdi' order by idMontIndv desc limit 1") or die(mysql_error());
                                        $trd2= mysql_result($trd, 0, 'actual');
                                  
                                        $trd3= mysql_query("select * from `monthkpimontindv` where idKpiDetIndv='$ikdi' order by idMontIndv desc limit 1,1") or die(mysql_error());
                                        $trd4= mysql_result($trd3, 0, 'actual');
                                  
                                        if ($trd2 > $trd4 ) { $trd5="trendup.png"; }
                                        else if ($trd2 < $trd4 ) { $trd5="trenddown.png"; }
                                        else if ($trd2 == $trd4 ) { $trd5="trendnet.png"; }
                                  
                                            echo '<tr>';
                                            echo '<td>'.$kc2['code'];
                                            echo '<td><a href="_viewKpi.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a> | ';
                                            echo '<a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                            echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';
                                    }
                  ?> 
                        </table>
            </div>
          </div>
          <!-- End .panel -->                          
        </div>
        <!-- col-lg-12 end here -->       

        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title>STRATEGIC INITIATIVES</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable2">
                <thead>
                  <tr> 
                    <th class=per5>No.
                    <th class=per60>Description
                    <!--<th class=per5>Period-->
                    <th class=per8>Start Date
                    <th class=per8>End Date
                    <th class="per8 text-center"><i class="im-cog s16"></i>
                <tbody> 
                  <?PHP $qsi= mysql_query("SELECT * FROM strategic WHERE vis='0' AND idEmp='$np' ORDER BY idStra ASC");

                        $num = 1;
                        $i=0;
    
                            While ($qsi2= mysql_fetch_assoc($qsi))
                              
                              {
                                  
                                echo '<tr>';
                                echo '<td class="text-center">'.$num;
                                echo '<td>'.$qsi2['description'];
                                echo '<td>'.$qsi2['sDate'];
                                echo '<td>'.$qsi2['eDate'];
                                echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';

                                $num++;
                              }
                  ?> 
              </table>
            </div>
          </div>
          <!-- End .panel -->                          
        </div>
        <!-- col-lg-12 end here -->

        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title>RISK MANAGEMENT</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable3">
                <thead>
                  <tr> 
                    <th class=per5>Id.
                    <th class=per60>Description
                    <th class=per8>Likelihood
                    <th class=per8>Impact
                    <th class="per8 text-center"><i class="im-cog s16"></i>
                <tbody> 
                  <?PHP $qr= mysql_query("SELECT * FROM risk WHERE vis='0' AND idEmp='$np' ORDER BY idRisk ASC");

                        $num = 1;
                        $i=0;
    
                            While ($qr2= mysql_fetch_assoc($qr))
                              
                              {
                                  
                                echo '<tr>';
                                echo '<td class="text-center">'.$num;
                                echo '<td>'.$qr2['description'];
                                echo '<td>'.$qr2['likelihood'];
                                echo '<td>'.$qr2['impact'];
                                echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';

                                $num++;
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
