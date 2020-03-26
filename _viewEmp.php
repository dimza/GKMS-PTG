<?PHP

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php'); 
	require('sys/engine/qryUser.php');
	
	if ($rlUsr == "111") {

    $tab="Individual Dashboard";    
  
    require('include/_layout/headMeta.php');

?>
<style type="text/css">
#progress-fin-individual{
  -webkit-animation-name: progress-fin-individual;
  animation-name: progress-fin-individual;
  -webkit-animation-delay: .7s;
  animation-delay: .7s;
}
    
#progress-stk-individual{
  -webkit-animation-name: progress-stk-individual;
  animation-name: progress-stk-individual;
  -webkit-animation-delay: 1.4s;
  animation-delay: 1.4s;
}

#progress-ip-individual{
  -webkit-animation-name: progress-ip-individual;
  animation-name:  progress-ip-individual;
  -webkit-animation-delay: 2.1s;
  animation-delay: 2.1s;
}

#progress-lg-individual{
  -webkit-animation-name: progress-lg-individual;
  animation-name: progress-lg-individual;
  -webkit-animation-delay: 2.8s;
  animation-delay: 2.8s;
}

@-webkit-keyframes progress-fin-individual{0%{width: 0%;} 100%{ width: 10%;}}
@-webkit-keyframes progress-stk-individual{0%{width: 0%;} 100%{ width: 30%;}}
@-webkit-keyframes progress-ip-individual{0%{width: 0%;} 100%{ width: 35%;}}
@-webkit-keyframes progress-lg-individual{0%{width: 0%;} 100%{ width: 25%;}}

@-moz-keyframes progress-fin-individual{0%{width: 0%;} 100%{ width: 10%;}}
@-moz-keyframes progress-stk-individual{0%{width: 0%;} 100%{ width: 30%;}}
@-moz-keyframes progress-ip-individual{0%{width: 0%;} 100%{ width: 35%;}}
@-moz-keyframes progress-lg-individual{0%{width: 0%;} 100%{ width: 25%;}}

@keyframes progress-fin-individual{0%{width: 0%;} 100%{ width: 10%;}}
@keyframes progress-stk-individual{0%{width: 0%;} 100%{ width: 30%;}}
@keyframes progress-ip-individual{0%{width: 0%;} 100%{ width: 35%;}}
@keyframes progress-lg-individual{0%{width: 0%;} 100%{ width: 25%;}}

    
</style>
<body>
<?PHP

	$q= intval($_GET['kd']);
    	$s= intval($_GET['mtr']);

        $qem= mysql_query("select * from `emp` where idUser='$q'") or die(mysql_error());
        $qem2= mysql_result($qem, 0, 'fName');
        $qem3= mysql_result($qem, 0, 'lName');
        $qem4= mysql_result($qem, 0, 'idSpv');
        $qem5= mysql_result($qem, 0, 'idDep');
        $qem6= mysql_result($qem, 0, 'idDiv');
        $qem7= mysql_result($qem, 0, 'idPos');
        $qem8= mysql_result($qem, 0, 'avatar');
        $qem9= mysql_result($qem, 0, 'idUser');

        if ($qem8=="") { $foto="bb.jpg";} else { $foto=$qem8; }

        $qpos= mysql_query("select * from `emppos` where idPos='$qem7'") or die(mysql_error());
        $qpos2= mysql_result($qpos, 0, 'descr');        

        $qdep= mysql_query("select * from `empdep` where idDep='$qem5'") or die(mysql_error());
        $qdep2= mysql_result($qdep, 0, 'descr');

        $qdiv= mysql_query("select * from `empdiv` where idDiv='$qem6'") or die(mysql_error());
        $qdiv2= mysql_result($qdiv, 0, 'descr');
        
        $kdiMon3= mysql_query("select * from `kpidetindv` where idKpiDetIndv='$q'") or die(mysql_error());
            While ($kdiMon3_row= mysql_fetch_assoc($kdiMon3)) { $kdiMon4 = $kdiMon3_row['target'];}

        $qkiTgt= $qki11/12;
        $qkiTgt2= $qki11/4;
        $qkiTgt3= $qki11/1;
        $qkiTgt4= $qki11/48;
        
        $qku= mysql_query("select * from `kpimonitoring` where idMont='$qki9'") or die(mysql_error());
            While ($qku_row= mysql_fetch_assoc($qku)) { $qku2 = $qku_row['symbol']; $qku5 = $qku_row['description'];}
        
        $qku3= mysql_query("select * from `kpiunit` where idUnit='$qki8'") or die(mysql_error());
            While ($qku2_row= mysql_fetch_assoc($qku3)) { $qku4 = $qku2_row['symbol']; $qku6 = $qku2_row['description'];} 
        
        list($cnt)=mysql_fetch_array(mysql_query("select COUNT(*) from `monthkpimontindv` where idKpiDetIndv='$q'"));
        list($cnt2)=mysql_fetch_array(mysql_query("select SUM(actual) from `monthkpimontindv` where idKpiDetIndv='$q'"));
        
        if ($s=="3") { $cnt3= $cnt*$qkiTgt; }
        else if ($s=="4") { $cnt3= $cnt*$qkiTgt2; }
        else if ($s=="5") { $cnt3= $cnt*$qkiTgt3; }
        else if ($s=="2") { $cnt3= $cnt*$qkiTgt4; }
        else { }

	
	 //if($cnt3 > 0) { $cnt4= $cnt2/$cnt3; } else { $cnt4= $cnt3/$cnt2; }
        $cnt5= number_format($cnt4 * 100, 0);
     
        $qkc= mysql_query("select * from `kpicat` where idCat='$qki7'") or die(mysql_error());       
            While ($qkc_row= mysql_fetch_assoc($qkc)) { $qkc2 = $qkc_row['desc']; }         
        
        if ($qki10==0) { $qki101="Sub Department Level"; }
        else if ($qki10==1) { $qki101="Department Level"; }
        else if ($qki10==2) { $qki101="Executive Level"; }
        
        $qspv= mysql_query("select * from `empspv` where idSpv='$qem4'") or die(mysql_error());
        $qspv2= mysql_result($qspv, 0, 'desc');
        

?>
<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        require('include/pages/B_viewEmp.php');
?>


<!-- Javascripts -->
<script src=assets/js/pages/gauge.min.js></script>
<script type="text/javascript">
setTimeout(function() {
  $('#fin-individual').html('10%');
},2800);

setTimeout(function() {
  $('#stk-individual').html('30%');
},3500);

setTimeout(function() {
  $('#ip-individual').html('35%');
},4200);

setTimeout(function() {
  $('#lg-individual').html('25%');
},4900);

</script>  
<script type="text/javascript" src="assets/js/pages/canvasjs.min.js"></script>    
<!-- Load pace first -->
<script src=assets/plugins/core/pace/pace.min.js></script>
<!-- Important javascript libs(put in all pages) -->
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')</script>
<script src="assets/js/jquery-ui.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')</script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="assets/js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="assets/js/libs/respond.min.js"></script>
<![endif]-->
<script src=assets/js/pages/data-tables.js></script>
<!-- Google Analytics:  -->

<?PHP   }  else { header("Location: index.php?msg=301"); } ?>