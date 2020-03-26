<?php

	require('../db_con/db.php');

    if($_GET['id'] and $_GET['data'])
        
        {
	       $id = $_GET['id'];
	       $act = $_GET['data'];

	       $qtgt= mysql_query("SELECT * FROM `monthkpimontindv` WHERE idMontIndv='$id'") or die(mysql_error());
           $qtgt2= mysql_result($qtgt, 0, 'target');

           $ach= $act/$qtgt2;
           $ach2= $qtgt2/$act;
           $ach3= number_format($ach * 100, 0);
	
            if(mysql_query("UPDATE monthkpimontindv SET actual='$act', achiev='$ach3' WHERE idMontIndv='$id'"))
	
            echo 'success';
        }
?>