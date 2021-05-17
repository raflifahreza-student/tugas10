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
	<title>Grafik Bar Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 100px">
		<canvas id="myChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
				datasets: [{
					label: 'Total Cases',
					data: <?php echo json_encode($total_cases); ?>,
					backgroundColor: 'rgba(255,0,0)',
					borderColor: 'rgba(255,0,0)',
					borderWidth: 1
				},
				{
					label: 'Total Death',
					data: <?php echo json_encode($total_death); ?>,
					backgroundColor: 'rgba(0, 0, 0)',
					borderColor: 'rgba(0, 0, 0)',
					borderWidth: 1
				},
				{
					label: 'New Cases',
					data: <?php echo json_encode($new_cases); ?>,
					backgroundColor: 'rgba(220, 20, 60, 1)',
					borderColor: 'rgba(0, 0, 0)',
					borderWidth: 1
				},
				{
					label: 'New Death',
					data: <?php echo json_encode($new_death); ?>,
					backgroundColor: 'rgba(19, 100, 0, 1)',
					borderColor: 'rgba(0, 0, 0)',
					borderWidth: 1
				},
				{
					label: 'Total Recovered',
					data: <?php echo json_encode($total_recovered); ?>,
					backgroundColor: 'rgba(251, 140, 1, 1)',
					borderColor: 'rgba(0, 0, 0)',
					borderWidth: 1
				},
				{
					label: 'Active Cases',
					data: <?php echo json_encode($active_cases); ?>,
					backgroundColor: 'rgba(148, 0, 211, 1)',
					borderColor: 'rgba(0, 0, 0)',
					borderWidth: 1
				},]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>
