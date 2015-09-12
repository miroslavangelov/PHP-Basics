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
		<label>Starting index: </label>
		<input type="text" name="start" />
		<label>End: </label>
		<input type="text" name="end" />
		<input type="submit" name="posted" value="Submit"/>
	</form>
	<?php
		if (isset($_POST['posted']) && $_POST['start'] != '' && $_POST['end'] != '' 
		&& is_numeric($_POST['start']) && is_numeric($_POST['end'])
		&& $_POST['start'] > 0 && $_POST['end'] > 0) {
			function isPrime($number) {
				if ($number === 1) {
					return false;
				}
				if ($number === 2) {
					return true;
				}
				if ($number%2 === 0) {
					return false;
				}
				for ($i = 3; $i <= ceil(sqrt($number)); $i += 2) {
					if ($number%$i === 0) {
						return false;
					}
				}
				return true;
			}
			$start = (int)$_POST['start'];
			$end = (int)$_POST['end'];
			for ($i = $start; $i <= $end; $i++) {
				if (isPrime($i)) {
					echo '<strong>'.$i."</strong>";
				}
				else {
					echo $i;
				}
				if ($i != $end) {
					echo ', ';
				}
				
			}
		}
	?>
</body>
</html>