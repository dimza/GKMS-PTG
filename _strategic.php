<?PHP

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php');	  
	require('sys/engine/qryUser.php');
	
	if ($rlUsr == "111") {

    $tab="PTG";    
  
    require('include/_layout/headMeta.php');

?>

<body>

<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        require('include/pages/B_strategic.php');
?>



<!-- Javascripts -->
   
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