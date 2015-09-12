<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
	<style>
		table, th, tr, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<?php
		echo '<table><tr><th>Number</th><th>Square</th></tr>';
		$sum = 0;
		for ($i = 0; $i <= 100; $i+=2) {
			$squaredNumber = round(sqrt($i), 2);
			echo '<tr><td>'.$i.'</td><td>'.$squaredNumber.'</td></tr>';
			$sum += $squaredNumber;
		}
		echo '<tr><th>Total:</th><td>'.$sum.'</td></tr>';
		echo '</table>';
	?>
</body>
</html>