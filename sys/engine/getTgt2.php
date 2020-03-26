<?PHP

	require('../db_con/db.php');

    $tdy = date("d/m/y");

	$q= intval($_GET['q']);

	$qmnt= mysql_query("SELECT * FROM `monthkpimontindv` WHERE idMontIndv='$q'") or die(mysql_error());
	$qmnt2= mysql_result($qmnt, 0, 'target');

	$info = array();
	$info[] = array( 'id' => $q, 'tgt' => $qmnt2);

	echo json_encode($info);

?>

