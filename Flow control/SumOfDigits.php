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
		<label>Input string: </label>
		<input type="text" name="input" />
		<input type="submit" name="posted" value="Submit"/>
	</form>
	<?php
		if(isset($_POST['posted']) && $_POST['input'] != '') {
			$numbers = explode(', ', $_POST['input']);
			echo '<table>';
			for ($i = 0; $i < count($numbers); $i++) {
				echo '<tr><td>'.$numbers[$i].'</td>';
				$currentNumber = str_split($numbers[$i]);
				$sum = 0;
				for ($j = 0; $j < count($currentNumber); $j++) {
					$currentDigit = $currentNumber[$j];
					if (is_numeric($currentDigit)) {
						$sum += (int)$currentDigit;
						if ($j+1 >= count($currentNumber)) {
							echo '<td>'.$sum.'</td></tr>';
						}
					}
					else {
						echo '<td>I cannot sum that</td></tr>';
						break;
					}
				}
			}
			echo '</table>';
		}
	?>
</body>
</html>