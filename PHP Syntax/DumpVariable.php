<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		$var = array(1,2,3);
		if (Is_Numeric($var)) {
			var_dump($var);
		}
		else {
			echo gettype($var);
		}
	?>
</body>
</html>