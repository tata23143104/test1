<?php
include('dbconnect.php');
include('head.html');

$sql = "SELECT * FROM pm ORDER by id DESC LIMIT 1";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {

$dataPoints = array(
	array("x"=> 1, "y"=> $row['PM1']),
	array("x"=> 2, "y"=> $row['PM2_5'], "indexLabel"=> "Lowest"),
	array("x"=> $row['DATE'], "y"=> $row['PM10']),

);
														}
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "AQI On Time"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
