<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <div class="content-wrapper">
    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class="row">
        <!-- Start .row -->
        <br>
        <div class="col-lg-12 col-md-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle panel-closed showControls">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border-bottom: 1px solid #e4e9eb;">
                <h4 class=panel-title><i class=en>
                    <?PHP   if ($cnt5 == 0) { $imgs="speedo.png";}
                            else if ($cnt5 <= 20 ) { $imgs="speedo1.png";}
                            else if ($cnt5 <= 35 ) { $imgs="speedo2.png";}
                            else if ($cnt5 <= 45 ) { $imgs="speedo3.png";}
                            else if ($cnt5 <= 50 ) { $imgs="speedo4.png";}
                            else if ($cnt5 <= 55 ) { $imgs="speedo5.png";}
                            else if ($cnt5 <= 65 ) { $imgs="speedo6.png";}
                            else if ($cnt5 <= 75 ) { $imgs="speedo7.png";}
                            else if ($cnt5 <= 85 ) { $imgs="speedo8.png";}
                            else if ($cnt5 <= 95 ) { $imgs="speedo9.png";}
                            else if ($cnt5 <= 1000 ) { $imgs="speedo10.png";}      
                    ?>                    
                    <img class="user-avatar" style="margin-left:10px;" src=assets/img/<?PHP echo $imgs; ?> ></i> 
                    <h5 style="margin-top:23px;"><?PHP echo $qki4.' '.$qki2; ?></h5></h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable">
                <thead>
                  <tr> 
                    <th class="text-center">No.  
                    <th>Date
                    <th>Target <?PHP echo $qku2; ?>
                    <th>Actual <?PHP echo $qku2; ?>
                    <th>Achievment
                    <th>File
                    <th>Remark
                    <!-- <th class="per7 text-center"><i class="im-cog s16"></i> -->
                <tbody>
                    <?PHP 
                    
                        $num = 1;
                        $mkmi= mysql_query("SELECT * FROM monitoring WHERE idMont='$qki9'");

                        $i=0;
    
                          While ($mkmi2= mysql_fetch_assoc($mkmi)) 
                              
                            { 
                                  
                              $mtr= $mkmi2['idMtr'];
                                  
                              $qmkmi= mysql_query("SELECT * FROM monthkpimontindv WHERE idKpiDetIndv='$q' AND idMtr='$mtr'") or die(mysql_error());
                              $qmkmi2= mysql_result($qmkmi, 0, 'target');  
                              $qmkmi3= mysql_result($qmkmi, 0, 'actual');
                              $qmkmi4= mysql_result($qmkmi, 0, 'achiev');
                              $qmkmi5= mysql_result($qmkmi, 0, 'mDate');
                              $qmkmi6= mysql_result($qmkmi, 0, 'remark');

                                if($i%2==0) $class = 'even'; else $class = 'odd';
                                  
                                echo '<tr class="'.$class.'">';
                                echo '<td class="text-center">'.$num;
                                echo '<td>'.$mkmi2['description'];
                                echo '<td>'.number_format($qmkmi2, 1).' '.$qku4;
                                echo '<td>';
                                echo '<span ';
                                // <-- remove this to activated edit target --> echo 'class= "xedit"';
                                echo 'id="'.$qmkmi6.'">'.number_format($qmkmi3, 1).'</span> '.$qku4;
                                echo '<td>'.number_format($qmkmi4, 1).' %';
                                echo '<td><a href=# data-toggle=modal data-target=#myModal3>DOC/PDF</a>';
                                echo '<td>'.$qmkmi6;
                                //echo '<td class="text-center"><a href=# data-toggle=modal data-target=#myModal3><i class="fa-edit s16"></i></a>';
                                
                                  
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
      <div class="row">
        <!-- Start .row -->        
        <?PHP list($hide)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM monthkpimontindv where idKpiDetIndv='$q'")); if ($hide=="0") { } else {?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default plain toggle panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class="panel-title"><h5>Actual VS Target Chart</h5></h4>                
            </div>
            <div class="panel-body">
              <div id="11" style="width: 100%; height:250px"></div>
            </div>
          </div>
          <!-- End .panel -->    
        </div>
        <!-- End col-lg-6 AVT CHART -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default plain toggle panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title><h5>Achievment Chart</h5></h4>
            </div>
            <div class=panel-body>
              <div id="22" style="width: 100%; height:250px"></div>
            </div>
          </div>
          <!-- End .panel -->                      
        </div>
        <!-- End col-lg-6 ACH CHART -->       
      </div>
      <!-- End .row -->
      <div class="row">
        <!-- Start .row -->         

        <div class="col-lg-6 col-md-6">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title><h5>How to meet the KPI</h5></h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable3">
                <thead>
                  <tr> 
                    <th class="per5 text-center">No.
                    <!-- <th>KPI ID -->
                    <th>Action Plan
                    <!-- <th>Modified Date -->
                    <!--<th class="per8 text-center"><i class="im-cog s16"></i>-->
                <tbody> 
                  <?PHP 

                        $qsi= mysql_query("SELECT * FROM strategic WHERE vis='0' AND idKpiDetIndv='$q' ORDER BY idStra ASC");

                        $num = 1;
                        $i=0;
    
                            While ($qsi2= mysql_fetch_assoc($qsi))
                              
                              {
                                  
                                echo '<tr>';
                                echo '<td class="text-center">'.$num;
                                //echo '<td><a href="'.$qsi2['idKpiDetIndv'].'">'.$qsi2['idKpiDetIndv'].'</a>';
                                //echo '<td><a href="'.$qsi2['idKpiDetIndv'].'">'.$qsi2['description'].'</a>';
                                echo '<td>'.$qsi2['description'];
                                //echo '<td>'.$qsi2['sDate'];
                                //echo '<td>'.$qsi2['eDate'];
                                //echo '<td>'.$qsi2['mDate'];
                                //echo '<td class="text-center"><a href="#.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
                                //echo ' | <a href="sys/engine/#.php?kd='.$kc2["idStra"];
                                //echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';

                                $num++;
                              }
                  ?>
 
              </table>
            </div>
          </div>
          <!-- End .panel --> 
          <div class="panel panel-default plain toggle panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <?PHP 
                        
                    $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='$qki7' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
        
                        While ($kc2= mysql_fetch_assoc($kc)) 
                              
                            {

                              $ikdi = $kc2['idKpiDetIndv'];
                                  
                                $sum = mysql_query("SELECT sum(actual) FROM monthkpimontindv WHERE idKpiDetIndv='$ikdi' AND vis='0'") or die(mysql_error()); 
                                while ($row = mysql_fetch_array($sum)) { $mkmi= $row['sum(actual)']; }
                                  
                                if ($mkmi=='') { $mkmi2='0';} else { $mkmi2=$mkmi; }

                                list($tg)=mysql_fetch_array(mysql_query("SELECT SUM(target) FROM `monthkpimontindv` WHERE idKpiDetIndv='$ikdi' AND vis='0'"));                                    
                                  
                                if($tg > 0) { $scr= $mkmi/$tg; }
                                $scr2= number_format($scr * 100, 0);
                                  
                                $wgh= $kc2['weight'];
                                $scr3= $scr2*$wgh/100;
                                  
                                $fscr+= number_format($scr3, 0);
                            }
                                    
                                    if ($fscr <= 0) { $imgs="speedo.png";}
                                    else if ($fscr <= 20 ) { $imgs="speedo1.png";}
                                    else if ($fscr <= 35 ) { $imgs="speedo2.png";}
                                    else if ($fscr <= 45 ) { $imgs="speedo3.png";}
                                    else if ($fscr <= 50 ) { $imgs="speedo4.png";}
                                    else if ($fscr <= 55 ) { $imgs="speedo5.png";}
                                    else if ($fscr <= 65 ) { $imgs="speedo6.png";}
                                    else if ($fscr <= 75 ) { $imgs="speedo7.png";}
                                    else if ($fscr <= 85 ) { $imgs="speedo8.png";}
                                    else if ($fscr <= 95 ) { $imgs="speedo9.png";}
                                    else if ($fscr <= 1000 ) { $imgs="speedo10.png";}
                ?>                
                <h4 class=panel-title><i class=en>                    
                    <img class="user-avatar" style="margin-left:10px;" src=assets/img/<?PHP echo $imgs; ?> ></i>
                    <h5 style="margin-top:23px;"><?PHP echo $qkc2; ?> | <?PHP echo $qsm2.' '.$qsm3; ?></h5></h4>
            </div>
              <div class=panel-body>
                <form class="form-horizontal" style="padding-bottom:7px;">
                    <div class="form-group">
                        <label class="col-sm-2 col-xs-2 text-left" style="margin-bottom:3px;">Code</label>
                        <label class="col-sm-10 col-xs-10 text-left" style="margin-bottom:3px;">Title</label>
                            <div class="col-sm-2 col-xs-2">
                                <p align="justified"><?PHP echo $qki4; ?></p> 
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <p align="justified"><?PHP echo $qki2; ?></p> 
                            </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-2 text-left" style="margin-bottom:3px;">Status</label>
                        <label class="col-sm-4 text-left" style="margin-bottom:3px;">Acknowledge by.</label>
                        <label class="col-sm-6 text-left" style="margin-bottom:3px;">Owned by.</label>
                            <div class="col-sm-2">
                                <p align="justified"><?PHP echo $stak; ?></p> 
                            </div>
                            <div class="col-sm-4">
                                <p align="justified"><?PHP echo $qspv2; ?></p> 
                            </div>
                            <div class="col-sm-6">
                                <p align="justified"><?PHP echo $qem2; ?> <?PHP echo $qem3; ?></p> 
                            </div>                        
                    </div>
                    <!-- End .form-group  -->
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 text-left" style="margin-bottom:3px;">Unit</label>
                        <label class="col-sm-4 text-left" style="margin-bottom:3px;">Monitoring Type</label>
                        <label class="col-sm-6 text-left" style="margin-bottom:3px;">Level</label>
                            <div class="col-sm-2">
                                <p align="justified"><?PHP echo $qku6; ?></p> 
                            </div>
                            <div class="col-sm-4">
                                <p align="justified"><?PHP echo $qku5; ?></p> 
                            </div>
                            <div class="col-sm-6">
                                <p align="justified"><?PHP echo $lvlk; ?></p> 
                            </div>                        
                    </div>
                    <!-- End .form-group  -->
                    <hr>                    
                    <div class="form-group">
                        <label class="col-sm-6 text-left" style="margin-bottom:3px;">Description</label>                 
                            <div class="col-sm-12" style="text-align: justify;">
                                <p><?PHP echo $qki3; ?></p> 
                            </div>                                   
                    </div>
                    <!-- End .form-group  -->
                    <div class="form-group">
                        <label class="col-sm-6 text-left" style="margin-bottom:3px;">Calculation</label>                 
                            <div class="col-sm-12" style="text-align: justify;">
                                <p><?PHP echo $qki15; ?></p> 
                            </div>                                   
                    </div>
                    <!-- End .form-group  -->                    
                    <br>
                    <div class="form-group">
                        <label class="col-sm-6 text-left" style="margin-bottom:3px;">Last Modified</label>                 
                            <div class="col-sm-12" style="text-align: justify;">
                                <p><?PHP echo $qki12; ?></p> 
                            </div>                                   
                    </div>
                    <!-- End .form-group  -->                    

                        <?PHP if($np==$qki5) { ?>
                    <hr>
                    <div class="form-group">
                            <div class="col-sm-4">
                                <a href="_editKpi.php?kd=<?PHP echo $q; ?>&&hdn=1" type=button class="btn btn-xs btn-primary">EDIT</a> 
                            </div>
                    </div>                        
                        <?PHP } else {}  ?>

                    <!-- End .form-group  -->                                        
                </form>
            </div>                                 
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->
        <div class="col-lg-6 col-md-6">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain toggle">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title><h5>Challenges to meet KPI</h5></h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable2">
                <thead>
                  <tr> 
                    <th class="per5 text-center">No.
                    <!-- <th>KPI ID -->
                    <th>Risk Items
                    <th>Mitigation
                    <!-- <th>Modified Date -->
                    <!--<th class="per8 text-center"><i class="im-cog s16"></i>-->
                <tbody> 
                  <?PHP 

                        $qsi= mysql_query("SELECT * FROM risk WHERE vis='0' AND idKpiDetIndv='$q' ORDER BY idRisk ASC");

                        $num = 1;
                        $i=0;
    
                            While ($qsi2= mysql_fetch_assoc($qsi))
                              
                              {
                                  
                                echo '<tr>';
                                echo '<td class="text-center">'.$num;
                                //echo '<td><a href="'.$qsi2['idKpiDetIndv'].'">'.$qsi2['idKpiDetIndv'].'</a>';
                                echo '<td><a href="#">'.$qsi2['description'].'</a>';
                                echo '<td>'.$qsi2['mitigation'];
                                //echo '<td>'.$qsi2['likelihood'];
                                //echo '<td>'.$qsi2['impact'];
                                //echo '<td>'.$qsi2['mDate'];
                                //echo '<td class="text-center"><a href="#php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
                                //echo ' | <a href="sys/engine/#.php?kd='.$kc2["idRisk"];
                                //echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';

                                $num++;
                              }
                  ?> 
              </table>
            </div>
          </div>
          <!-- End .panel --> 
            <div class="panel panel-default plain toggle">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border-bottom: 1px solid #e4e9eb;">
              
              <ul class="chat-ui chat-messages chat-widget">
                <li class=chat-user>
                  <p class=avatar></p>
                  <p class=chat-name>Box of Comments <span class=chat-time></span></p>
                  <p class=chat-txt>Using this form for your comments!</p>
                  <p class=chat-attach-file></p>
                </li>
              </ul>
            </div>
            <div class="panel-body p0">
              <ul class="chat-ui chat-messages chat-widget" id="responds">
                  <?php
                    
                    //mysqli connection
                    require('sys/db_con/db3.php'); 
        
                    //MySQL query
                    $results = $mysqli->query("SELECT * FROM commkpi WHERE idKpiDetIndv=$q AND vis=0");
                    //get all records from add_delete_record table
                    while($row = $results->fetch_assoc())
                        
                    {
                        $ie= $row['idEmp'];
                        $iu= $row['idUser'];
                        
                        $qemp = $mysqli->query("SELECT fName, lName, avatar FROM emp WHERE idUser=$ie");
                        //get all records from add_delete_record table
                        while($row_qemp = $qemp->fetch_assoc()) { $qemp2= $row_qemp['fName']; $qemp3= $row_qemp['lName']; $qemp4= $row_qemp['avatar']; }
                        
                        if($qemp4=='') {$qemp4="11.png";} else {}
                        if($ie == $np) {$cht ="chat-me";} else {$cht ="chat-user";} 
                        
                        echo '<li id="item_'.$row["idKpiComm"].'" class='.$cht.' style="padding: 8px; border-bottom: 1px solid #e4e9eb;">';
                        echo '<p class=avatar style="margin-left: 8px;"><img src=assets/img/avatars/'.$qemp4.' ></p>';
                        echo '<p class=chat-name>'.$qemp2.' '.$qemp3.'<span class=chat-time>';
                        
                        if($ie == $np) {
                        echo '<a href="#" class="del_button" id="del-'.$row["idKpiComm"].'"><i class="im-close s10"></i></a>';
                        } else {}
                        echo '</span></p><p class=chat-txt align=justify>'.$row["content"];
                        echo '<Br><b><font color=#d4d4d4>'.$row["mDate"].'</font></b></p></li>';
                        
                    }

                    //close db connection
                    $mysqli->close();
                ?>

              </ul>
              <ul class="chat-ui chat-messages chat-widget">
                <li class="chat-user text-center" style="padding: 0px;">
                  <img src=assets/img/loading2.gif width="60" height="60" id="LoadingImage"style="display:none; padding:15px;" >
                </li>
              </ul>
            </div>
            <div class="panel-footer white-bg">
              <div class="chat-write chat-widget">
                <form action=# class=form-horizontal role=form>
                  <div class="form-group relative">
                    <textarea name="content_txt" id="contentText" class="form-control elastic" rows=2></textarea>
                    <input type="hidden" name="content_id" id="contentId" value="<?php echo $np; ?>"/>
                    <input type="hidden" name="content_user" id="contentUser" value="<?php echo $qki5; ?>"/>
                    <input type="hidden" name="content_kpi" id="contentKpi" value="<?php echo $q; ?>"/>
                    <div class="pull-right mt10"><a id="FormSubmit" class="btn btn-primary">Post</a></div>
                  </div>
                  <!-- End .form-group  -->
                </form>
              </div>
            </div>
          </div>
          <!-- End .panel -->                 
        </div>
        <!-- col-lg-12 end here -->       
        <?PHP } ?>

        <div class="col-lg-6 col-md-6">
          <!-- Start col-lg-6 -->
    
        </div>
        <!-- End col-lg-12 GRAPH CHART -->
        <div class="col-lg-6 col-md-6">
          <!-- col-lg-12 start here -->
              
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