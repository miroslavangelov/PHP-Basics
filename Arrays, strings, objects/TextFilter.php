<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
	<style>
	</style>
</head>
<body>
	<form method="post">
		<label>Text: </label>
		<input type="text" name="text" /><br />
		<label>Ban list: </label>
		<input type="text" name="banlist" /><br />
		<input type="submit" name="posted" value="Generate"/>
	</form>
	<?php
		if(isset($_POST['posted']) && isset($_POST['text']) && isset($_POST['banlist'])) {
			$text = $_POST['text'];
			$banlist = explode(", ", $_POST['banlist']);
			foreach($banlist as $word) {
				$replacingString = str_repeat('*', strlen($word));
				$replacedText = str_replace($word, $replacingString, $text);
				$text = $replacedText;
			}
			echo $replacedText;
		}
	?>
</body>
</html>