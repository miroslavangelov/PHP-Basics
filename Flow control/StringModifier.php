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
		<input type="text" name="input" />
		<input type="radio" name="operation" value="palindrome" checked /><label> Check Palindrome</label>
		<input type="radio" name="operation" value="reverse"/><label> Reverse string</label>
		<input type="radio" name="operation" value="split"/><label> Split</label>
		<input type="radio" name="operation" value="hash"/><label> Hash String</label>
		<input type="radio" name="operation" value="shuffle"/><label> Shuffle String</label>
		<input type="submit" name="posted" value="Submit"/>
	</form>
	<?php
		if(isset($_POST['posted']) && $_POST['input'] != '') {
			$operation = $_POST['operation'];
			$text = $_POST['input'];
			if ($operation === 'palindrome') {
				$isPalindrom = strrev($text);
				if ($isPalindrom === $text) {
					echo $text.' is a palindrome!';
				}
				else {
					echo $text.' is not a palindrome!';
				}
			}
			if ($operation === 'reverse') {
				$reversedText = strrev($text);
				echo $reversedText;
			}
			if ($operation === 'split') {
				$result = preg_replace("/[^a-zA-Z0-9]+/", "", $text);
				$splitResult = str_split($result);
				$joinResult = join(' ', $splitResult);
				echo $joinResult;
			}
			if ($operation === 'hash') {
				echo crypt($text);
			}
			if ($operation === 'shuffle') {
				echo str_shuffle($text);
			}
		}
	?>
</body>
</html>