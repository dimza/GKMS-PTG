<?PHP

	//Start session
	session_start();
 
	//Include database connection details
	require('../db_con/db.php');
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) 

	{ $str = @trim($str); if(get_magic_quotes_gpc()) { $str = stripslashes($str); } return mysql_real_escape_string($str); }
 
	//Sanitize the POST values
	$username = clean($_POST['email']);
	$password = clean($_POST['password']);

	$tgl = $_POST['tgl'];
	$ip = $_POST['ip'];

	//Input Validations
	if($username == '') { $errmsg_arr[] = 'Username missing'; $errflag = true; $tErr= "Blank Username"; }

	if($password == '') { $errmsg_arr[] = 'Password missing'; $errflag = true; $tErr= "Blank Password"; }
 
	//If there are input validations, redirect back to the login form
	if($errflag) 
	
		{
    
    			$logQry="insert INTO userslog (idUserLog, ipAddr, uName, tError, mDate) VALUES ('NULL', '$ip', '$username', '$tErr', '$tgl')";
    			$result3 = mysql_query($logQry) or die(mysql_error());

			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: ../../index.php?msg=303");
			exit();
		}
 
	//Create query
	$qry="SELECT * FROM users WHERE idUser='$username' AND pWordHash='".md5($_POST['password'])."'";
	$result=mysql_query($qry);

	$qry2="UPDATE users SET online='1', lastLog='$tgl' where idUser='$username'";
	$result2=mysql_query($qry2);
 
	//Check whether the query was successful or not
	if($result) { if(mysql_num_rows($result) > 0) 

		{ 

			$tErr="Success";
    			$logQry="insert INTO userslog (idUserLog, ipAddr, uName, tError, mDate) VALUES ('NULL', '$ip', '$username', '$tErr', '$tgl')";
    			$result3 = mysql_query($logQry) or die(mysql_error());        
        
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_ID'] = $member['idUser'];
			$_SESSION['SESS_USERNAME'] = $member['uName'];
			$_SESSION['SESS_PASSWORD'] = $member['pWordHash'];
			session_write_close();

			$role_user= mysql_query("select * from users where idUser='$username'");
			$data = mysql_fetch_array($role_user);

			if($data['granted']=="1") { header("Location: ../../HOME/_rdr.php?idm=03b9dccb9f840822af6d4768c8194697&&dis-03b9dccb9f840822af6d4768c819469703b9dccb9f840822af6d4768c8194697");
	
			} else if($data['granted']=="2") { header("Location: ../../_addKpi.php?idm=03b9dccb9f840822af6d4768c8194697&&dis-03b9dccb9f840822af6d4768c819469703b9dccb9f840822af6d4768c8194697");

			} else if($data['granted']=="0") { header("Location: index.php"); } else { header("Location: ../../index.php?msg=303"); }

			exit(); } else {

	//Login failed
	$errmsg_arr[] = 'username and password not found';
	$errflag = true;
        
    	$tErr= "Username/Password not found";
	
	if($errflag) {

    $logQry="insert INTO userslog (idUserLog, ipAddr, uName, tError, mDate) VALUES ('NULL', '$ip', '$username', '$tErr', '$tgl')";
    $result3 = mysql_query($logQry) or die(mysql_error());        
        
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ../../index.php?msg=303");
		exit();
		
		}
	}

} else { die("Query failed"); } ?>
