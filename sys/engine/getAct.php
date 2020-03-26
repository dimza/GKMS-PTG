<?PHP

	require('../db_con/db.php');

    $tdy = date("d/m/y");

	$q= intval($_GET['q']);

	$qmnt= mysql_query("SELECT * FROM `monthkpimontindv` WHERE idMontIndv='$q'") or die(mysql_error());
	$qmnt3= mysql_result($qmnt, 0, 'actual');
    $qmnt4= mysql_result($qmnt, 0, 'remark');

	$info = array();
	$info[] = array( 'id' => $q, 'act' => $qmnt3, 'rmk' => $qmnt4 );

	echo json_encode($info);

?>

