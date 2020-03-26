<?php
	require_once(__DIR__.'/sys/db_con/db.php');

    if($_GET['id'] and $_GET['data'])
        
        {
	       $id = $_GET['id'];
	       $data = $_GET['data'];
	
            if(mysql_query("update monthkpimontindv set target='$data' where idMontIndv='$id'"))
	
            echo 'success';
        }
?>