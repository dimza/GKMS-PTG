<?PHP

	require('../db_con/db.php');

	$q= intval($_GET['q']);

	$qcd= mysql_query("SELECT * FROM `sm` WHERE idSm='$q'") or die(mysql_error());
	$qcd2= mysql_result($qcd, 0, 'idCode');

	$info = array();
	$info[] = array( 'id' => $q, 'cd' => $qcd2);

	echo json_encode($info);
 

?>

