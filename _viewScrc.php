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
        require('include/pages/B_viewScrc.php');
?>



<!-- Javascripts -->
<script type="text/javascript">
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer",
		{

			animationEnabled: true,
			axisX:{

				gridColor: "Silver",
				tickColor: "silver",
				valueFormatString: "DD/MMM"

			},                        
                        toolTip:{
                          shared:true
                        },
			theme: "theme2",
			axisY: {
				gridColor: "Silver",
				tickColor: "silver"
			},
			legend:{
				verticalAlign: "center",
				horizontalAlign: "right"
			},
			data: [
			{        
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Actual",
				markerType: "square",
				color: "#F08080",
				dataPoints: [
				{ x: new Date(2010,0,3), y: 650 },
				{ x: new Date(2010,0,5), y: 700 },
				{ x: new Date(2010,0,7), y: 710 },
				{ x: new Date(2010,0,9), y: 658 },
				{ x: new Date(2010,0,11), y: 734 },
				{ x: new Date(2010,0,13), y: 963 },
				{ x: new Date(2010,0,15), y: 847 },
				{ x: new Date(2010,0,17), y: 853 },
				{ x: new Date(2010,0,19), y: 869 },
				{ x: new Date(2010,0,21), y: 943 },
				{ x: new Date(2010,0,23), y: 970 }
				]
			},
			{        
				type: "line",
				showInLegend: true,
				name: "Target",
				color: "#20B2AA",
				lineThickness: 2,

				dataPoints: [
				{ x: new Date(2010,0,3), y: 510 },
				{ x: new Date(2010,0,5), y: 560 },
				{ x: new Date(2010,0,7), y: 540 },
				{ x: new Date(2010,0,9), y: 558 },
				{ x: new Date(2010,0,11), y: 544 },
				{ x: new Date(2010,0,13), y: 693 },
				{ x: new Date(2010,0,15), y: 657 },
				{ x: new Date(2010,0,17), y: 663 },
				{ x: new Date(2010,0,19), y: 639 },
				{ x: new Date(2010,0,21), y: 673 },
				{ x: new Date(2010,0,23), y: 660 }
				]
			}

			
			],
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart.render();
            }
          }
		});

chart.render();
}
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

<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->

<?PHP 	}  else { header("Location: index.php?msg=301"); } ?>