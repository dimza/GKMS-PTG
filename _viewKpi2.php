<?PHP

    //call connection DB and Aunthentic Cookies
	require('sys/db_con/auth.php'); 
	require('sys/db_con/db.php'); 
	require('sys/engine/qryUser.php');
	
	if ($rlUsr == "111") {

    $tab="KPI Details";    
  
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
            var ikpi = $("#contentKpi").val();
            var myData = 'content_txt='+ comm  + '&content_user=' + iusr + '&content_id=' + idep + '&content_kpi=' + ikpi; //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response2.php", //Where to make Ajax calls
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
			url: "response2.php", //Where to make Ajax calls
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
        require('sys/engine/viewKpiQ.php');
        
        require('include/_layout/header.php');
        require('include/_layout/sidebar2.php');
        require('include/pages/B_viewKpi2.php');
?>


<!-- Javascripts -->

<?PHP if ($s=="3") { ?>    
<script type="text/javascript">

    window.onload = function () {

        var dp1 = [];
        var dp2 = [];
        
        $.getJSON("sys/engine/viewJs.php", {id:'<?PHP echo $q; ?>'}, function (result) {
                
            for(var i = 0; i <= result.length-1; i++) {
                        
                dp1.push({label: result[i].label, y: result[i].y});
                dp2.push({label: result[i].label, y: result[i].y2});
                
            }
        
	   var chart11 = new CanvasJS.Chart("11", {

            animationEnabled: true,animationDuration: 5000, toolTip:{ shared:true },zoomEnabled: true,
            axisY: { gridColor: "Silver",tickColor: "silver",suffix: " <?PHP echo $qku4; ?>" },
            axisX:{ gridColor: "Silver",tickColor: "silver" },
            legend:{ verticalAlign: "bottom",horizontalAlign: "center"},
            data: [ 
                { type: "spline",showInLegend: true,lineThickness: 2,name: "Target",markerType: "square",color: "#20B2AA",dataPoints: dp2},
                { type: "spline",showInLegend: true,lineThickness: 2,name: "Actual",markerType: "circle",color: "#F08080",dataPoints: dp1 }

            ]
        });

        chart11.render();
        chart11 = {};
    
    });

    $.getJSON("sys/engine/viewJs2.php", {id:'<?PHP echo $q; ?>'}, function (result2) {
    
    var chart22 = new CanvasJS.Chart("22", {

            animationEnabled: true,animationDuration: 5000,toolTip:{ shared:true },zoomEnabled: true,
            axisY: { suffix: " %" },
		    data: [ {type: "column", name:"Prencetage", dataPoints: result2}]
		
        });

        chart22.render();
        chart22 = {};

    });

}
</script>
<?PHP } else if ($s=="4") { ?>
<script type="text/javascript">

    window.onload = function () {

        var dp1 = [];
        var dp2 = [];
        
        $.getJSON("sys/engine/viewJs.php", {id:'<?PHP echo $q; ?>'}, function (result) {
                
            for(var i = 0; i <= result.length-1; i++) {
                        
                dp1.push({label: result[i].label, y: result[i].y});
                dp2.push({label: result[i].label, y: result[i].y2});
                
            }
        
       var chart11 = new CanvasJS.Chart("11", {

            animationEnabled: true,animationDuration: 5000, toolTip:{ shared:true },
            axisY: { gridColor: "Silver",tickColor: "silver",suffix: " <?PHP echo $qku4; ?>" },
            axisX:{ gridColor: "Silver",tickColor: "silver" },
            legend:{ verticalAlign: "bottom",horizontalAlign: "center"},
            data: [ 
                { type: "column",showInLegend: true,lineThickness: 2,name: "Target",markerType: "square",color: "#20B2AA",dataPoints: dp2 },
                { type: "spline",showInLegend: true,lineThickness: 2,name: "Actual",markerType: "circle",color: "#F08080",dataPoints: dp1 }

            ]
        });

        chart11.render();
        chart11 = {};
    
    });
        
    $.getJSON("sys/engine/viewJs2.php", {id:'<?PHP echo $q; ?>'}, function (result2) {
    
    var chart22 = new CanvasJS.Chart("22",
    {

            animationEnabled: true,
            animationDuration: 5000,                        
            toolTip:{ shared:true },
            axisY: { gridColor: "Silver",tickColor: "silver",suffix: " %" },
            axisX:{ gridColor: "Silver",tickColor: "silver" },
		    data: [
		      {
			     type: "bar", //change it to line, area, bar, pie, etc
                 name: "Prencetage",
                 markerType: "square",
				 color: "#F08080",
                 lineThickness: 2,  
			     dataPoints: result2
		      }
		    ]
		});

        chart22.render();
        chart22 = {};

    });

}
</script>
<?PHP } else if ($s=="5") { ?>
<script type="text/javascript">
    window.onload = function () {

        var dp1 = [];
        var dp2 = [];
        
        $.getJSON("sys/engine/viewJs.php", {id:'<?PHP echo $q; ?>'}, function (result) {
                
            for(var i = 0; i <= result.length-1; i++) {
                        
                dp1.push({label: result[i].label, y: result[i].y});
                dp2.push({label: result[i].label, y: result[i].y2});
                
            }
        
       var chart11 = new CanvasJS.Chart("11", {

            animationEnabled: true,animationDuration: 5000, toolTip:{ shared:true },
            axisY: { gridColor: "Silver",tickColor: "silver",suffix: " <?PHP echo $qku4; ?>" },
            axisX:{ gridColor: "Silver",tickColor: "silver" },
            legend:{ verticalAlign: "bottom",horizontalAlign: "center"},
            data: [ 

                { type: "spline",showInLegend: true,lineThickness: 2,name: "Actual",markerType: "square",color: "#F08080",dataPoints: dp1 },
                { type: "spline",showInLegend: true,lineThickness: 2,name: "Target",markerType: "square",color: "#20B2AA",dataPoints: dp2 }

            ]
        });

        chart11.render();
        chart11 = {};
    
    });
        
    $.getJSON("sys/engine/viewJs2.php", {id:'<?PHP echo $q; ?>'}, function (result2) {
    
    var chart22 = new CanvasJS.Chart("22",
    {

            animationEnabled: true,
            animationDuration: 5000,                        
            toolTip:{ shared:true },
            axisY: { gridColor: "Silver",tickColor: "silver",suffix: " %" },
            axisX:{ gridColor: "Silver",tickColor: "silver" },
            data: [
              {
                 type: "bar", //change it to line, area, bar, pie, etc
                 name: "Prencetage",
                 markerType: "square",
                 color: "#F08080",
                 lineThickness: 2,  
                 dataPoints: result2
              }
            ]
        });

        chart22.render();
        chart22 = {};

    });

    $.getJSON("sys/engine/viewJs3.php", {id:'<?PHP echo $q; ?>'}, function (result) {
        
	var chart33 = new CanvasJS.Chart("33",
	{
		animationEnabled: true,
        animationDuration: 5000,                        
        toolTip:{ shared:true },
        axisY: { gridColor: "Silver",tickColor: "silver",suffix: " <?PHP echo $qku4; ?>" },
        axisX:{ gridColor: "Silver",tickColor: "silver" },
        legend:{ verticalAlign: "bottom",horizontalAlign: "center"},
		data: [
			{        
				type: "spline",
				showInLegend: true,
				name: "Target",
				color: "#20B2AA",
				lineThickness: 2,

				dataPoints: result
			}]
	});

        chart33.render();
        chart33 = {};
    
    });
    
}
</script>
<?PHP } else if ($s=="2") { ?>
<script type="text/javascript">

    window.onload = function () {

        var dp1 = [];
        var dp2 = [];
        
        $.getJSON("sys/engine/viewJs.php", {id:'<?PHP echo $q; ?>'}, function (result) {
                
            for(var i = 0; i <= result.length-1; i++) {
                        
                dp1.push({label: result[i].label, y: result[i].y});
                dp2.push({label: result[i].label, y: result[i].y2});
                
            }
        
       var chart11 = new CanvasJS.Chart("11", {

            animationEnabled: true,animationDuration: 5000, toolTip:{ shared:true },zoomEnabled: true,
            axisY: { gridColor: "Silver",tickColor: "silver",suffix: " <?PHP echo $qku4; ?>" },
            axisX:{ gridColor: "Silver",tickColor: "silver" },
            legend:{ verticalAlign: "bottom",horizontalAlign: "center"},
            data: [ 
                { type: "spline",showInLegend: true,lineThickness: 2,name: "Target",markerType: "square",color: "#20B2AA",dataPoints: dp2 },
                { type: "spline",showInLegend: true,lineThickness: 2,name: "Actual",markerType: "circle",color: "#F08080",dataPoints: dp1 }

            ]
        });

        chart11.render();
        chart11 = {};
    
    });

    $.getJSON("sys/engine/viewJs2.php", {id:'<?PHP echo $q; ?>'}, function (result2) {
    
    var chart22 = new CanvasJS.Chart("22", {

            animationEnabled: true,animationDuration: 5000,toolTip:{ shared:true },zoomEnabled: true,
            axisY: { suffix: " %" },
            data: [ {type: "splineArea", name:"Prencetage", dataPoints: result2}]
        
        });

        chart22.render();
        chart22 = {};

    });

}
</script>
<?PHP } else { } ?>

<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-editable.js" type="text/javascript"></script> 
<script type="text/javascript">
            
    jQuery(document).ready(function() {  
        
        $.fn.editable.defaults.mode = 'popup';
        $('.xedit').editable();   
        $(document).on('click','.editable-submit',function() {
      
            var x = $(this).closest('td').children('span').attr('id');
            var y = $('.input-sm').val();
            var z = $(this).closest('td').children('span');
      
            $.ajax({
                            
                url: "sys/engine/updtAct.php?id="+x+"&data="+y,type: 'GET',success: function(s){ 

                    if(s == 'status'){ $(z).html(y); }
                    if(s == 'error') { alert('Error Processing your Request!');}
                            
                },error: function(e){ alert('Error Processing your Request!!');}
                          
            });
        });
    });
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