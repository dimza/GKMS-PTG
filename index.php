<?php

  date_default_timezone_set('Asia/Jakarta');

  $today = date('l, jS \of F Y - h:i:s A');
  $ip = $_SERVER['REMOTE_ADDR'];

  require('sys/db_con/db.php');

  $kode= @$_GET['online'];
  $npg= @$_GET['user'];
  $msg= @$_GET['msg'];

  $qry2="UPDATE users SET online=$kode where idUser=$npg";
  $result2=mysql_query($qry2);

	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_ID']);
	unset($_SESSION['SESS_USERNAME']);
	unset($_SESSION['SESS_PASSWORD']);

?>

<!DOCTYPE html>
<html>
<?PHP require('include/_layout/headLogin.php'); ?>   
<body>
<!--<video autoplay loop poster="assets/video/Snapshot/NYC-Blurred-Traffic.jpg" id="bgvid">
    <source src="assets/video/WEBM/NYC-Blurred-Traffic.webm" type="video/webm">
    <source src="assets/video/MP4/NYC-Blurred-Traffic.mp4" type="video/mp4">
</video>-->
<!--/start-login-one-->

<div class="login">	
	<div class="ribbon-wrapper h2 ribbon-red">
		<div class="ribbon-front"><h2>Welcome to GKMS!</h2></div>
		<div class="ribbon-edge-topleft2"></div>
		<div class="ribbon-edge-bottomleft"></div>
	</div>
	<form action="sys/engine/login.php" method="post">
    	<?PHP   require('include/misc/alert.php'); ?>
			<ul>
				<li>
                	<input type="text" class="text" name="email" placeholder="Type Your Employee Id Here!" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Employee Id';}" ><a href="#" class=" icon user"></a>
				</li>
				<li>
					<input type="password" name="password" placeholder="Type Your Password Here!" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                    <input type=hidden class=form-control readonly value="<?PHP echo $today ?>" name="tgl">
                   	<input type=hidden class=form-control readonly value="<?PHP echo $ip ?>" name="ip"><a href="#" class=" icon lock"></a>
				</li>
			</ul>
			<div class="submit"><input type="submit" onclick="myFunction()" value="LOG IN" ></div>
        </form>
</div>
        
<!--start-copyright-->
<div class="copy-right">
    <p> &copy; 2016  All Rights  Reserved GUNANUSA Utama Fabricators, PT | 
        <a href="_register.php" class="label" style="background-color: #00CDAC; /* Green */
    border: none;
    color: white;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;">REGISTER</a> 
        
<!--
        | <a data-modal="open" class="label" style="background-color: #00CDAC; /* Green */
    border: none;
    color: white;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;">FORGOT PASSWORD?</a>
    
-->
    </p>
</div>
<!--//end-copyright-->
       
<!-- Modal -->
<div class="modal-wrapper" data-modal="wrapper">
	<div class="modal-content">
        <button class="fechar-modal" data-modal="close">X</button>	
			<form action="sys/engine/users_reset.php" method="post">
                <ul>
					<li>
						<input type="text" class="text" name="email" placeholder="Type Your Id Employee">
                        <input type=hidden value="<?PHP echo $today ?>" name="tgl">
                        <input type=hidden value="<?PHP echo $ip ?>" name="ip">
                        <a href="#" class="icon eml"></a>
					</li>
				</ul>
				<div class="submit2"><input type="submit" value="RESET PASSWORD" ></div>
            </form>
    </div>
</div>
<!-- /.modal -->    

</body>
</html>
<script src=assets/js/pages/modalzinha.js></script>