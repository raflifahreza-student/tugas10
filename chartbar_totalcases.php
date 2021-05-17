<?php
include('koneksi.php');
$data = mysqli_query($koneksi,"select * from tb_negara");
while($row = mysqli_fetch_array($data)){
	$nama_negara[] = $row['negara'];
	
	$jumlah[] = $row['total_cases'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Grafik Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div style="width: 800px;height: 800px">
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
					data: <?php echo json_encode($jumlah); ?>,
					backgroundColor: 'rgba(255,255,224)',
					borderColor: 'rgba(255,99,132,1)',
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
