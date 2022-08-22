<?php
 include('dashboard_counter.php');

$dataPoints5 = array(
	array("label"=> "JUNE", "y"=> 34 ),
	array("label"=> "JULY", "y"=> 25 ),
	array("label"=> "AUG", "y"=> 37 ),
	array("label"=> "SEPT", "y"=> 36 ),
	array("label"=> "OCT", "y"=> 31),
	array("label"=> "NOV", "y"=> 27 ),
	array("label"=> "DEC", "y"=> $rowcount77+25 )
);
 
$dataPoints6 = array(
	array("label"=> "JUNE", "y"=> 31 ),
	array("label"=> "JULY", "y"=> 36 ),
	array("label"=> "AUG", "y"=> 39 ),
	array("label"=> "SEPT", "y"=> 32 ),
	array("label"=> "OCT", "y"=> 38 ),
	array("label"=> "NOV", "y"=> 33 ),
	array("label"=> "DEC", "y"=> $rowcount7+27 )
);
 
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", { 
	theme: "light3",
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	toolTip: {
		shared: true
	},
	data: [
	{
		type: "spline",
		name: "Facility",
		showInLegend: true,
		visible: true,
		dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "spline",
		name: "Equipment",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  