<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
	<style>
	.red {
		color: red;
	}
	.blue {
		color: blue;
	}
	</style>
</head>
<body>
	<form method="post">
		<input type="text" name="input" />
		<input type="submit" name="posted" value="Color text"/>
	</form>
	<?php
		if(isset($_POST['posted'])) {
			$text = $_POST['input'];
			foreach (str_split($text) as $letter) {
				if (ord($letter) % 2 === 0) {
					echo "<span class='red'>$letter</span>";
				}
				else {
					echo "<span class='blue'>$letter</span>";
				}
			}
		}
	?>
</body>
</html>