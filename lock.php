<?php

  date_default_timezone_set('Asia/Jakarta');

  $today = date('l jS \of F Y h:i:s A');
  $ip = $_SERVER['REMOTE_ADDR'];

  require_once(__DIR__.'/sys/db_con/db.php');

  $kode= @$_GET['online'];
  $npg= @$_GET['user'];
  $msg= @$_GET['msg'];

  $qry2="UPDATE users SET online=$kode where idUser=$npg";
  $result2=mysql_query($qry2);

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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
                    <img class=img-circle2 src=assets/img/ava/dmz.jpg>
                </div>            
			<form action="sys/engine/login.php" method="post">
                <?PHP   require_once(__DIR__.'/include/misc/alert.php'); ?>
				<ul>
					<li>
						<input type="text" class="text" name="email" value="Dhimas Yuli Priya Wicaksana" disabled>
                        <a href="#" class=" icon user"></a>
					</li>
					 <li>
						<input type="password" name="password" placeholder="Password">
                         <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                         <input type=hidden class=form-control readonly value="<?PHP echo $ip ?>" name="ip">
                         <a href="#" class=" icon lock"></a>
					</li>
				</ul>
			<div class="submit">
				<input type="submit" value="LOG IN" >
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