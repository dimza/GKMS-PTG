<?php

  date_default_timezone_set('Asia/Jakarta');

  $today = date('l jS \of F Y h:i:s A');
  $ip = $_SERVER['REMOTE_ADDR'];

  $token = $_POST['tk'];

  require_once(__DIR__.'/sys/db_con/db.php');

	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);

?>

<!DOCTYPE html>
<html>
<head>
<title>CPRMIA - KPI</title>
<link href="assets/css/style_login2.css" rel='stylesheet' type='text/css' />
<link rel=icon href="ico.png" type=image/png>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Simple Login Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
</script>
<!--webfonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>   
<!--/start-login-one-->
<h1></h1>   
		<div class="login">
            <br>
                <div align ="center">
                    <img class=img-circle2 src=assets/img/avatars/pp4.png>
                </div>            
			     <form action="sys/engine/login.php" method="post">
                    <?PHP   require_once(__DIR__.'/include/misc/alert.php'); ?>
                    <h4 align=center style="color: #95a5a6;">Full Name</h4>
                    <h5 align=center style="color: #7f8c8d; font-size: 13px;">email</h5>
                    <ul>
				        <li>
						  <input type="password" name="pswd" placeholder="New Password">
                          <a href="#" class=" icon lock"></a>
					    </li>
                        <li>
						  <input type="password" name="pswd2" placeholder="Confirn New Password">
                          <input type=hidden value="<?PHP echo $today ?>" name="tgl">
                          <input type=hidden value="<?PHP echo $ip ?>" name="ip">
                          <a href="#" class=" icon lock"></a>
					</li>
				</ul>
			    <div class="submit">
				    <input type="submit" value="SUBMIT NEW PASSWORD" >
			    </div>
                </form>
		</div>
        <!--start-copyright-->
   		<div class="copy-right">
            <p>Copyright &copy; 2016  All rights  Reserved PT. GUNANUSA Utama Fabricators</p>
		</div>
	   <!--//end-copyright-->    
</body>
</html>