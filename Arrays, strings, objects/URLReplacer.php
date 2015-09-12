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
		<textarea rows="6" cols="50" name="text"></textarea><br />
		<input type="submit" name="posted" value="Change"/>
	</form>
	<?php
		if(isset($_POST['posted'])) {
			$text = $_POST['text'];
			$pattern = '/<a href="(.*?)">(.*?)<\/a>/';
			$replaced = preg_replace($pattern, "[URL=$1]$2[/URL]", $text);
			echo $replaced;
		}
	?>
</body>
</html>