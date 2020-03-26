<?PHP

    $today = date("Y-m-d");
    $yr= date("Y");

      //call connection DB and Aunthentic Cookies
	    require('sys/db_con/auth.php'); 
	    require('sys/db_con/db.php');
	  
      //call Seession put into variabel 
        $np=$_SESSION['SESS_ID'];
        $usr=$_SESSION['SESS_USERNAME'];
	  
      //call Query Table Users
	    $qUsr= mysql_query("select * from users where idUser='$np'");
	    $dtUsr = mysql_fetch_array($qUsr);

      //put Variable from Qry Tbl Users to variabel role	  
	    $rlUsr = $dtUsr['role'];
        $rlGtd = $dtUsr['granted'];
        $uStat = $dtUsr['status'];

        if ($uStat=='0') { $uStat2="Active"; } else if ($uStat=='1') { $uStat2="Suspend"; } else { $uStat2="Disable"; }

      //call Query Table Emp
	    $qEmp= mysql_query("select * from emp where idUser='$np'");
	    $dtEmp = mysql_fetch_array($qEmp);

        $elvl = $dtEmp['level'];
        $fname = $dtEmp['fName'];
        $lname = $dtEmp['lName'];
        $sex = $dtEmp['sex'];
        $ava = $dtEmp['avatar'];
        $idep = $dtEmp['idDep'];
        $ipos = $dtEmp['idPos'];
        $idiv = $dtEmp['idDiv'];
        $isec = $dtEmp['idSec'];
        $ispv = $dtEmp['idSpv'];
        $idv = $dtEmp['idDiv'];
        $phn = $dtEmp['phone'];
        $mob = $dtEmp['mobile'];

        if ($elvl=='0') { $elvl2="Staff"; } else if ($elvl=='1') { $elvl2="Manager"; } else if ($elvl=='2') { $elvl2="Vice President"; } else if ($elvl=='3') { $elvl2="Director"; } else if ($elvl=='4') { $elvl2="BOC"; } else { $elvl2="none"; }
	
      $qDep= mysql_query("select * from empdep where idDep='$idep'");
	    $dtDep = mysql_fetch_array($qDep);
	  
	    $dscDep = $dtDep['code'];

      $qSec= mysql_query("select * from empsec where idSec='$isec'");
	    $dtSec = mysql_fetch_array($qSec);
	  
        if($isec=='0') { $dscSec="None";} else { $dscSec = $dtSec['descr'];}

      $qPos= mysql_query("select * from emppos where idPos='$ipos'");
	    $dtPos = mysql_fetch_array($qPos);
	  
	    $dscPos = $dtPos['descr'];

      $qDiv= mysql_query("select * from empdiv where idDiv='$idiv'");
	    $dtDiv = mysql_fetch_array($qDiv);
	  
	    $dscDiv = $dtDiv['code'];

      $qSpv= mysql_query("select * from empspv where idSpv='$ispv'");
	    $dtSpv = mysql_fetch_array($qSpv);
	  
	    $dscSpv = $dtSpv['descr'];

      if($sex=='1') { $sex2="Male";} else if($sex=='2') { $sex2="Female";} else { $sex2="Not Specific";}
      if($sex=='1') { $sex2="Male";} else if($sex=='2') { $sex2="Female";}


	      if ($rlUsr == "111") {

          $tab="Profile Setting";    
  
      require('include/_layout/headMeta.php');?>
<body>
<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php'); 
        require('include/pages/B_profile.php');
    
    ?>


<!-- Javascripts -->
<!-- Load pace first -->
<script src=assets/plugins/core/pace/pace.min.js></script>
<!-- Important javascript libs(put in all pages) -->
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')</script>
<!-- <script src="assets/js/jquery-ui.js" type="text/javascript"></script> -->
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')</script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="assets/js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="assets/js/libs/respond.min.js"></script>
<![endif]-->
<script src=assets/js/jquery-ui.js></script>
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->

<?PHP   }  else { header("Location: index.php?msg=301"); } ?>