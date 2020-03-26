<?PHP

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php'); 
	require('sys/engine/qryUser.php');
	
	if ($rlUsr == "111") {

    $tab="Individual Dashboard";    
  
    require('include/_layout/headMeta.php');

?>
<link rel=stylesheet type=text/css href="assets/css/prg_indv.css">
<script src="assets/js/libs/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	//##### send add record Ajax request to response.php #########
	$("#FormSubmit").click(function (e) {
			e.preventDefault();
			if($("#contentText").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
			
			$("#FormSubmit").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
		 	//var myData = '?content_txt='+ $("#contentText").val()+ '&content_id='+ $("#contentId").val(); //build a post data structure
            var idep = $("#contentId").val();
            var iusr = $("#contentUser").val();
            var comm = $("#contentText").val();
            var myData = 'content_txt='+ comm  + '&content_user=' + iusr + '&content_id=' + idep; //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#responds").append(response);
				$("#contentText").val(''); //empty text field on successful
				$("#FormSubmit").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#FormSubmit").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

	//##### Send delete Ajax request to response.php #########
	$("body").on("click", "#responds .del_button", function(e) {
		 e.preventDefault();
		 var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
		 var DbNumberID = clickedID[1]; //and get number from array
		 var myData = 'recordToDelete='+ DbNumberID; //build a post data structure
		 
		$('#item_'+DbNumberID).addClass( "sel" ); //change background of this element by adding class
		$(this).hide(); //hide currently clicked delete button
		 
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				//on success, hide  element user wants to delete.
				$('#item_'+DbNumberID).fadeOut();
			},
			error:function (xhr, ajaxOptions, thrownError){
				//On error, we alert user
				alert(thrownError);
			}
			});
	});

});
</script>
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
        $qspv2= mysql_result($qspv, 0, 'descr');
        

?>
<?PHP

    $var = @$_GET['kd'];
    $var2 = @$_GET['id'];
    $alrt = @$_GET['al']; 

    $qIKDI= mysql_query("SELECT * FROM `kpidetindv` ORDER BY idKpiDetIndv DESC LIMIT 1") or die(mysql_error());
    $qIKDI2= mysql_result($qIKDI, 0, 'idKpiDetIndv');
    $qIKDI3= $qIKDI2+'1';

  if ($lvl=='2') {

        $qcat= mysql_query("select * from `kpicat` where idCat='1'") or die(mysql_error());
        $qcat2= mysql_result($qcat, 0, 'wDiv');

        $qcat5= mysql_query("select * from `kpicat` where idCat='2'") or die(mysql_error());
        $qcat6= mysql_result($qcat5, 0, 'wDiv');

        $qcat9= mysql_query("select * from `kpicat` where idCat='3'") or die(mysql_error());
        $qcat10= mysql_result($qcat9, 0, 'wDiv');

        $qcat13= mysql_query("select * from `kpicat` where idCat='4'") or die(mysql_error());
        $qcat14= mysql_result($qcat13, 0, 'wDiv');

    } else if ($lvl=='1') {

        $qcat= mysql_query("select * from `kpicat` where idCat='1'") or die(mysql_error());
        $qcat2= mysql_result($qcat, 0, 'wDep');

        $qcat5= mysql_query("select * from `kpicat` where idCat='2'") or die(mysql_error());
        $qcat6= mysql_result($qcat5, 0, 'wDep');

        $qcat9= mysql_query("select * from `kpicat` where idCat='3'") or die(mysql_error());
        $qcat10= mysql_result($qcat9, 0, 'wDep');

        $qcat13= mysql_query("select * from `kpicat` where idCat='4'") or die(mysql_error());
        $qcat14= mysql_result($qcat13, 0, 'wDep');

    } else if ($lvl=='0') {

        $qcat= mysql_query("select * from `kpicat` where idCat='1'") or die(mysql_error());
        $qcat2= mysql_result($qcat, 0, 'wIndv');

        $qcat5= mysql_query("select * from `kpicat` where idCat='2'") or die(mysql_error());
        $qcat6= mysql_result($qcat5, 0, 'wIndv');

        $qcat9= mysql_query("select * from `kpicat` where idCat='3'") or die(mysql_error());
        $qcat10= mysql_result($qcat9, 0, 'wIndv');

        $qcat13= mysql_query("select * from `kpicat` where idCat='4'") or die(mysql_error());
        $qcat14= mysql_result($qcat13, 0, 'wIndv');

    } else {}

?>
<?PHP 

        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        require('include/pages/B_viewEmp3.php');
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