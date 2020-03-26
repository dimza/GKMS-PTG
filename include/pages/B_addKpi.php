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
    <?PHP include 'include/misc/headPTG.php'; ?>
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <div class="col-lg-12 col-md-12">

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
            <?PHP list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv WHERE idEmp='$np' AND vis='0'")); if ($lg=="0") { ?>
                <!-- Hide Note When KPI Doesn't Filled start here -->    
                <div class="bs-callout bs-callout-info fade in">
                    <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
                    <p>A key performance indicator (KPI) is a business metric used to evaluate factors that are crucial to the success of an organization. KPIs differ per organization; business KPIs may be net revenue or a customer loyalty metric, while government might consider unemployment rates.</p>
                </div>
                <!-- Hide Note When KPI Doesn't Filled end here -->
            <?PHP } else { ?>

            <?PHP list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv WHERE idCat='1' AND idEmp='$np' AND vis='0'")); if ($lg=="0") { } else { ?>            
                <div class="panel panel-default plain toggle panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading white-bg">
                        <?PHP  $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='1' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
		
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
                                <?php include 'include/insert/tabel02.php';?> 
                            <tbody>                   
                                <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='1' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
		
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
                                        
                                        $sw1 = mysql_query("SELECT sum(weight) FROM kpidetindv WHERE idCat='1' and idEmp='$np' and vis='0'") or die(mysql_error());
                                        while ($rw1 = mysql_fetch_array($sw1)) { $wgth1= $rw1['sum(weight)']; }
                                            
                                            $rwg1= 100 - $wgth1;
                                  
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
                                            echo '<td><a href="_viewKpi.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="fin-w">'.$kc2['weight'];
                                            echo '<td class="fin-s">'.number_format($scr3, 0);
                                            echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'&&hdn=1" target="_Blank"><i class="fa-edit s16"></i></a>';
                                            echo ' | <a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                            echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';
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
                        <a href="href=#myModal1" role=button data-toggle=modal type=button class="btn btn-xs btn-primary"><i class="en-plus s14"></i> ADD</a>
                    </div>
                    <!-- End .panel -->
                </div>            
          
            <?PHP } list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv where idCat='2' and idEmp='$np' AND vis='0'")); if ($lg=="0") { } else { ?>                
                <div class="panel panel-default plain toggle panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading white-bg min">
					   <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='2' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
		
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
                                <?php include 'include/insert/tabel02.php';?>
                            <tbody> 
                            <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='2' AND  year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
		
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
                                        
                                        $sw2 = mysql_query("SELECT sum(weight) FROM kpidetindv WHERE idCat='2' and idEmp='$np' and vis='0'") or die(mysql_error());
                                        while ($rw2 = mysql_fetch_array($sw2)) { $wgth2= $rw2['sum(weight)']; }
                                            
                                            $rwg2= 100 - $wgth2;                                        
                                  
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
								            echo '<td><a href="_viewKpi.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="sta-w">'.$kc2['weight'];
                                            echo '<td class="sta-s">'.number_format($scr3, 0);
                                            echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'&&hdn=1" target="_Blank"><i class="fa-edit s16"></i></a>';
                                            echo ' | <a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                            echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';
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
                        <a href="href=#myModal2" role=button data-toggle=modal type=button class="btn btn-xs btn-primary"><i class="en-plus s14"></i> ADD</a>
                    </div>
                    <!-- End .panel -->
                </div>

            <?PHP } list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv where idCat='3' and idEmp='$np' AND vis='0'")); if ($lg=="0") { } else { ?>                
                <div class="panel panel-default plain toggle panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading white-bg min">
					   <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='3' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
		
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
                            <thead>
                                <?php include 'include/insert/tabel02.php';?>
                            <tbody>
                                <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='3' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY idKpiDetIndv ASC");
        
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
                                  
                                        $sw3 = mysql_query("SELECT sum(weight) FROM kpidetindv WHERE idCat='3' and idEmp='$np' and vis='0'") or die(mysql_error());
                                        while ($rw3 = mysql_fetch_array($sw3)) { $wgth3= $rw3['sum(weight)']; }
                                            
                                            $rwg3= 100 - $wgth3;                                            
                                            
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
                                            echo '<td><a href="_viewKpi.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="int-w">'.$kc2['weight'];
                                            echo '<td class="int-s">'.number_format($scr3, 0);
                                            echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'&&hdn=1"><i class="fa-edit s16"></i></a>';
                                            //echo ' | <a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                            //echo 'onclick=\'return confirm("Are sure want to delete?")\' type=button class="btn btn-xs btn-primary"> DEL</a>';
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
                        <a href="href=#add_IP_Modal" role=button data-toggle=modal target="_blank" type=button class="btn btn-xs btn-primary"><i class="en-plus s14"></i> ADD</a>
                                
                    </div>
                </div>
                <!-- End .panel -->
            <?PHP } list($lg)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM kpidetindv WHERE idCat='4' AND idEmp='$np' AND vis='0'")); if ($lg=="0") { } else { ?>
                <div class="panel panel-default plain toggle panelRefresh">
                    <!-- Start .panel -->
                        <div class="panel-heading white-bg min">
					        <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='4' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
		
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
                                    <?php include 'include/insert/tabel02.php';?>
                                <tbody>
					                <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE idCat='4' AND year='$yr' AND vis='0' AND idEmp='$np' ORDER BY code ASC");
		
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
                                                
                                        $sw4 = mysql_query("SELECT sum(weight) FROM kpidetindv WHERE idCat='4' and idEmp='$np' and vis='0'") or die(mysql_error());
                                        while ($rw4 = mysql_fetch_array($sw4)) { $wgth4= $rw4['sum(weight)']; }
                                            
                                            $rwg4= 100 - $wgth4;        
                                  
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
                                            echo '<td><a href="_viewKpi.php?kd='.$kc2["idKpiDetIndv"].'&&mtr='.$kc2['idMont'].'" target="_Blank">'.$kc2['title'].'</a>';
                                            echo '<td>'.number_format($trg).' '.$imt3;
                                            echo '<td>'.number_format($mkmi2).' '.$imt3;
                                            echo '<td class="count-me2">'.$kc2['weight'];
                                            echo '<td class="count-me">'.number_format($scr3, 0);
                                            echo '<td class="text-center"><img class=user-avatar src=assets/img/'.$trd5.'>';

                                            echo '<td class="text-center"><a href="_editKpi.php?kd='.$kc2["idKpiDetIndv"].'&&hdn=1" target="_Blank"><i class="fa-edit s16"></i></a>';
                                            echo ' | <a href="sys/engine/delKpi.php?kd='.$kc2["idKpiDetIndv"].'&&dt='.$today.'&&pg='.$np.'&&clt='.$kc2["code"].'&&swch=1" ';
                                            echo 'onclick=\'return confirm("Are sure want to delete?")\'><i class="fa-trash s16"></i></a>';
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
                            <a href="href=#myModal4" role=button data-toggle=modal type=button class="btn btn-xs btn-primary"><i class="en-plus s14"></i> ADD</a>
                        </div>
                </div>
                <!-- End .panel -->
            <?PHP } } ?>
        </div>
        <!-- col-lg-12 Main Content of Perspective KPI View end here -->                    
      </div>
      <!-- End .row -->   
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
    
<?PHP require('include/misc/addModal.php'); ?>