<?PHP

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php');
	require('sys/engine/qryUser.php');

    $pgs= intval($_GET['pg']);
	
	if ($rlUsr == "111") {

    $tab="Individual KPI";    
  
    require('include/_layout/headMeta.php');

?>

<body>

<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        
        if ($pgs=="1") { require('include/pages/B_addKpi3.php'); } else { require('include/pages/B_addKpi.php');} 
            
?>

<!-- Javascripts -->
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
function showCD2(str) {
  if (str=="") {
    document.getElementById("CD2").value="";
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
          document.getElementById("CD2").value = data[i].cd;    
        }
    }
  }
  xmlhttp.open("GET","sys/engine/getCD.php?q="+str,true);
  xmlhttp.send();
}
function showCD3(str) {
  if (str=="") {
    document.getElementById("CD3").value="";
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
          document.getElementById("CD3").value = data[i].cd;    
        }
    }
  }
  xmlhttp.open("GET","sys/engine/getCD.php?q="+str,true);
  xmlhttp.send();
}
function showCD4(str) {
  if (str=="") {
    document.getElementById("CD4").value="";
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
          document.getElementById("CD4").value = data[i].cd;    
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