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
		<input type="text" name="input" />
		<input type="submit" name="posted" value="Count words"/>
	</form>
	<?php
		if (isset($_POST['posted'])) {
			$text = $_POST['input'];
			$map = [];
			preg_match_all("/\\w+/", strtolower($text), $words);
			for ($i=0; $i < count($words[0]); $i++) {
				$word = $words[0][$i];
				if (array_key_exists($word, $map)) {
					$map[$word] ++;
				}
				else {
					$map[$word] = 1;
				}
			}
			echo '<table>';
			foreach($map as $key=>$value) {
				echo "<tr><td>$key</td><td>$value</td></tr>";
			}
			echo '</table>';
		}
	?>
</body>
</html>