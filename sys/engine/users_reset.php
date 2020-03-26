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
function clean($str) {

	$str = @trim($str);

	if(get_magic_quotes_gpc()) {

		$str = stripslashes($str);
	}

	return mysql_real_escape_string($str);
}
 
//Sanitize the POST values
$username = clean($_POST['email']);

$tgl = $_POST['tgl'];
$ip = $_POST['ip'];

//Input Validations
if($username == '') {
	
	$errmsg_arr[] = 'Username missing';
	$errflag = true;
    
    $tErr= "Blank Username";
}
 
//If there are input validations, redirect back to the login form
if($errflag) {

	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: ../../index.php?msg=302");
	exit();
}

//Create query
$qry="SELECT * FROM users WHERE uName='$username'";
$result=mysql_query($qry);
 
//Check whether the query was successful or not
if($result) {

	if(mysql_num_rows($result) > 0) {
        
    $tkn = rand(0,100000); // with MAX_RAND=32768
    $tkn2=md5($tkn);
    
    $iu= mysql_query("select * from `emp` where email='$username'") or die(mysql_error());
    $iu2= mysql_result($iu, 0, 'idUser');  
        
    $resQry="insert INTO usersres (idUserRes, ipAddr, nopeg, email, token, vis, mDate) VALUES ('NULL', '$ip', '$iu2', '$username', '$tkn2', 'NULL',  '$tgl')";
    $result3 = mysql_query($resQry) or die(mysql_error());        
        
	header("location: ../../index.php?msg=202");
	exit();

} else {

	//Login failed
	$errmsg_arr[] = 'user name and password not found';
	$errflag = true;
        
    $tErr= "Username/Password not found";
	
	if($errflag) {       
        
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ../../index.php?msg=302");
		exit();
		
		}
	}

} else { 

	die("Query failed");
}

?>
