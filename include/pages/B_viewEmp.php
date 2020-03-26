<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <div class="content-wrapper">
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class="row">
        <!-- Start .row -->
          <!--<div class="col-lg-12 col-md-12">
            <div class="page-header">
                <i class="en-rocket s21" style="margin-bottom:0px;"></i>
                <h4>Individual KPI Dashboard</h4>
            </div>
        </div> -->
        
        <div class="col-lg-3 col-md-3">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border: none;">
              <h4 class="panel-title">GAUGES</h4>
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
        <div class="col-lg-5 col-md-5">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border: none;">
              <h4 class="panel-title">BAR</h4>
            </div>
            <div class="panel-body" style="border-top: 1px solid #e4e9eb;">
              <ul class="skills-bar-container">
                <label style="margin-bottom:5px;">FINANCE</label>
                  <span class="percent" id="fin-individual"></span>
                    <li>
                      <span class="progressbar progressred" id="progress-fin-individual"></span>
                    </li>
  
                <label style="margin-bottom:5px;">STAKEHOLDER</label>
                  <span class="percent" id="stk-individual"></span>
                    <li>
                      <span class="progressbar progressblue" id="progress-stk-individual"></span>
                    </li>
  
                <label style="margin-bottom:5px;">INTERNAL PROCESS</label>
                  <span class="percent" id="ip-individual"></span>
                    <li>
                      <span class="progressbar progresspurple" id="progress-ip-individual"></span>
                    </li>
  
                <label style="margin-bottom:5px;">LEARNING & GROWTH</label>
                  <span class="percent" id="lg-individual"></span>
                    <li>
                      <span class="progressbar progressorange" id="progress-lg-individual"></span>
                    </li>
              </ul>
            </div>             
          </div>
          <!-- End .panel -->                          
        </div>
        <div class="col-lg-4 col-md-4">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain">
            <div class="panel-heading white-bg" style="border: none;">
              <h4 class="panel-title">PROFILE</h4>               
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

      </div>
      <div class="row">
        <!-- Start .row -->

        <div class="col-lg-8 col-md-8">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title>Key Performance Indicators</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable">
                <thead>
                  <tr> 
                    <th>Id.
                    <th>Description
                    <th>Target
                    <th>Actual
                    <th class="text-center">Trend
                    <!-- <th class="text-center"><i class="im-cog s16"></i> -->
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
                                            echo '<td><a href="_viewKpi.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank" >'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            //echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
                                    }
                  ?> 
                        </table>
            </div>
          </div>
          <!-- End .panel -->                          
        </div>
        <!-- col-lg-12 end here -->       
        <div class="col-lg-4 col-md-4">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain panel-closed toggle showControls">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border-bottom: 1px solid #e4e9eb;">
              
              <ul class="chat-ui chat-messages chat-widget">
                <li class=chat-user>
                  <p class=avatar><img src=assets/img/avatars/support.png alt=@support></p>
                  <p class=chat-name>Administrator <span class=chat-time></span></p>
                  <p class=chat-txt>Using this form for your comments!</p>
                  <p class=chat-attach-file></p>
                </li>
              </ul>
            </div>
            <div class="panel-body p0">
              <ul class="chat-ui chat-messages chat-widget">
                <li class=chat-user style="padding: 8px;">
                  <p class=avatar><img src=assets/img/avatars/fm.png alt=@female></p>
                  <p class=chat-name>Sundari Sukoco <span class=chat-time>15 seconds ago</span></p>
                  <p class=chat-txt>Check the last activity in the KPI's.</p>
                  <p class=chat-attach-file></p>
                </li>
                <li class=chat-me style="padding: 10px; background: #f8f8f8;">
                  <p class=avatar><img src=assets/img/avatars/<?php echo $foto; ?> alt=@<?php echo $qem3; ?>></p>
                  <p class=chat-name><?php echo $qem2.' '.$qem3; ?> <span class=chat-time>10 seconds ago</span></p>
                  <p class=chat-txt>Ok i will check it out.</p>
                </li>
                <li class=chat-user style="padding: 8px;">
                  <p class=avatar><img src=assets/img/avatars/fm.png alt=@female></p>
                  <p class=chat-name>Sundari Sukoco <span class=chat-time>now</span></p>
                  <p class=chat-txt>Thank you, have a nice day!</p>
                </li>
              </ul>
            </div>
            <div class="panel-footer white-bg">
              <div class="chat-write chat-widget">
                <form action=# class=form-horizontal role=form>
                  <div class="form-group relative">
                    <textarea name=replymsg id=replymsg class="form-control elastic" rows=1></textarea>
                    <div class="pull-right mt10"><a href=# data-toggle=modal data-target=#myModal3 class="btn btn-primary">Post</a></div>
                  </div>
                  <!-- End .form-group  -->
                </form>
              </div>
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
