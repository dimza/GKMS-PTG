<?PHP

//Start session
session_start();
 
//Include database connection details
require('../db_con/db2.php');
 
//Array to store validation errors
$errmsg_arr = array();
 
//Validation error flag
$errflag = false;
 
//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {

	$str = @trim($str);

	if(get_magic_quotes_gpc()) {

		$str = stripslashes($str);
	}

	return mysql_real_escape_string($str);
}
 
//Sanitize the POST values
$username = clean($bd, $_POST['email']);
$password = clean($bd, $_POST['password']);

$tgl = mysqli_real_escape_string($bd, $_POST['tgl']);
$ip = mysqli_real_escape_string($bd, $_POST['ip']);


//select query
$qusr="SELECT * FROM users WHERE uName='$username' OR idUser='$username' AND pWordHash='".md5($_POST['password'])."'";
$qrs=mysqli_query($bd, $qusr);

$qusr2="UPDATE users SET online='1', lastLog='$tgl' where uName='$username' OR idUser='$username'";
$qrs2=mysqli_query($bd, $qusr2);
 
//Check whether the query was successful or not
if($qrs) {

	if(mysqli_num_rows($qrs) > 0) {
        
	//Login Successful
	session_regenerate_id();
	$member = mysql_fetch_assoc($result);
	$_SESSION['SESS_MEMBER_ID'] = $member['idUser'];
	$_SESSION['SESS_FIRST_NAME'] = $member['uName'];
	$_SESSION['SESS_LAST_NAME'] = $member['pWordHash'];
	session_write_close();

	$role_user= mysql_query("select * from users where uName='$username' OR idUser='$username'");
	$data = mysql_fetch_array($role_user);

	if($data['role']=="111") {
	
		header("Location: ../../_rdr.php?idm=03b9dccb9f840822af6d4768c8194697&&dis-03b9dccb9f840822af6d4768c819469703b9dccb9f840822af6d4768c8194697");
	
	} else if($data['role']=="2") {
	
		header("Location: home.php");

	} else if($data['role']=="3") {
	
		header("Location: home.php");
	
	} else {
		
		header("Location: ../../index.php?msg=303");
	}

	exit();

} else {

	//Login failed
	$errmsg_arr[] = 'user name and password not found';
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

} else { 

	die("Query failed");
}

?>
