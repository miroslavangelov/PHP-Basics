<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
<form method="GET">
    <label for="numbersString">
        Input string:
        <br/>
        <textarea rows="6" cols="40" name="numbersString" id="numbersString">
Angel$(*^#029661234!@#Pesho ,.' +3592/9653241;'":{},.Ivan 0888 123 456 John-=_555.123.4567	Stoian!@#$#@	Gosho )=_*	Steven #$(*&+1-(800)-555-2468</textarea>
    </label>
    <br/>
    <br/>
    <input type="submit"/>
</form>
		<?php
			$regex = '/([A-Z][A-Za-z]*)[^A-Z\+0-9]*(\+?[0-9]{1,}[0-9\/\.\(\)\- ]+)/';
			$text = $_GET['numbersString'];
			//echo $text."<br />";
			preg_match_all($regex, $text, $matches);
			$names = $matches[1];
			$numbers = $matches[2];
			$regexNumbers = '/\/|\(|\)|\.| |\-/';
			$formattedNumbers = [];
			foreach($numbers as $number) {
				$formattedNumber = preg_replace($regexNumbers, "", $number);
				array_push($formattedNumbers, $formattedNumber);
			}
			if (count($names) === 0 || count($numbers) === 0) {
				echo "<p>No matches!</p>";
			}
			else {
				echo "<ol>";
				for ($i = 0; $i < count($names); $i++) {
					$currName = $names[$i];
					$currNumber = $formattedNumbers[$i];
					echo "<li><b>$currName:</b> $currNumber</li>";
				}
				echo "</ol>";
			};
		?>
    </body>
</html>