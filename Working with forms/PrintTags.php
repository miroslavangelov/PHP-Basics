<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		echo '<form method="post">Input: <input type="text" name="input" /><br /><input type="submit" value="send" name="posted" /></form>';
		if (isset($_POST['posted'])) {
			$input = explode(', ', $_POST['input']);
			for ($i = 0; $i < count($input); $i++) {
				echo $i . ' : ' . $input[$i] . "<br />";
			}
		}
	?>
</body>
</html>