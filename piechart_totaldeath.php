<?php
include('koneksi.php');
$data = mysqli_query($koneksi,"select * from tb_negara");
while($row = mysqli_fetch_array($data)){
	$nama_negara[] = $row['negara'];
	$total_cases[] = $row['total_cases'];
	$new_cases[] = $row['new_cases'];
	$new_death[] = $row['new_death'];
	$total_recovered[] = $row['total_recovered'];
	$active_cases[] = $row['active_cases'];
	$total_death[] = $row['total_death'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pie Chart Total Death</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div id="canvas-holder" style="width:50%; height: 100%;">
		<canvas id="chart-area"></canvas>
	</div>
	<script  type="text/javascript">
	  var ctx = document.getElementById("chart-area").getContext("2d");
	  var data = {
	            labels: <?php echo json_encode($nama_negara); ?>,
	            datasets: [
	            {
	              label: "New Cases",
	              data:<?php echo json_encode($total_death); ?>,
	              backgroundColor: [
	                '#FF0000',
	                '#008000',
	                '#ADFF2F',
	                '#0000FF',
	                '#DC143C',
	                '#00008B',
	                '#A9A9A9',
	                '#9932CC',
	                '#FFFF00',
	                '#FFA500'
	              ]
	            }
	            ]
	            };

	  var myPieChart = new Chart(ctx, {
	                  type: 'pie',
	                  data: data,
	                  options: {
	                    responsive: true
	                }
	              });

	</script>
</body>
</html>
