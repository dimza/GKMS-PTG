<?php
    
    //mysqli connection
    require('sys/db_con/db3.php'); 

    date_default_timezone_set('Asia/Jakarta');
    $dt = date('l, jS \of F Y - h:i:s A');

if(isset($_POST["content_txt"]) && strlen($_POST["content_txt"])>0) 
{	//check $_POST["content_txt"] is not empty

	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$contentToSave = filter_var($_POST["content_txt"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $cts2 = $_POST['content_id'];
    $cts3 = $_POST['content_user'];
    $cts4 = $_POST['content_kpi'];
	
	// Insert sanitize string in record
	$insert_row = $mysqli->query("INSERT INTO commkpi(idKpiDetIndv, idUser, idEmp, content, mDate) VALUES('".$cts4."', '".$cts3."', '".$cts2."', '".$contentToSave."', '".$dt."')");
	
	if($insert_row)
	{                   
        $qemp = $mysqli->query("SELECT fName, lName, avatar FROM emp WHERE idUser=$cts2");
        
        //get all records from add_delete_record table
        while($row_qemp = $qemp->fetch_assoc()) { $qemp2= $row_qemp['fName']; $qemp3= $row_qemp['lName']; $qemp4= $row_qemp['avatar']; }
                        
        if($qemp4=='') {$qemp4="11.png";} else {}
        
		 //Record was successfully inserted, respond result back to index page
		  $my_id = $mysqli->insert_id; //Get ID of last inserted row from MySQL
		  echo '<li id="item_'.$my_id.'" class="chat-me" style="padding: 8px; border-bottom: 1px solid #e4e9eb;">';
          echo '<p class=avatar style="margin-left: 8px;"><img src=assets/img/avatars/'.$qemp4.' ></p>';
		  echo '<p class=chat-name>'.$qemp2.' '.$qemp3.'<span class=chat-time>';
          echo '<a href="#" class="del_button" id="del-'.$my_id.'"><i class="im-close s10"></i></a>';
          echo '</span></p><p class=chat-txt align=justify>'.$contentToSave;
          echo '<Br><b><font color=#d4d4d4>'.$dt.'</font></b></p></li>';
        
		  $mysqli->close(); //close db connection

	}else{
		
		//header('HTTP/1.1 500 '.mysql_error()); //display sql errors.. must not output sql errors in live mode.
		header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
		exit();
	}

}
elseif(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"])>0 && is_numeric($_POST["recordToDelete"]))
{	//do we have a delete request? $_POST["recordToDelete"]

	//sanitize post value, PHP filter FILTER_SANITIZE_NUMBER_INT removes all characters except digits, plus and minus sign.
	$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT); 
	
	//try deleting record using the record ID we received from POST
	$delete_row = $mysqli->query("UPDATE commkpi SET vis=1 WHERE idKpiComm=".$idToDelete);
	
	if(!$delete_row)
	{    
		//If mysql delete query was unsuccessful, output error 
		header('HTTP/1.1 500 Could not delete record!');
		exit();
	}
	$mysqli->close(); //close db connection
}
else
{
	//Output error
	header('HTTP/1.1 500 Error occurred, Could not process request!');
    exit();
}
?>