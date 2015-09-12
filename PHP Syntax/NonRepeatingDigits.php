<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		$number = 1024;
		$len = min($number, 987);
		$arr = array();
		for($i = 102; $i <= $len; $i++) {
			$hundreds = floor($i/100);
			$tens = floor($i/10)%10;
			$ones = floor($i%10);
			if ($hundreds != $tens && $hundreds != $ones && $tens != $ones) {
				array_push($arr, $i);
			}
		}
		if (sizeof($arr) > 0) {
			echo join(' ', $arr);
		}
		else {
			echo 'no';
		}
	?>
</body>
</html>