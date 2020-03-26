	window.onload = function () {

		var chart11 = new CanvasJS.Chart("11",
			{
				animationEnabled: true,animationDuration: 5000,data: [
					
					{

						type: "spline", showInLegend: true, legendText: "Actual", color: "#00ACAC", markerType: "square", dataPoints: [
							
							{ x: 10, y: 22 },{ x: 20, y: 40},{ x: 30, y: 20 },{ x: 40, y: 35 },{ x: 50, y: 76 },{ x: 60, y: 60 },{ x: 70, y: 15 },{ x: 80, y: 37 },{ x: 90, y: 16}]

						},{ type: "spline", showInLegend: true, legendText: "Target", dataPoints: [
				
							{ x: 10, y: 21 },{ x: 20, y: 44},{ x: 30, y: 35 },{ x: 40, y: 45 },{ x: 50, y: 75 },{ x: 60, y: 58 },{ x: 70, y: 18 },{ x: 80, y: 30 },{ x: 90, y: 11} ]
						
						}]
					}
				);

	   			chart11.render();
        			chart11 = {};
        
    var chart22 = new CanvasJS.Chart("22",
    {

			animationEnabled: true,
            animationDuration: 5000,
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
				type: "spline",
				showInLegend: true,
				lineThickness: 2,
				name: "Actual",
				markerType: "square",
				color: "#00ACAC",
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
				type: "spline",
				showInLegend: true,
				name: "Target",
				color: "#C24642",
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
              chart22.render();
            }
          }
		});

        chart22.render();
        chart22 = {};

    var chart33 = new CanvasJS.Chart("33",
    {      
      theme:"theme2",

      animationEnabled: true,
      axisY :{
        includeZero: false,
        // suffix: " k",
        valueFormatString: "#,,.",
        suffix: " mn"
        
      },
      toolTip: {
        shared: "true"
      },
      data: [
      {        
        type: "spline", 
        showInLegend: true,
        name: "Season 2",
        // markerSize: 0,        
        // color: "rgba(54,158,173,.6)",
        dataPoints: [
        {label: "Ep. 1", y: 3858000},
        {label: "Ep. 2", y: 3759000},        
        {label: "Ep. 3", y: 3766000},        
        {label: "Ep. 4", y: 3654000},        
        {label: "Ep. 5", y: 3903000},        
        {label: "Ep. 6", y: 3879000},        
        {label: "Ep. 7", y: 3694000},        
        {label: "Ep. 8", y: 3864000},        
        {label: "Ep. 9", y: 3384000},        
        {label: "Ep. 10", y: 4200000}        

        ]
      },
      {        
        type: "spline", 
        showInLegend: true,
        // markerSize: 0,
        name: "Season 1",
        dataPoints: [
        {label: "Ep. 1", y: 2220000},
        {label: "Ep. 2", y: 2200000},        
        {label: "Ep. 3", y: 2440000},        
        {label: "Ep. 4", y: 2450000},        
        {label: "Ep. 5", y: 2580000},        
        {label: "Ep. 6", y: 2440000},        
        {label: "Ep. 7", y: 2400000},        
        {label: "Ep. 8", y: 2720000},        
        {label: "Ep. 9", y: 2660000},        
        {label: "Ep. 10", y: 3040000}        

        ]
      } 
      

      ],
      legend:{
        cursor:"pointer",
        itemclick : function(e) {
          if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
          	e.dataSeries.visible = false;
          }
          else {
            e.dataSeries.visible = true;
          }
          chart.render();
        }
        
      },
    });

        chart33.render();
        chart33 = {};

    var chart44 = new CanvasJS.Chart("44",
    {      
      animationEnabled: true,
      axisY :{
        includeZero: false
      },
      toolTip: {
        shared: "true"
      },
      data: [
      {        
        type: "spline", 
        showInLegend: true,
        name: "mentions of iPhone",
        markerSize: 0,        
        dataPoints: [
        {x: new Date(2013,4,1 ), y: 430576},
        {x: new Date(2013,4,2 ), y: 498157},      
        {x: new Date(2013,4,3 ), y: 415128},      
        {x: new Date(2013,4,4 ), y: 342031},      
        {x: new Date(2013,4,5 ), y: 320376},      
        {x: new Date(2013,4,6 ), y: 405322},      
        {x: new Date(2013,4,7 ), y: 433426},      
        {x: new Date(2013,4,8 ), y: 430876},      
        {x: new Date(2013,4,09 ), y: 372277},      
        {x: new Date(2013,4,10 ), y: 351863},      
        {x: new Date(2013,4,11 ), y: 281959},      
        {x: new Date(2013,4,12 ), y: 282666},      
        {x: new Date(2013,4,13 ), y: 353718},      
        {x: new Date(2013,4,14 ), y: 507833}    
        ]
      },
      {        
        type: "spline", 
        showInLegend: true,
        name: "mentions of samsung",
        markerSize: 0,        
        dataPoints: [
        {x: new Date(2013,4,1 ), y: 110386},
        {x: new Date(2013,4,2 ), y: 110330},      
        {x: new Date(2013,4,3 ), y: 108025},      
        {x: new Date(2013,4,4 ), y: 59493},      
        {x: new Date(2013,4,5 ), y: 66765},      
        {x: new Date(2013,4,6 ), y: 102950},      
        {x: new Date(2013,4,7 ), y: 89233},      
        {x: new Date(2013,4,8 ), y: 89133},      
        {x: new Date(2013,4,09 ), y: 86751},      
        {x: new Date(2013,4,10 ), y: 58672},      
        {x: new Date(2013,4,11 ), y: 43560},      
        {x: new Date(2013,4,12 ), y: 87404},      
        {x: new Date(2013,4,13 ), y: 202324},      
        {x: new Date(2013,4,14 ), y: 208084}    
        ]
      }      
      ]
    });

        chart44.render();
        chart44 = {};

        
}
    