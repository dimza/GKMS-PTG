<?PHP

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php');
	require('sys/engine/qryUser.php');
	
	if ($rlUsr == "111") {

    $tab="Section Perfomance";    
  
    require('include/_layout/headMeta.php');

?>

<body>

<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        require('include/pages/B_performSec.php');

?>

<!-- Javascripts -->
<script src=assets/js/pages/gauge.min.js></script>
<script type="text/javascript">
setTimeout(function() {
  $('#html-pourcent').html('100%');
},2800);

setTimeout(function() {
  $('#css-pourcent').html('90%');
},3500);

setTimeout(function() {
  $('#javascript-pourcent').html('70%');
},4200);

setTimeout(function() {
  $('#php-pourcent').html('55%');
},4900);

setTimeout(function() {
  $('#html-pourcent2').html('100%');
},2800);

setTimeout(function() {
  $('#css-pourcent2').html('90%');
},3500);

setTimeout(function() {
  $('#javascript-pourcent2').html('70%');
},4200);

setTimeout(function() {
  $('#php-pourcent2').html('55%');
},4900);
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
<script src=assets/js/pages/data-tables.js></script>
<!-- Google Analytics:  -->

<?PHP   }  else { header("Location: index.php?msg=301"); } ?>