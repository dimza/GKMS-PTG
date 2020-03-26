<div class="col-lg-12 col-md-12">
  <!-- col-lg-12 start here -->
  <div class="panel panel-default plain toggle panelClose panelRefresh">
    <!-- Start .panel -->
    <div class="panel-heading white-bg">
      <h4 class=panel-title><i class=en>
        <img class=user-avatar src=assets/img/speedo.png ></i> <h5 style="margin-top:20px;">Department Level</h5></h4>
    </div>
    <div class=panel-body>
      <table class="table display" id="datatable2">
        <thead> 
          <tr> 
            <th class=per5>ID
            <th class=per30>Key Performance Indicators
            <th class=per5>Owner
            <th class=per5>FIN
            <th class=per5>STK
            <th class=per5>IP
            <th class=per5>LG
            <th class=per5>Score
            <?PHP if ($lvl=='2' or $lvl=='1'){ ?>
            <th class="per7 text-center"><i class="im-cog s16"></i>
            <?php } else {} ?>
        <tbody>
          <?PHP $kc= mysql_query("SELECT * FROM kpidetindv WHERE level='1' AND year='$yr' AND vis='0' AND idDiv='$idv' ORDER BY code ASC");
    
                  While ($kc2= mysql_fetch_assoc($kc)) {
                                  
                    $ikdi=$kc2["idKpiDetIndv"];
                    $imnt=$kc2["idCat"];
                    $imnt2=$kc2["idMont"];
                    $qep=$kc2["idEmp"];

                    $qe= mysql_query("select * from `emp` where idUser='$qep'") or die(mysql_error());
                    $qe2= mysql_result($qe, 0, 'lName');
                    $qe3= mysql_result($qe, 0, 'fName');

                    list($sm)=mysql_fetch_array(mysql_query("select SUM(achiev) from `monthkpimontindv` where idKpiDetIndv='$ikdi'"));

                    if ($imnt=='1') { 

                          if ($imnt2=='2') { $sum7=$sm/48; } 
                          elseif ($imnt2=='3') { $sum7=$sm/12; } 
                          elseif ($imnt2=='4') { $sum7=$sm/4; }
                          elseif ($imnt2=='5') { $sum7=$sm/1; }

                    } else if ($imnt=='2') {

                          if ($imnt2=='2') { $sum8=$sm/48; } 
                          elseif ($imnt2=='3') { $sum8=$sm/12; } 
                          elseif ($imnt2=='4') { $sum8=$sm/4; }
                          elseif ($imnt2=='5') { $sum8=$sm/1; }

                    } else if ($imnt=='3') {

                          if ($imnt2=='2') { $sum8=$sm/48; } 
                          elseif ($imnt2=='3') { $sum9=$sm/12; } 
                          elseif ($imnt2=='4') { $sum9=$sm/4; }
                          elseif ($imnt2=='5') { $sum9=$sm/1; }
                    
                    } else if ($imnt=='4') { 

                          if ($imnt2=='2') { $sum9=$sm/48; } 
                          elseif ($imnt2=='3') { $sum10=$sm/12; } 
                          elseif ($imnt2=='4') { $sum10=$sm/4; }
                          elseif ($imnt2=='5') { $sum10=$sm/1; }
                    
                    } 
                                  
                    echo '<tr>';
                      
                    echo '<td>'.$kc2['code'];
                    echo '<td><a href="_viewKpi.php?kd='.$ikdi.'&&mtr='.$imnt2.'" target="_Blank">'.$kc2['title'].'</a>';
                    echo '<td>'.$qe3.' '.$qe2;  
                    echo '<td>'.number_format($sum7, 0);
                    echo '<td>'.number_format($sum8, 0);
                    echo '<td>'.number_format($sum9, 0);
                    echo '<td>'.number_format($sum10, 0);
                    echo '<td>-';
                    if ($lvl=='2' or $lvl=='1'){
                    echo '<td class="text-center"><a href="_editKpi.php?kd='.$ikdi.'&&mtr='.$imnt2.'" target="_Blank"><i class="fa-edit s16"></i></a>';
                    } else {}
                                      
                  }
          ?> 
        <tfoot>
          <tr>
            <th> 
            <th> 
            <th class="text-right" style="padding-right: 50px;">WEIGHT 
            <th><?PHP echo $qcat3; ?> % 
            <th><?PHP echo $qcat7; ?> %
            <th><?PHP echo $qcat11; ?> %
            <th><?PHP echo $qcat15; ?> %
            <th>
            <?PHP if ($lvl=='2' or $lvl=='1'){ ?>
            <th class="per7 text-right">
            <?php } else {} ?>                       
      </table>
    </div>
  </div>
  <!-- End .panel -->                          
</div>
<!-- col-lg-12 end here -->              
