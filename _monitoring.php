<?PHP

    $yr= date("Y");

    $today = date("Y-m-d");
    $tdy = date("d/m/y");
    $tdy2 = date("d/m/y", strtotime("-2 day"));
    $tdy3 = date("d/m/y", strtotime("+1 day"));
    $tdy4 = date("d/m/y", strtotime("+2 day"));
    $tdy5 = date("D", strtotime("-2 day"));
    $tdy6 = date("D", strtotime("-1 day"));
    $tdy7 = date("D");
    $tdy8 = date("D", strtotime("+1 day"));
    $tdy9 = date("D", strtotime("+2 day"));
    
    $wk = date("W");
    $wk2 = date("W", strtotime("-1 week"));
    $wk3 = date("W", strtotime("-2 week"));
    $wk4 = date("W", strtotime("+1 week"));
    $wk5 = date("W", strtotime("+2 week"));
    $wk6 = "Week-".$wk;

    $mt = date("M-y");
    $mt2 = date("M-y", strtotime("-1 month"));
    $mt3 = date("M-y", strtotime("-2 month"));
    $mt4 = date("M-y", strtotime("+1 month"));
    $mt5 = date("M-y", strtotime("+2 month"));

    $cq= date("m", time());
    $cq2= ceil($cq/3);
    $cq3= $cq2+2;
    $cq4= $cq2+3;
    $cq5= $cq2+1;
    $cq6= $cq2+2;

    $cq7= "Q".$cq2."-".$yr;

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php');	  
	require('sys/engine/qryUser.php');
	
	if ($rlUsr == "111") {

    $tab="Monitoring KPI";    
  
    require('include/_layout/headMeta.php');

?>

<body>

<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        require('include/pages/B_monitoring3.php');
?>



<!-- Javascripts -->
<script type="text/javascript">
function shwTgt(str) {
  if (str=="") {
    document.getElementById("tgt").value="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var data = JSON.parse(xmlhttp.responseText);
        for(var i=0;i<data.length;i++) 
        {
          document.getElementById("act").value = data[i].prd;    
          document.getElementById("tgt").value = data[i].tar;
          document.getElementById("prg").value = data[i].prog;
        }
    }
  }
  xmlhttp.open("GET","sys/engine/getTgt.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script type="text/javascript">
function shwTgt2(str) {
  if (str=="") {
    document.getElementById("tgt").value="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var data = JSON.parse(xmlhttp.responseText);
        for(var i=0;i<data.length;i++) 
        {
          document.getElementById("act2").value = data[i].prd;    
          document.getElementById("tgt2").value = data[i].tar;
          document.getElementById("prg2").value = data[i].prog;
        }
    }
  }
  xmlhttp.open("GET","sys/engine/getTgt.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script type="text/javascript">
function shwTgt3(str) {
  if (str=="") {
    document.getElementById("tgt").value="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var data = JSON.parse(xmlhttp.responseText);
        for(var i=0;i<data.length;i++) 
        {
          document.getElementById("act3").value = data[i].prd;    
          document.getElementById("tgt3").value = data[i].tar;
          document.getElementById("prg3").value = data[i].prog;
        }
    }
  }
  xmlhttp.open("GET","sys/engine/getTgt.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script type="text/javascript">
function shwTgt4(str) {
  if (str=="") {
    document.getElementById("tgt").value="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var data = JSON.parse(xmlhttp.responseText);
        for(var i=0;i<data.length;i++) 
        {
          document.getElementById("act4").value = data[i].prd;    
          document.getElementById("tgt4").value = data[i].tar;
          document.getElementById("prg4").value = data[i].prog;
        }
    }
  }
  xmlhttp.open("GET","sys/engine/getTgt.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script>
function showSM(str) {
  if (str=="") {
    document.getElementById("txtSM").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtSM").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sys/engine/getSM.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script type="text/javascript">
function showCD(str) {
  if (str=="") {
    document.getElementById("CD").value="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var data = JSON.parse(xmlhttp.responseText);
        for(var i=0;i<data.length;i++) 
        {
          document.getElementById("CD").value = data[i].cd;    
        }
    }
  }
  xmlhttp.open("GET","sys/engine/getCD.php?q="+str,true);
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