<?PHP

	$q= intval($_GET['kd']);
    $s= intval($_GET['mtr']);

        $qki= mysql_query("select * from `kpidetindv` where idKpiDetIndv='$q'") or die(mysql_error());
        $qki2= mysql_result($qki, 0, 'title');
        $qki3= mysql_result($qki, 0, 'descr');
        $qki4= mysql_result($qki, 0, 'code');
        $qki5= mysql_result($qki, 0, 'idEmp');
        $qki6= mysql_result($qki, 0, 'idDiv');
        $qki7= mysql_result($qki, 0, 'idCat');
        $qki8= mysql_result($qki, 0, 'idUnit');
        $qki9= mysql_result($qki, 0, 'idMont');
        $qki10= mysql_result($qki, 0, 'level');
        $qki11= mysql_result($qki, 0, 'target');
        $qki12= mysql_result($qki, 0, 'mDate');
        $qki13= mysql_result($qki, 0, 'stat');
        $qki14= mysql_result($qki, 0, 'idSm');
        $qki15= mysql_result($qki, 0, 'calc');
        
        if($qki10 == '0') { $lvlk= "Staff"; } else if($qki10 == '1') { $lvlk= "Manager"; } else if($qki10 == '2') { $lvlk= "Vice President"; } else if($qki10 == '3') { $lvlk= "Director of"; } else if($qki10 == '4') { $lvlk= "BOC"; } else { $lvlk= "unknown"; }
        
        if($qki13 == '1') { $stak= "Reviewed"; } else { $stak= "UnReviewed"; }

        $qem= mysql_query("select * from `emp` where idUser='$qki5'") or die(mysql_error());
        $qem2= mysql_result($qem, 0, 'fName');
        $qem3= mysql_result($qem, 0, 'lName');
        $qem4= mysql_result($qem, 0, 'idSpv');
        $qem5= mysql_result($qem, 0, 'idDep');
        $qem6= mysql_result($qem, 0, 'idDiv');

        $qdep= mysql_query("select * from `empdep` where idDep='$qem5'") or die(mysql_error());
        $qdep2= mysql_result($qdep, 0, 'descr');

        $qdiv= mysql_query("select * from `empdiv` where idDiv='$qem6'") or die(mysql_error());
        $qdiv2= mysql_result($qdiv, 0, 'code');
        
        $qsm= mysql_query("select * from `sm` where idSm='$qki14'") or die(mysql_error());
        $qsm2= mysql_result($qsm, 0, 'idCode');
        $qsm3= mysql_result($qsm, 0, 'description');
        
        $kdiMon3= mysql_query("select * from `kpidetindv` where idKpiDetIndv='$q'") or die(mysql_error());
        $kdiMon4= mysql_result($kdiMon3, 0, 'target');

        $qkiTgt= $qki11/12;
        $qkiTgt2= $qki11/4;
        $qkiTgt3= $qki11/1;
        $qkiTgt4= $qki11/48;
        
        $qku= mysql_query("select * from `kpimonitoring` where idMont='$qki9'") or die(mysql_error());
        $qku2= mysql_result($qku, 0, 'symbol');
        $qku5= mysql_result($qku, 0, 'description');
        
        $qku3= mysql_query("select * from `kpiunit` where idUnit='$qki8'") or die(mysql_error());
        $qku4= mysql_result($qku3, 0, 'symbol');
        $qku6= mysql_result($qku3, 0, 'description');
        
        list($cnt)=mysql_fetch_array(mysql_query("select COUNT(*) from `monthkpimontindv` where idKpiDetIndv='$q'"));
        list($cnt2)=mysql_fetch_array(mysql_query("select SUM(actual) from `monthkpimontindv` where idKpiDetIndv='$q'"));
        list($cnt3)=mysql_fetch_array(mysql_query("select SUM(target) from `monthkpimontindv` where idKpiDetIndv='$q'"));
        
        if($cnt3 > 0) { $cnt4= $cnt2/$cnt3; }
        $cnt5= number_format($cnt4 * 100, 0);
        
        $qkc= mysql_query("select * from `kpicat` where idCat='$qki7'") or die(mysql_error());
        $qkc2= mysql_result($qkc, 0, 'desc');
        
        if ($qki10==0) { $qki101="Section Level"; }
        else if ($qki10==1) { $qki101="Department Level"; }
        else if ($qki10==2) { $qki101="Division Level"; }
        
        $qspv= mysql_query("select * from `empspv` where idSpv='$qem4'") or die(mysql_error());
        $qspv2= mysql_result($qspv, 0, 'descr');
        

?>