<?PHP

	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_ID']) || (trim($_SESSION['SESS_ID']) == '')) {
		header("location: /../apps/gkms/index.php?msg=301");
		exit();
	}
 
	require('../sys/db_con/db.php');

    date_default_timezone_set('Asia/Jakarta');
    $today = date('l, jS \of F Y - h:i:s A');
    $yr= date("Y");
    $y= date("y");

      //call Seession put into variabel 
    $np=$_SESSION['SESS_ID'];
      $usr=$_SESSION['SESS_USERNAME'];

    //call Query Table Users
    $qUsr= mysql_query("select * from users where idUser='$np'");
    $dtUsr = mysql_fetch_array($qUsr);

    //put Variable from Qry Tbl Users to variabel role    
    $rlUsr = $dtUsr['role'];
    $rlGtd = $dtUsr['granted'];

    //call Query Table Emp
    $qEmp= mysql_query("select * from emp where idUser='$np'");
    $dtEmp = mysql_fetch_array($qEmp);

    $fname = $dtEmp['fName'];
    $lname = $dtEmp['lName'];
    $lvl = $dtEmp['level'];
    $idv = $dtEmp['idDiv'];
    $idp = $dtEmp['idDep'];
    $ap= $dtEmp['avatar'];
  
  if ($rlUsr == "111") {

    $tab="HOME";

?>
<!DOCTYPE html>
<html lang=en>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
<meta charset=utf-8>
<title>GKMS | <?PHP echo $tab ?> PTG</title>
<!-- Mobile specific metas -->
<meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1">
<!-- Force IE9 to render in normal mode -->
<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
<meta name=description content="GKMS Version 1.1">
<meta name=keywords content="GKMS">
<meta name=application-name content="GUNANUSA KPI MANAGEMENT SYSTEM">
<!-- Import google fonts - Heading first/ text second -->
<style>
    /* latin */
@font-face {
  font-family: 'Droid Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Droid Sans'), local('DroidSans'), url(../assets/fonts/s-BiyweUPV0v-yRb-cjciPk_vArhqVIZ0nv9q090hN8.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* latin */
@font-face {
  font-family: 'Droid Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Droid Sans Bold'), local('DroidSans-Bold'), url(../assets/fonts/EFpQQyG9GqCrobXxL-KRMYWiMMZ7xLd792ULpGE4W_Y.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../assets/fonts/K88pR3goAWT7BTt32Z01mxJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
}
/* cyrillic */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../assets/fonts/RjgO7rYTmqiVp7vzi-Q5URJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* greek-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../assets/fonts/LWCjsQkB6EMdfHrEVqA1KRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+1F00-1FFF;
}
/* greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../assets/fonts/xozscpT2726on7jbcb_pAhJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0370-03FF;
}
/* vietnamese */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../assets/fonts/59ZRklaO5bWGqF5A9baEERJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../assets/fonts/u-WUoqrET9fUeobQW7jkRRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(../assets/fonts/cJZKeOuBrn4kERxqtaUH3VtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(../assets/fonts/k3k702ZOKiLJc3WVjuplzK-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');
  unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
}
/* cyrillic */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(../assets/fonts/k3k702ZOKiLJc3WVjuplzJX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');
  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* greek-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(../assets/fonts/k3k702ZOKiLJc3WVjuplzBWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');
  unicode-range: U+1F00-1FFF;
}
/* greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(../assets/fonts/k3k702ZOKiLJc3WVjuplzKaRobkAwv3vxw3jMhVENGA.woff2) format('woff2');
  unicode-range: U+0370-03FF;
}
/* vietnamese */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(../assets/fonts/k3k702ZOKiLJc3WVjuplzP8zf_FOSsgRmwsS7Aa9k2w.woff2) format('woff2');
  unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(../assets/fonts/k3k702ZOKiLJc3WVjuplzD0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(../assets/fonts/k3k702ZOKiLJc3WVjuplzOgdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}

</style>
<!--[if lt IE 9]>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- Css files -->
        <link rel="stylesheet"  type=text/css href="../assets/css/style.css">
        <link rel="stylesheet" type=text/css href="../assets/css/main.min.css">
<!-- Fav and touch icons -->
<link rel=apple-touch-icon-precomposed sizes=144x144 href=../assets/img/ico/apple-touch-icon-144-precomposed.png>
<link rel=apple-touch-icon-precomposed sizes=114x114 href=../assets/img/ico/apple-touch-icon-114-precomposed.png>
<link rel=apple-touch-icon-precomposed sizes=72x72 href=../assets/img/ico/apple-touch-icon-72-precomposed.png>
<link rel=apple-touch-icon-precomposed href=../assets/img/ico/apple-touch-icon-57-precomposed.png>
<link rel=icon href=../assets/img/ico/ico3.png type=image/png>
<!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
<meta name=msapplication-TileColor content=#3399cc>

<body>
<!--  Start #header -->
<div id="header">
  <div class="container-fluid">
    <div class="navbar">
      <div class="navbar-header">
        <a class="navbar-brand" style="width:450px;" href=_rdr.php?idm=03b9dccb9f840822af6d4768c8194697&&dis-03b9dccb9f840822af6d4768c819469703b9dccb9f840822af6d4768c8194697>
          <!-- <i class="im-stack text-logo-element animated bounceIn"></i> -->
          <img style="margin: 5px 5px 10px 20px;" width="30" height="30" src=../assets/img/ico/ico3.png>
            <span class=text-logo style="-webkit-text-stroke: 1px black; -webkit-text-stroke-width: 2px; color: white; text-shadow: 2px 2px 0 rgb(118, 131, 153);}">
              Gunanusa KPI Management System
            </span><span class=text-slogan></span></a>
      </div>
      <nav class="top-nav" role="navigation">
        <ul class="nav navbar-nav pull-left">
          <!-- <li id="toggle-sidebar-li"><a href=# id="toggle-sidebar"><i class=en-arrow-left2></i></a></li> -->
          <!-- <li><a href=# class="full-screen"><i class="fa-fullscreen"></i></a></li> -->
          <!-- <li><a href=# id="toggle-header-area"><i class=ec-download></i></a></li> -->         
        </ul>
        <ul class="nav navbar-nav pull-right">
          <li class=dropdown>
            <a href=../profile.php>
              <?PHP 
                          if($ap=="") { echo '<img class=user-avatar src=../assets/img/avatars/pp4.png>';}
                          else { echo '<img class=user-avatar src=../assets/img/avatars/'.$ap.' style="box-shadow: 0 3px 3px rgba(0, 0, 0, 0.4;">'; }
              ?>

              <?PHP echo $fname; ?> <?PHP echo $lname; ?>
            </a>
            <ul class="dropdown-menu right" role=menu>
              <!--<li><a href=profile.php><i class=st-user></i> Profile</a></li>-->
              <li><a href=../profile.php><i class=st-settings></i> Setting</a></li>
              <li><a href=../index.php?&&online=0&&user=<?PHP echo $np; ?>&&msg=201><i class=im-exit></i> Logout</a></li>
              <!--<li><a href=../../index.php?idm=03b9dccb9f840822af6d4768c8194697&&dis=03b9dccb9f840822af6d4768c819469703b9dccb9f840822af6d4768c8194697&&online=0&&user=<?PHP echo $nopeg; ?>><i class=im-exit></i> Logout</a></li>-->
            </ul>
          </li>
            <?PHP list($offline)=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users where online='1'")); ?>    
          <li id="toggle-right-sidebar-li"><a href=../index.php?&&online=0&&user=<?PHP echo $np; ?>&&msg=201><i class="fa-signout"></i></a></li>
        </ul>
      </nav>
    </div>
    <!-- Start #header-area -->
    <div id="header-area" class="fadeInDown">
      <div class="header-area-inner">
        <ul class="list-unstyled list-inline">
          <li><div class=shortcut-button><a href=_addKpi.php><i class="im-meter color-purple"></i> <span>KPI</span></a></div></li>
          <li><div class=shortcut-button><a href=_monitoring.php><i class="im-calendar color-lime"></i> <span>MONITORING</span></a></div></li>
          <li><div class=shortcut-button><a href=_addKpi2.php><i class="br-target2 color-magenta"></i> <span>DEPARTMENT</span></a></div></li> 
          <li><div class=shortcut-button><a href=#><i class="im-stats color-orange"></i> <span>CONFIG</span></a></div></li>
          <!-- <li><div class=shortcut-button><a href=#><i class="en-users color-danger"></i> <span>USERS</span></a></div></li> -->
        </ul>
      </div>
    </div> 
    <!-- End #header-area -->  
  </div>  
  <!-- Start .header-inner --> 
</div>
<!-- End #header -->

<br>

<div id="content" style="margin-left:0px;">
  <!-- Start .content-wrapper -->
  <div class="content-wrapper">

    <div class="outlet">
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->

      <div class="row">
        <!-- Start .row -->

        <div class="col-lg-3 col-md-3">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default plain panelMove panelClose">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
                <h4 class=panel-title>CEO Message</h4>
            </div>
            <div class="panel-body text-center">
              <h2>Hello, Everyone!</h2>
              <p style="font-size: 14px; text-align:center;">We are building a terrific company here. We have been in business for just over five years, growing fast and talking on the big names in our industry as we do it. I am sure PTG can offer an exiciting and rewarding career to each one of you <br><br> Please know that you contribution to the overall success of business is valued and i look forward to your continued contribution.</p>
              <br><br><br>
              <img width="80" height="80" style="border-radius: 50px; border:3px solid rgb(240, 240, 240);" src=../assets/img/ava/er.jpg>
              <h5>President Director<br> GUNANUSA UTAMA FABRICATORS</h5>
            </div>
            <!-- End .panel -->
          </div>
        </div>
        <!-- End col-lg-8 -->

        <div class="col-lg-6 col-md-6">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default plain panelMove panelClose">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border:none;">
                <!--<h4 class=panel-title><i class="br-stats s20"></i> Top Worst Performance</h4>-->
            </div>
            <div class="panel-body" style="border:none;">
              <div class='selector' style="margin-top:170px;">
                <ul>
                  <li>
                    <a class="alink" title="Dashboard Corporate of PTG" href="../_dashCo.php">
                    <input id='1' type='checkbox'>
                    <label for='1' style="background: url(../assets/img/ico/11.png) no-repeat;    background-repeat: no-repeat; background-position: center; -webkit-background-size: contain; -moz-background-size: contain; -o-background-size: contain; background-size: contain;">
                    </label>
                    <span style="font-weight: bold;">DASHBOARD</span>
                    </a>
                  </li>
                  <li>
                    <a class="alink" title="Themes Scorecard of PTG " href="../_scrc.php" style="margin-top:15px;">
                    <input id='2' type='checkbox'>
                    <label for='2' style="background: url(../assets/img/ico/12.png) no-repeat;    background-repeat: no-repeat; background-position: center; -webkit-background-size: contain; -moz-background-size: contain; -o-background-size: contain; background-size: contain;">
                    </label>
                    <span style="font-weight: bold;">SCORECARD</span>
                    </a>
                  </li>
                  <li>
                    <a class="alink" title="Strategic Map of PTG" href="../_sm.php">
                    <input id='3' type='checkbox'>
                    <label for='3' style="background: url(../assets/img/ico/13.png) no-repeat;    background-repeat: no-repeat; background-position: center; -webkit-background-size: contain; -moz-background-size: contain; -o-background-size: contain; background-size: contain;">
                    </label>
                    <span style="font-weight: bold;">STRATEGY</span>
                    </a>
                  </li>
                  <li>
                    <a class="alink" title="All Division Dashboard" href="../_members.php?kd=<?php echo $idv; ?>">
                    <input id='4' type='checkbox'>
                    <label for='4' style="background: url(../assets/img/ico/14.png) no-repeat;    background-repeat: no-repeat; background-position: center; -webkit-background-size: contain; -moz-background-size: contain; -o-background-size: contain; background-size: contain;">
                    </label>
                    <span style="font-weight: bold; -moz-transform: rotate(-180deg);">MEMBERS</span>
                    </a>
                  </li>
                  <li>
                    <a class="alink" title="Individual Dashboard" href="../_addKpi.php">
                    <input id='5' type='checkbox'>
                    <label for='5' style="background: url(../assets/img/ico/15.png) no-repeat;    background-repeat: no-repeat; background-position: center; -webkit-background-size: contain; -moz-background-size: contain; -o-background-size: contain; background-size: contain;">
                    </label>
                    <span style="font-weight: bold; -moz-transform: rotate(-180deg);">INDIVIDUAL</span>
                    </a>
                  </li>
                  <li>
                    <a class="alink" title="Department Dashboard" href="../_ipc.php?kd=<?php echo $idp; ?>">
                    <input id='6' type='checkbox'>
                    <label for='6' style="background: url(../assets/img/ico/16.png) no-repeat;    background-repeat: no-repeat; background-position: center; -webkit-background-size: contain; -moz-background-size: contain; -o-background-size: contain; background-size: contain;">
                    </label>
                    <span style="font-weight: bold; -moz-transform: rotate(-180deg);">APPRAISAL</span>
                    </a>
                  </li>
                  <li>
                    <a class="alink" title="Monitoring KPI's" href="../_help.php">
                    <input id='7' type='checkbox'>
                    <label for='7' style="background: url(../assets/img/ico/17.png) no-repeat;    background-repeat: no-repeat; background-position: center; -webkit-background-size: contain; -moz-background-size: contain; -o-background-size: contain; background-size: contain;">
                    </label>
                    <span style="font-weight: bold;">HELP</span>
                    </a>
                  </li>
                  <li>
                    <a class="alink" title="Performance Report" href="../profile.php">
                    <input id='8' type='checkbox'>
                    <label for='8' style="background: url(../assets/img/ico/18.png) no-repeat;    background-repeat: no-repeat; background-position: center; -webkit-background-size: contain; -moz-background-size: contain; -o-background-size: contain; background-size: contain;">
                    </label>
                    <span style="font-weight: bold;">SETTINGS</span>
                    </a>
                  </li>                         
                </ul>
                <button style="background: url(../assets/img/PTG.jpg) no-repeat;    background-repeat: no-repeat; background-position: center; -webkit-background-size: contain; -moz-background-size: contain; -o-background-size: contain; background-size: contain;"></button>
            </div>
            </div>
            <!-- End .panel -->
          </div>
        </div>
        <!-- End col-lg-8 -->

        <div class="col-lg-3 col-md-3">
          <!-- Start col-lg-6 -->
          <div class="panel panel-default plain panelMove panelClose">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border:none;">
                <!--<h4 class=panel-title><i class="br-stats s20"></i> Top Worst Performance</h4>-->
            </div>
            <div class="panel-body" style="border:none;">

            </div>
            <!-- End .panel -->
          </div>
        </div>
        <!-- End col-lg-8 -->

      </div>      
      <!-- End .row -->       
        
   <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->    


<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/index.js"></script>
<!-- Load pace first -->
<script src=../assets/plugins/core/pace/pace.min.js></script>
<!-- Important javascript libs(put in all pages) -->
<script>window.jQuery || document.write('<script src="../assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')</script>
<script src="assets/js/jquery-ui.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="../assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')</script>

<?PHP   }  else { header("Location: /../apps/gkms/index.php?msg=301"); } ?>
