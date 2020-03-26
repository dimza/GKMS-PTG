<?PHP

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php');	  
	require('sys/engine/qryUser.php');
	
	if ($rlUsr == "111") {

    $tab="Edit Individual KPI";    
  
    require('include/_layout/headMeta.php');

?>

<body>
<?PHP

	    $q= intval($_GET['kd']);
    	$s= intval($_GET['mtr']);
    	$h= intval($_GET['hdn']);

        if ($h=='1') {$hd="";$hd2="panel-closed";} else {$hd="panel-closed";$hd2="";}

        $qki= mysql_query("select * from `kpidetindv` where idKpiDetIndv='$q'") or die(mysql_error());
        $qki2= mysql_result($qki, 0, 'title');
        $qki3= mysql_result($qki, 0, 'descr');
        $qki4= mysql_result($qki, 0, 'code');
        $qki5= mysql_result($qki, 0, 'idEmp');
        $qki6= mysql_result($qki, 0, 'idDiv');
        $qki7= mysql_result($qki, 0, 'idCat');
        $qki8= mysql_result($qki, 0, 'idUnit');
        $qki9= mysql_result($qki, 0, 'idMont');
        $qki10= mysql_result($qki, 0, 'level');
        $qki11= mysql_result($qki, 0, 'target');
        $qki12= mysql_result($qki, 0, 'weight');
        $qki14= mysql_result($qki, 0, 'idSm');

        $qem= mysql_query("select * from `emp` where idUser='$qki5'") or die(mysql_error());
        $qem2= mysql_result($qem, 0, 'fName');
        $qem3= mysql_result($qem, 0, 'lName');
        $qem4= mysql_result($qem, 0, 'idSpv');
        $qem5= mysql_result($qem, 0, 'idDep');
        $qem6= mysql_result($qem, 0, 'idDiv');

        $qdep= mysql_query("select * from `empdep` where idDep='$qem5'") or die(mysql_error());
        $qdep2= mysql_result($qdep, 0, 'descr');

        $qdiv= mysql_query("select * from `empdiv` where idDiv='$qem6'") or die(mysql_error());
        $qdiv2= mysql_result($qdiv, 0, 'descr');
        
        $qsm= mysql_query("select * from `sm` where idSm='$qki14'") or die(mysql_error());
        $qsm2= mysql_result($qsm, 0, 'idCode');
        $qsm3= mysql_result($qsm, 0, 'description');        

        $qmt= mysql_query("select * from `kpimonitoring` where idMont='$qki9'") or die(mysql_error());
        $qmt2= mysql_result($qmt, 0, 'description');        
        
        $kdiMon3= mysql_query("select * from `kpidetindv` where idKpiDetIndv='$q'") or die(mysql_error());
        $kdiMon4= mysql_result($kdiMon3, 0, 'target');

        $qkiTgt= $qki11/12;
        $qkiTgt2= $qki11/4;
        $qkiTgt3= $qki11/1;
        $qkiTgt4= $qki11/48;
        
        $qku3= mysql_query("select * from `kpiunit` where idUnit='$qki8'") or die(mysql_error());
        $qku4= mysql_result($qku3, 0, 'symbol');
        $qku6= mysql_result($qku3, 0, 'description');
        
        $qkc= mysql_query("select * from `kpicat` where idCat='$qki7'") or die(mysql_error());
        $qkc2= mysql_result($qkc, 0, 'desc');
        
        if ($qki10==0) { $qki101="Sub Department Level"; }
        else if ($qki10==1) { $qki101="Department Level"; }
        else if ($qki10==2) { $qki101="Executive Level"; }
        
        $qspv= mysql_query("select * from `empspv` where idSpv='$qem4'") or die(mysql_error());
        $qspv2= mysql_result($qspv, 0, 'descr');
        

?>
<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        require('include/pages/B_editKpi.php');

?>


<!-- Javascripts -->    
<script type="text/javascript">
    function shwTgt(str) { if (str=="") {
        
        document.getElementById("tgt").value="";
        return;
    }
  
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
    
        xmlhttp=new XMLHttpRequest(); } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
  
        xmlhttp.onreadystatechange=function() { if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        
            var data = JSON.parse(xmlhttp.responseText); for(var i=0;i<data.length;i++) {
          
                document.getElementById("tgt").value = data[i].tgt;    
            }
        }
    }
  
        xmlhttp.open("GET","sys/engine/getTgt2.php?q="+str,true);
        xmlhttp.send();
}
</script>
<script type="text/javascript">
    function shwAct(str) { if (str=="") {
        
        document.getElementById("act").value="";
        document.getElementById("rmk").value="";
        return;
    }
  
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
    
        xmlhttp=new XMLHttpRequest(); } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
  
        xmlhttp.onreadystatechange=function() { if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        
            var data = JSON.parse(xmlhttp.responseText); for(var i=0;i<data.length;i++) {
          
                document.getElementById("act").value = data[i].act;
                document.getElementById("rmk").value = data[i].rmk;
            }
        }
    }
  
        xmlhttp.open("GET","sys/engine/getAct.php?q="+str,true);
        xmlhttp.send();
}
</script>
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

<script src=assets/js/pages/forms.js></script>
    
<!-- Google Analytics:  -->

<?PHP   }  else { header("Location: index.php?msg=301"); } ?>