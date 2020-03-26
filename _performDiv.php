<?PHP

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php');
	require('sys/engine/qryUser.php');
	
	if ($rlUsr == "111") {

    $tab="VP Performance";    
  
    require('include/_layout/headMeta.php');

?>
<style type="text/css">

#progress-fin-div{
  -webkit-animation-name: progress-fin-div;
  animation-name: progress-fin-div;
  -webkit-animation-delay: .7s;
  animation-delay: .7s;
}
    
#progress-stk-div{
  -webkit-animation-name: progress-stk-div;
  animation-name: progress-stk-div;
  -webkit-animation-delay: 1.4s;
  animation-delay: 1.4s;
}

#progress-ip-div{
  -webkit-animation-name: progress-ip-div;
  animation-name:  progress-ip-div;
  -webkit-animation-delay: 2.1s;
  animation-delay: 2.1s;
}

#progress-lg-div{
  -webkit-animation-name: progress-lg-divl;
  animation-name: progress-lg-div;
  -webkit-animation-delay: 2.8s;
  animation-delay: 2.8s;
}

@-webkit-keyframes progress-fin-div{0%{width: 0%;} 100%{ width: 40%;}}
@-webkit-keyframes progress-stk-div{0%{width: 0%;} 100%{ width: 30%;}}
@-webkit-keyframes progress-ip-div{0%{width: 0%;} 100%{ width: 20%;}}
@-webkit-keyframes progress-lg-div{0%{width: 0%;} 100%{ width: 10%;}}

@-moz-keyframes progress-fin-div{0%{width: 0%;} 100%{ width: 40%;}}
@-moz-keyframes progress-stk-div{0%{width: 0%;} 100%{ width: 30%;}}
@-moz-keyframes progress-ip-div{0%{width: 0%;} 100%{ width: 20%;}}
@-moz-keyframes progress-lg-div{0%{width: 0%;} 100%{ width: 10%;}}

@keyframes progress-fin-div{0%{width: 0%;} 100%{ width: 40%;}}
@keyframes progress-stk-div{0%{width: 0%;} 100%{ width: 30%;}}
@keyframes progress-ip-div{0%{width: 0%;} 100%{ width: 20%;}}
@keyframes progress-lg-div{0%{width: 0%;} 100%{ width: 10%;}}
</style>
<body>

<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        require('include/pages/B_performDiv.php');

?>

<!-- Javascripts -->
<script src=assets/js/pages/gauge.min.js></script>
<script type="text/javascript">
setTimeout(function() {
  $('#fin-div').html('40%');
},2800);

setTimeout(function() {
  $('#stk-div').html('30%');
},3500);

setTimeout(function() {
  $('#ip-div').html('20%');
},4200);

setTimeout(function() {
  $('#lg-div').html('10%');
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