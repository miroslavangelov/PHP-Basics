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
			$arr = [];
			
			for ($i = 0; $i < count($input); $i++) {
				$currentTag = $input[$i];
			//	echo($currentTag);
				
					if (isset($arr[$currentTag])) {
						$arr[$currentTag] += 1;
					}
					else {
						$arr[$currentTag] = 1;
					}
				
			}
			arsort($arr);
			foreach ($arr as $element => $value) {
				echo $element . " : " . $value . " times" . "<br />";
			}
			reset($arr);
			$first_key = key($arr);
			echo 'The most frequent tag is: ' . $first_key;
		}
	?>
</body>
</html>