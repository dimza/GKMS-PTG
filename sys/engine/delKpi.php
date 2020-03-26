<?php 

ob_start();

	require('../db_con/db.php');

		//id_client
		$kode = @$_GET['kd'];
		//tgl mod
		$dt2 = @$_GET['dt'];
		//nama mod
		$pg2 = @$_GET['pg'];
		//nama client
		$clt2 = @$_GET['clt'];
		//var swcht
		$swch2 = @$_GET['swch'];
				
		$hd = 1;
		$hd2 = 0;
		
		switch ($swch2) {

		case "1":	

		$sql="UPDATE kpidetindv SET vis='$hd', mDate='$dt2', mEmp='$pg2' WHERE idKpiDetIndv='$kode'";
		$result= mysql_query($sql) or die(mysql_error());

		$sql2="UPDATE monthkpimontindv SET vis='$hd', mDate='$dt2', mEmp='$pg2' WHERE idKpiDetIndv='$kode'";
		$result2= mysql_query($sql2) or die(mysql_error());

		header("location: ../../_addKpi.php?kd=$clt2&&al=$hd&&id=$kode");
		
		break; 
		case "2":

		$sql="UPDATE kpidetindv SET vis='$hd2' WHERE idKpiDetIndv='$kode'";
		$result= mysql_query($sql) or die(mysql_error());

		$sql2="UPDATE monthkpimontindv SET vis='$hd2', mDate='$dt2', mEmp='$pg2' WHERE idKpiDetIndv='$kode'";
		$result2= mysql_query($sql2) or die(mysql_error());

		header("location: ../../_addKpi.php?kd=$clt2&&al=$hd2");
		
		break; default: 
		
		header("location: ../../_addKpi.php");
		
		}

		$kode = @$_GET['kd'];

ob_end_flush();
		
?>
