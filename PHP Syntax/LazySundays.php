<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		date_default_timezone_set("Europe/Sofia");
        $month =  date('m');
        $year = date('Y');
		$sunday = strtotime("first Sunday of " . $month . $year);
		$sundays = array();
		array_push($sundays, $sunday);
		for ($i = 0; $i < 5; $i++) {
			$sunday = strtotime('+ 7 days', $sunday);
			if (date('m', $sunday) != $month) {
				break;
			}
			array_push($sundays, $sunday);
		}
		foreach ($sundays as $sunday) {
			echo date('jS F, Y', $sunday)."<br />";
		}
	?>
</body>
</html>