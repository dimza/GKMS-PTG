<!-- Start #content -->
<div id="content" style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper"><br>
    <?PHP //include 'include/misc/headPTG.php'; ?>
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->

      <div class="row">
      <!-- Start .row -->          
          
        <!-- col-lg-8 start here -->
        <div class="col-lg-8 col-md-8">

            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a ID KPI. <a href="sys/engine/delKpi.php?kd=<?PHP echo $var2 ?>&&clt=<?PHP echo $var ?>&&dt=<?PHP echo $today ?>&&pg=<?PHP echo $np ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a ID KPI.
            </div>             
            
            <?PHP break; default: }?>

            <!-- col-lg-12 Main Content of Perspective KPI View start here -->
            <?PHP list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv WHERE idEmp='$var' and vis='0'")); if ($lg=="0") { ?>
                <!-- Hide Note When KPI Doesn't Filled start here -->    
                <div class="bs-callout bs-callout-info fade in" style="margin-top:0px;">
                    <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
                    <p>A key performance indicator (KPI) is a business metric used to evaluate factors that are crucial to the success of an organization. KPIs differ per organization; business KPIs may be net revenue or a customer loyalty metric, while government might consider unemployment rates.</p>
                </div>
                <!-- Hide Note When KPI Doesn't Filled end here -->
            <?PHP } else { ?>

            <!-- Finance GROUP Start Here -->
            <?PHP list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv WHERE idCat='1' AND idEmp='$var' and vis='0'")); if ($lg=="0") { } else { ?>            
                <div class="panel panel-default plain toggle panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading white-bg">
                        <?PHP  $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='1' AND year='$yr' AND vis='0' AND idEmp='$var' ORDER BY code ASC");
		
                                While ($kc2= mysql_fetch_assoc($kc)) 
                              
                                {
                                  
                                    $ikdi = $kc2['idKpiDetIndv'];
                                  
                                    $sum = mysql_query("SELECT sum(actual) FROM monthkpimontindv WHERE idKpiDetIndv='$ikdi'") or die(mysql_error());
                                    while ($row = mysql_fetch_array($sum)) { $mkmi= $row['sum(actual)']; }
                                  
                                    if ($mkmi=='') { $mkmi2='0';} else { $mkmi2=$mkmi; }

                                    list($tg)=mysql_fetch_array(mysql_query("SELECT SUM(target) FROM `monthkpimontindv` WHERE idKpiDetIndv='$ikdi' AND vis='0'"));

					                if($tg > 0) { $scr= $mkmi/$tg; }
                                    $scr2= number_format($scr * 100, 0);
                                  
                                    $wgh= $kc2['weight'];
                                    $scr3= $scr2*$wgh/100;
                                  
                                    $fscr+= number_format($scr3, 0);
                                    
                                    $prn= 100;
                                    $pr2= $qcat2/$prn;
                                    $fscr11= $fscr*$pr2;
                                    //$fscr5= number_format($fscr4, 1);
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

                                $qkc= mysql_query("select * from `kpicat` where idCat='1'") or die(mysql_error());
                                $qkc2= mysql_result($qkc, 0, 'wIndv');
                        ?>                
                        <h4 class=panel-title><i class=en><img class=user-avatar src=assets/img/<?PHP echo $imgs; ?>></i> 
                            <h5 style="margin-top:10px;">FINANCE</h5> Result: <?PHP echo $fscr11; ?>% of <?PHP echo $qcat2; ?>%
                        </h4>
                    </div>
                    <div class=panel-body>
                        <table class="table table-hover" id="fin">
                            <thead>
                                    <?php include 'include/insert/tabel04.php';?>
                            <tbody>                   
                                <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='1' AND year='$yr' AND vis='0' AND idEmp='$var' ORDER BY code ASC");
		
                                    While ($kc2= mysql_fetch_assoc($kc)) {
                                  
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

                                        if($tg > 0) { $scr= $mkmi/$tg; }
                                        $scr2= number_format($scr * 100, 0);
                                  
                                        $wgh= $kc2['weight'];
                                        $scr3= $scr2*$wgh/100;
                                  
                                        //fix this with varibale not == NULL
						      $trd= mysql_query("SELECT * FROM `logmont` WHERE idKpiDetIndv='$ikdi' ORDER BY idLogMont DESC LIMIT 1");
							  While ($trd_row= mysql_fetch_assoc($trd)) { $trd2 = $trd_row['actual']; }

						      $trd3= mysql_query("SELECT * FROM `logmont` WHERE idKpiDetIndv='$ikdi' ORDER BY idLogMont DESC LIMIT 1,1");
							  While ($trd_row2= mysql_fetch_assoc($trd3)) { $trd4 = $trd_row2['actual']; }
                                  
                                        if ($trd2 > $trd4 ) { $trd5="trendup.png"; }
                                        else if ($trd2 < $trd4 ) { $trd5="trenddown.png"; }
                                        else if ($trd2 == $trd4 ) { $trd5="trendnet.png"; }
                                  
                                            echo '<tr>';
                                            echo '<td>'.$kc2['code'];
                                            echo '<td><a href="_viewKpi2.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="fin-w">'.$kc2['weight'];
                                            echo '<td class="fin-s">'.number_format($scr3, 0);
                                            //echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            //echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
                                            //echo ' | <a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                            //echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';
                                    }
					           ?>
                        </table>
                            <script language="javascript" type="text/javascript">
                    
                                var tds2 = document.getElementById('fin').getElementsByTagName('td');
                                var sum3 = 0;
                                var sum4 = 0;
                        
                                    for(var k = 0; k < tds2.length; k ++) { if(tds2[k].className == 'fin-w') {
                    
                                        sum3 += isNaN(tds2[k].innerHTML) ? 0 : parseInt(tds2[k].innerHTML); }
                                    }
                    
                                    for(var l = 0; l < tds2.length; l ++) { if(tds2[l].className == 'fin-s') {
                    
                                        sum4 += isNaN(tds2[l].innerHTML) ? 0 : parseInt(tds2[l].innerHTML); }
                                    }
            
                                document.getElementById('fin').innerHTML += '<tr style="background-color:rgb(250, 250, 250);"><td></td><td></td><td></td><td><b>TOTAL</b></td><td>' + sum3 + '</td><td>' + sum4 + '</td></tr>';
                    
                            </script>
                    </div>
                    <!-- End .panel -->
                </div>            
            <!-- Finance GROUP End Here -->
            
            <!-- Stakeholder GROUP Start Here -->
            <?PHP } list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv where idCat='2' and idEmp='$var' and vis='0'")); if ($lg=="0") { } else { ?>                
                <div class="panel panel-default plain toggle panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading white-bg min">
					   <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='2' AND year='$yr' AND vis='0' AND idEmp='$var' ORDER BY code ASC");
		
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
                                  
                                    $fscr2+= number_format($scr3, 0);
                                    
                                    $prn= 100;
                                    $pr3= $qcat6/$prn;
                                    $fscr12= $fscr2*$pr3;
                                    //$fscr5= number_format($fscr4, 1);
                                    
							    }
                                    
                                    if ($fscr2 <= 0) { $imgs="speedo.png";}
                                    else if ($fscr2 <= 20 ) { $imgs="speedo1.png";}
                                    else if ($fscr2 <= 35 ) { $imgs="speedo2.png";}
                                    else if ($fscr2 <= 45 ) { $imgs="speedo3.png";}
                                    else if ($fscr2 <= 50 ) { $imgs="speedo4.png";}
                                    else if ($fscr2 <= 55 ) { $imgs="speedo5.png";}
                                    else if ($fscr2 <= 65 ) { $imgs="speedo6.png";}
                                    else if ($fscr2 <= 75 ) { $imgs="speedo7.png";}
                                    else if ($fscr2 <= 85 ) { $imgs="speedo8.png";}
                                    else if ($fscr2 <= 95 ) { $imgs="speedo9.png";}
                                    else if ($fscr2 <= 1000 ) { $imgs="speedo10.png";}

                                $qkc= mysql_query("select * from `kpicat` where idCat='2'") or die(mysql_error());
                                $qkc2= mysql_result($qkc, 0, 'wIndv');
                        ?>                
                        <h4 class=panel-title><i class=en><img class=user-avatar src=assets/img/<?PHP echo $imgs; ?> ></i> 
                            <h5 style="margin-top:10px;">STAKEHOLDERS</h5> Result: <?PHP echo $fscr12; ?>% of <?PHP echo $qcat6; ?>%
                        </h4>
                    </div>
                    <div class=panel-body>
                        <table class="table table-hover" id="sta">
                            <thead>
                                    <?php include 'include/insert/tabel04.php';?>
                            <tbody> 
                            <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='2' AND  year='$yr' AND vis='0' AND idEmp='$var' ORDER BY code ASC");
		
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

                                        if($tg > 0) { $scr= $mkmi/$tg; }
                                        $scr2= number_format($scr * 100, 0);
                                  
                                        $wgh= $kc2['weight'];
                                        $scr3= $scr2*$wgh/100;
                                  
                                        //fix this with varibale not == NULL

						$trd= mysql_query("SELECT * FROM `logmont` WHERE idKpiDetIndv='$ikdi' ORDER BY idLogMont DESC LIMIT 1");
							While ($trd_row= mysql_fetch_assoc($trd)) { $trd2 = $trd_row['actual']; }

						$trd3= mysql_query("SELECT * FROM `logmont` WHERE idKpiDetIndv='$ikdi' ORDER BY idLogMont DESC LIMIT 1,1");
							While ($trd_row2= mysql_fetch_assoc($trd3)) { $trd4 = $trd_row2['actual']; }

                                  
                                        if ($trd2 > $trd4 ) { $trd5="trendup.png"; }
                                        else if ($trd2 < $trd4 ) { $trd5="trenddown.png"; }
                                        else if ($trd2 == $trd4 ) { $trd5="trendnet.png"; }
                                  
                                            echo '<tr>';
                                            echo '<td>'.$kc2['code'];
								            echo '<td><a href="_viewKpi2.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="sta-w">'.$kc2['weight'];
                                            echo '<td class="sta-s">'.number_format($scr3, 0);
                                            //echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            //echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
                                            //echo ' | <a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                            //echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';
                                    }
					        ?> 
                        </table>
                            <script language="javascript" type="text/javascript">
                    
                                var tds3 = document.getElementById('sta').getElementsByTagName('td');
                                var sum5 = 0;
                                var sum6 = 0;
                        
                                    for(var m = 0; m < tds3.length; m ++) { if(tds3[m].className == 'sta-w') {
                    
                                        sum5 += isNaN(tds3[m].innerHTML) ? 0 : parseInt(tds3[m].innerHTML); }
                                    }
                    
                                    for(var n = 0; n < tds3.length; n ++) { if(tds3[n].className == 'sta-s') {
                    
                                        sum6 += isNaN(tds3[n].innerHTML) ? 0 : parseInt(tds3[n].innerHTML); }
                                    }
            
                                document.getElementById('sta').innerHTML += '<tr style="background-color:rgb(250, 250, 250);"><td></td><td></td><td></td><td><b>TOTAL</b></td><td>' + sum5 + '</td><td>' + sum6 + '</td></tr>';                
                            </script>
                    </div>
                    <!-- End .panel -->
                </div>
            <!-- Stakeholder GROUP End Here -->

            <!-- Internal Process GROUP Start Here -->
            <?PHP } list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv where idCat='3' and idEmp='$var' and vis='0'")); if ($lg=="0") { } else { ?>                
                <div class="panel panel-default plain toggle panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading white-bg min">
					   <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='3' AND year='$yr' AND vis='0' AND idEmp='$var' ORDER BY code ASC");
		
						        While ($kc2= mysql_fetch_assoc($kc)) 
                              
                                {
                                  
                                    $ikdi = $kc2['idKpiDetIndv'];
                                    $ic = $kc2['idCat'];
                                    $iu = $kc2['idUnit'];
                                  
                                    $sum = mysql_query("SELECT sum(actual) FROM monthkpimontindv WHERE idKpiDetIndv='$ikdi'") or die(mysql_error());
                                    while ($row = mysql_fetch_array($sum)) { $mkmi= $row['sum(actual)']; }
                                  
                                    if ($mkmi=='') { $mkmi2='0';} else { $mkmi2=$mkmi; }
                                  
                                    list($tg)=mysql_fetch_array(mysql_query("SELECT SUM(target) FROM `monthkpimontindv` WHERE idKpiDetIndv='$ikdi' AND vis='0'"));

					                if($tg > 0) { $scr= $mkmi/$tg; }
                                    $scr2= number_format($scr * 100, 0);
                                  
                                    $wgh= $kc2['weight'];
                                    $scr3= $scr2*$wgh/100;
                                  
                                    $fscr3+= number_format($scr3, 0);
                                    
                                    $prn= 100;
                                    $pr= $qcat10/$prn;
                                    $fscr10= $fscr3*$pr;
                                    //$fscr5= number_format($fscr4, 1);
							    }
                                    
                                    if ($fscr3 <= 0) { $imgs="speedo.png";}
                                    else if ($fscr3 <= 20 ) { $imgs="speedo1.png";}
                                    else if ($fscr3 <= 35 ) { $imgs="speedo2.png";}
                                    else if ($fscr3 <= 45 ) { $imgs="speedo3.png";}
                                    else if ($fscr3 <= 50 ) { $imgs="speedo4.png";}
                                    else if ($fscr3 <= 55 ) { $imgs="speedo5.png";}
                                    else if ($fscr3 <= 65 ) { $imgs="speedo6.png";}
                                    else if ($fscr3 <= 75 ) { $imgs="speedo7.png";}
                                    else if ($fscr3 <= 85 ) { $imgs="speedo8.png";}
                                    else if ($fscr3 <= 95 ) { $imgs="speedo9.png";}
                                    else if ($fscr3 <= 1000 ) { $imgs="speedo10.png";}

                                $qkc= mysql_query("select * from `kpicat` where idCat='3'") or die(mysql_error());
                                $qkc2= mysql_result($qkc, 0, 'wIndv');
                        ?>                
                        <h4 class=panel-title><i class=en><img class=user-avatar src=assets/img/<?PHP echo $imgs; ?> ></i> 
                            <h5 style="margin-top:10px;">INTERNAL PROCESS </h5> Result: <?PHP echo $fscr10; ?>% of <?PHP echo $qcat10; ?>%
                        </h4>
                    </div>
                    <div class=panel-body>
                        <table class="table table-hover" id="int">
                                    <?php include 'include/insert/tabel04.php';?>
                            <tbody>
                                <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='3' AND year='$yr' AND vis='0' AND idEmp='$var' ORDER BY code ASC");
        
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

                                        if($tg > 0) { $scr= $mkmi/$tg; }
                                        $scr2= number_format($scr * 100, 0);
                                  
                                        $wgh= $kc2['weight'];
                                        $scr3= $scr2*$wgh/100;
                                  
                                        //fix this with varibale not == NULL
						$trd= mysql_query("SELECT * FROM `logmont` WHERE idKpiDetIndv='$ikdi' ORDER BY idLogMont DESC LIMIT 1");
							While ($trd_row= mysql_fetch_assoc($trd)) { $trd2 = $trd_row['actual']; }

						$trd3= mysql_query("SELECT * FROM `logmont` WHERE idKpiDetIndv='$ikdi' ORDER BY idLogMont DESC LIMIT 1,1");
							While ($trd_row2= mysql_fetch_assoc($trd3)) { $trd4 = $trd_row2['actual']; }
                                  
                                        if ($trd2 > $trd4 ) { $trd5="trendup.png"; }
                                        else if ($trd2 < $trd4 ) { $trd5="trenddown.png"; }
                                        else if ($trd2 == $trd4 ) { $trd5="trendnet.png"; }
                                  
                                            echo '<tr>';
                                            echo '<td>'.$kc2['code'];
                                            echo '<td><a href="_viewKpi2.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="int-w">'.$kc2['weight'];
                                            echo '<td class="int-s">'.number_format($scr3, 0);
                                            //echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            //echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
                                            //echo ' | <a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                            //echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';
                                    }
                                ?>
                        </table>
                        
                            <script language="javascript" type="text/javascript">
                    
                                var tds4 = document.getElementById('int').getElementsByTagName('td');
                                var sum6 = 0;
                                var sum7 = 0;
                        
                                    for(var o = 0; o < tds4.length; o ++) { if(tds4[o].className == 'int-w') {
                    
                                        sum6 += isNaN(tds4[o].innerHTML) ? 0 : parseInt(tds4[o].innerHTML); }
                                    }
                    
                                    for(var p = 0; p < tds4.length; p ++) { if(tds4[p].className == 'int-s') {
                    
                                        sum7 += isNaN(tds4[p].innerHTML) ? 0 : parseInt(tds4[p].innerHTML); }
                                    }
            
                                document.getElementById('int').innerHTML += '<tr style="background-color:rgb(250, 250, 250);"><td></td><td></td><td></td><td><b>TOTAL</b></td><td>' + sum6 + '</td><td>' + sum7 + '</td></tr>'; 
                            </script>                            
                    </div>
                </div>
            <!-- Internal Process GROUP End Here -->
            
            <!-- Learning Growth GROUP Start Here -->
            <?PHP } list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv WHERE idCat='4' AND idEmp='$var' and vis='0'")); if ($lg=="0") { } else { ?>
                <div class="panel panel-default plain toggle panelRefresh">
                    <!-- Start .panel -->
                        <div class="panel-heading white-bg min">
					        <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='4' AND year='$yr' AND vis='0' AND idEmp='$var' ORDER BY code ASC");
		
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
                                  
                                        $fscr4+= number_format($scr3, 0);
                                        
                                        $prn= 100;
                                        $pr4= $qcat10/$prn;
                                        $fscr13= $fscr4*$pr4;
                                        //$fscr5= number_format($fscr4, 1);                                        
                                        
							        }
                                    
                                        if ($fscr4 <= 0) { $imgs="speedo.png";}
                                        else if ($fscr4 <= 20 ) { $imgs="speedo1.png";}
                                        else if ($fscr4 <= 35 ) { $imgs="speedo2.png";}
                                        else if ($fscr4 <= 45 ) { $imgs="speedo3.png";}
                                        else if ($fscr4 <= 50 ) { $imgs="speedo4.png";}
                                        else if ($fscr4 <= 55 ) { $imgs="speedo5.png";}
                                        else if ($fscr4 <= 65 ) { $imgs="speedo6.png";}
                                        else if ($fscr4 <= 75 ) { $imgs="speedo7.png";}
                                        else if ($fscr4 <= 85 ) { $imgs="speedo8.png";}
                                        else if ($fscr4 <= 95 ) { $imgs="speedo9.png";}
                                        else if ($fscr4 <= 1000 ) { $imgs="speedo10.png";}

                                    $qkc= mysql_query("select * from `kpicat` where idCat='4'") or die(mysql_error());
                                    $qkc2= mysql_result($qkc, 0, 'wIndv');
                            ?>
                            <h4 class=panel-title><i class=en><img class=user-avatar src=assets/img/<?PHP echo $imgs; ?> ></i> 
                                <h5 style="margin-top:10px;">LEARNING & GROWTH</h5> Result: <?PHP echo $fscr13; ?>% of <?PHP echo $qcat10; ?>%
                            </h4>
                        </div>
                        <div class=panel-body>
                            <table class="table table-hover" id="countit">
                                <thead>
                                    <?php include 'include/insert/tabel04.php';?>
                                <tbody>
					                <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='4' AND year='$yr' AND vis='0' AND idEmp='$var' ORDER BY code ASC");
		
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

                                        if($tg > 0) { $scr= $mkmi/$tg; }
                                        $scr2= number_format($scr * 100, 0);
                                  
                                        $wgh= $kc2['weight'];
                                        $scr3= $scr2*$wgh/100;
                                  
                                        //fix this with varibale not == NULL
						$trd= mysql_query("SELECT * FROM `logmont` WHERE idKpiDetIndv='$ikdi' ORDER BY idLogMont DESC LIMIT 1");
							While ($trd_row= mysql_fetch_assoc($trd)) { $trd2 = $trd_row['actual']; }

						$trd3= mysql_query("SELECT * FROM `logmont` WHERE idKpiDetIndv='$ikdi' ORDER BY idLogMont DESC LIMIT 1,1");
							While ($trd_row2= mysql_fetch_assoc($trd3)) { $trd4 = $trd_row2['actual']; }
                                  
                                        if ($trd2 > $trd4 ) { $trd5="trendup.png"; }
                                        else if ($trd2 < $trd4 ) { $trd5="trenddown.png"; }
                                        else if ($trd2 == $trd4 ) { $trd5="trendnet.png"; }
                                  
                                            echo '<tr>';
                                            echo '<td>'.$kc2['code'];
                                            echo '<td><a href="_viewKpi2.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="count-me2">'.$kc2['weight'];
                                            echo '<td class="count-me">'.number_format($scr3, 0);
                                            //echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            //echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'" target="_Blank"><i class="fa-edit s16"></i></a>';
                                            //echo ' | <a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                            //echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';
                                    }

					                ?> 
                            </table>
                                <script language="javascript" type="text/javascript">
                    
                                    var tds = document.getElementById('countit').getElementsByTagName('td');
                                    var sum = 0;
                                    var sum2 = 0;
                        
                                        for(var i = 0; i < tds.length; i ++) { if(tds[i].className == 'count-me') {
                    
                                            sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML); }
                                        }
                    
                                        for(var j = 0; j < tds.length; j ++) { if(tds[j].className == 'count-me2') {
                    
                                            sum2 += isNaN(tds[j].innerHTML) ? 0 : parseInt(tds[j].innerHTML); }
                                        }
            
                                    document.getElementById('countit').innerHTML += '<tr style="background-color:rgb(250, 250, 250);"><td></td><td></td><td></td><td><b>TOTAL</b></td><td>' + sum2 + '</td><td>' + sum + '</td></tr>';
                                </script>
                        </div>
                </div>
            <!-- Learning Growth GROUP End Here -->
            
            <?PHP } } ?>
        </div>
        <!-- col-lg-8 KPI List end here -->

        <!-- col-lg-4 KPI List start here -->
        <div class="col-lg-4 col-md-4">
          <div class="panel panel-default plain toggle">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <ul class="chat-ui chat-messages chat-widget">
                <li class=chat-user>
                  <p class=avatar><img src=assets/img/avatars/<?php echo $foto; ?>></p>
                  <p class=chat-name><?php echo $qem2.' '.$qem3; ?><span class=chat-time></span></p>
                  <p class=chat-txt><?php echo $qpos2; ?></p>
                  <p class=chat-attach-file></p>
                </li>
              </ul>
            </div>
            <div class="panel-body">
                <div class="text-center">
                  <?PHP $fscr14= $fscr10+$fscr11+$fscr12+$fscr13; ?>
                  <canvas width="220" height="220" data-type="canv-gauge" data-title="" id="gauge2"
                           data-onready="setInterval( function() { Gauge.Collection.get('gauge2').setValue(<?PHP echo $fscr14; ?>);}, 2000);"></canvas>


                </div>
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
                    $results = $mysqli->query("SELECT * FROM commindv WHERE idUser=$var AND vis=0");
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
                        
                        echo '<li id="item_'.$row["idIndvComm"].'" class='.$cht.' style="padding: 8px; border-bottom: 1px solid #e4e9eb;">';
                        echo '<p class=avatar style="margin-left: 8px;"><img src=assets/img/avatars/'.$qemp4.' ></p>';
                        echo '<p class=chat-name>'.$qemp2.' '.$qemp3.'<span class=chat-time>';
                        
                        if($ie == $np) {
                        echo '<a href="#" class="del_button" id="del-'.$row["idIndvComm"].'"><i class="im-close s10"></i></a>';
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
                    <input type="hidden" name="content_user" id="contentUser" value="<?php echo $var; ?>"/>
                    <div class="pull-right mt10"><a id="FormSubmit" class="btn btn-primary">Post</a></div>
                  </div>
                  <!-- End .form-group  -->
                </form>
              </div>
            </div>
          </div>
          <!-- End .panel -->
            
        </div>
        <!-- col-lg-4 KPI List end here -->
          
      </div>    
    </div>
  </div>
</div>
