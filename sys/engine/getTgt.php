<?PHP

	require('../db_con/db.php');

    $tdy = date("d/m/y");

	$q= intval($_GET['q']);

	$kdiMon3= mysql_query("select * from `kpidetindv` where idKpiDetIndv='$q'") or die(mysql_error());
	$kdiMon6= mysql_result($kdiMon3, 0, 'idMont');

	if ($kdiMon6=='2') {

	$wk = date("W");
    $dte = "Week-".$wk;

	} else if ($kdiMon6=='3') { $dte = date("M-y");

	} else if ($kdiMon6=='4') {

	$yr= date("Y");
    $cq= date("m", time());
    $cq2= ceil($cq/3);

    $dte= "Q".$cq2."-".$yr;	

	} else if ($kdiMon6=='5') { $dte= date("Y"); } else {}

    $qm= mysql_query("select * from `monitoring` where description='$dte'") or die(mysql_error());
    $qm2= mysql_result($qm, 0, 'idMtr');

	$qmnt= mysql_query("select * from `monthkpimontindv` where idKpiDetIndv='$q' AND idMtr='$qm2' order by idMontIndv desc limit 1") or die(mysql_error());
	$qmnt2= mysql_result($qmnt, 0, 'actual');
	$qmnt3= mysql_result($qmnt, 0, 'target');

	list($prg)=mysql_fetch_array(mysql_query("SELECT COUNT(actual) FROM monthkpimontindv where idKpiDetIndv='$q' AND actual>0"));

	if ($kdiMon6=="2") { $prg2= 48; } 
	else if ($kdiMon6=="3") { $prg2= 12; } 
	else if ($kdiMon6=="4") { $prg2= 4; } 
	else if ($kdiMon6=="5") { $prg2= 1; }

	$prg3= $prg/$prg2;
	$prg4= number_format($prg3 * 100) . ' %';

	$info = array();
	$info[] = array( 'id' => $q, 'prd' => $qmnt2, 'tar' => $qmnt3, 'prog' => $prg4 );

	echo json_encode($info);

//$sql="SELECT * FROM kpidetindv WHERE idKpiDetIndv = '".$q."'";
//
//$result = $user->database->query($sql);
//$info = array();
//while($row=$user->database->fetchArray($result))
//{
//    $cID = $row['idMont'];
//    $cTrg = $row['target'];
//    $cPro = $row['target'];
//    $info[] = array( 'id' => $cID, 'tar' => $cTrg, 'prog' => $cPro );
//}
//echo json_encode($info); 

?>

