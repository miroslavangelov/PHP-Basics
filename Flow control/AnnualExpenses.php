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
		<label>Enter number of years:</label><br />
		<input type="text" name="years" /><br />
		<input type="submit" name="posted" value="Show costs"/>
	</form>
	<?php
		echo '<table><tr><th>Year</th><th>January</th><th>February</th><th>March</th><th>April</th><th>May</th>
			<th>June</th><th>July</th><th>August</th><th>September</th><th>October</th><th>November</th><th>December</th><th>Total:</th></tr>';
		if (isset($_POST['posted'])) {
			$years = $_POST['years'];
			date_default_timezone_set("Europe/Sofia");
			$year = date('Y');
			for ($i = $years; $i > 0; $i --) {
				$currentYear = $year --;
				$totalExpenses = 0;
				echo '<tr><td>'.$currentYear.'</td>';
				for ($j = 0; $j < 12; $j++) {
					$expenses = rand(0,999);
					$totalExpenses += $expenses;
					echo '<td>'.$expenses.'</td>';
				}
				echo '<td>'.$totalExpenses.'</td></tr>';
			}
			
		}
		echo '</table>';
	?>
</body>
</html>