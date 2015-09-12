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
		<label>Word: </label>
		<input type="text" name="word" /><br />
		<input type="submit" name="posted" value="Extract"/>
	</form>
	<?php
		if(isset($_POST['posted'])) {
			$pattern = '/\b[a-zA-Z\s,’\'–\-:)(]+[\.|\?|!]/';
			$word = $_POST['word'];
			$patternWord = '/\b'.$word.'\b/';
			preg_match_all($pattern, $_POST['text'], $matches);
			foreach ($matches[0] as $match) {
				
				$sentence = preg_match($patternWord, $match);
				if ($sentence > 0) {
					echo "$match<br />";
				}
			}
		}
	?>
</body>
</html>