<?php

    date_default_timezone_set('Asia/Jakarta');
    $dt = date('l, jS \of F Y - h:i:s A');

//Include database connection details
require('../db_con/db2.php');

// Check connection
if (mysqli_connect_errno($con))

{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();

}   else

{
		$np2=$_POST['np'];//nik
		$eml2=$_POST['eml'];
		$oword2=$_POST['oword'];//oldPassword
		$pword2=md5($_POST['pword']);
		$pword3=$_POST['pword2'];
    
        	$sql= "UPDATE users SET pWordHash='$pword2' WHERE idUser='$np2'";

                if (mysqli_query($con, $sql)) { header("Location: ../../profile.php?al=3"); } 
                else { echo "Error: " . $sql . "<br>" . mysqli_error($con); }

}

mysqli_close($con);

?>


    