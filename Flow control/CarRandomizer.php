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
	<form method="post">
		<label>Enter cars:</label><br />
		<input type="text" name="cars" /><br />
		<input type="submit" name="posted" value="Show result"/>
	</form>
	<?php
		$colors = ["white", "black", "blue", "yellow", "red", "purple", "gray", "green"];
		if (isset($_POST['posted'])) {
			echo '<table><tr><th>Cars</th><th>Color</th><th>Count</th></tr>';
			$cars = explode(', ', $_POST['cars']);
			for ($i = 0; $i < count($cars); $i++) {
				$currentCar = $cars[$i];
				$randomColor = $colors[rand(0, count($colors) - 1)];
				$randomQuantity = rand(1,5);
				echo '<tr><td>'.$currentCar.'</td><td>'.$randomColor.'</td><td>'.$randomQuantity.'</td></tr>';
			}
			echo '</table>';
		}
	?>
</body>
</html>