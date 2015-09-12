<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		$firstNumber = 5;
		$secondNumber = 4.4151;
		function calculate($first, $second) {
			return round($first, 2) + round($second, 2);
		}
		echo calculate($firstNumber, $secondNumber);
	?>
</body>
</html>