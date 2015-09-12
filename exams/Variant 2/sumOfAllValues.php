<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
		<form method="GET">
			<label for="keys">
				Keys string:
				<br/>
				<input type="text" name="keys" id="keys" value="startKEY12adghfgh243212gadghfgs43endKEY"/>
			</label>
			<br/>
			<br/>
			<label for="text">
				Text string:
				<br/>
				<textarea rows="6" cols="40" name="text" id="text">
		asdjykulgfjddfsffdstartKEY12endKEYqwfrhtyu67543rewghy3tefdgdstartKEY123.45endKEYwret34yrestartKEY2.6endKEY213434ytuhrgerweasfdstartKEYendKEYstartKEYasfdgeendKEY
				</textarea>
			</label>
			<br/>
			<br/>
			<input type="submit"/>
		</form>
		<?php
			$regexStartKey = '/(^[A-Za-z_]+)\d/';
			$regexEndKey = '/\d([A-Za-z_]+)$/';
			$keyString = $_GET['keys'];
			preg_match_all($regexStartKey, $keyString, $matchStartKey);
			$startKey = $matchStartKey[1][0];
			preg_match_all($regexEndKey, $keyString, $matchEndKey);
			$endKey = $matchEndKey[1][0];
			if (!$startKey || !$endKey) {
				echo "<p>A key is missing</p>";
			}
			else {
				$text = $_GET['text'];
				$regexText = '/'.$startKey.'(.*?)'.$endKey.'/';
				preg_match_all($regexText, $text, $matches);
				$sum = 0;
				$noNumbers = true;
				foreach ($matches[1] as $match) {
					if(is_numeric($match)) {
						$sum+=$match;
						$noNumbers = false;
					}
				}
				if ($noNumbers) {
					echo "<p>The total value is: <em>nothing</em></p>";
				}
				else {
					echo "<p>The total value is: <em>$sum</em></p>";
				}
			}
		?>
    </body>
</html>