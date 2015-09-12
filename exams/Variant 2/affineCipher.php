<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
	    <form method="get">
            <label for="jsonTable">
                Text to encrypt:
                <br/>
                <textarea name="jsonTable" id="jsonTable" rows="10" cols="40">[["god","save","the","queen"],[7,2]]</textarea>
            </label>
            <br/>
            <input type="submit"/>
        </form>
	
		<?php
			$text = json_decode($_GET['jsonTable']);
			$k = $text[1][0];
			$s = $text[1][1];
			$encodedText = [];
			
			foreach ($text[0] as $word) {
				$result = "";
				$currentWord = str_split(strtoupper($word));
				foreach ($currentWord as $char) {
					$x = ord($char)-65;
					if ($x < 0) {
						$result .= $char;
					}
					else {
						$result .= chr((($k * $x + $s) % 26) + 65);
					}
				}
				array_push($encodedText, $result);
			}
			$maxLength = 0;
			for ($i = 0; $i < count($encodedText); $i++) {
				$wordLength = strlen($encodedText[$i]);
				if ($wordLength > $maxLength) {
					$maxLength = $wordLength;
				}
			}
			if ($maxLength === 0) {
				$maxLength = 1;
			}
			echo "<table border='1' cellpadding='5'>";
			for ($i = 0; $i < count($encodedText); $i ++) {
				$currentChars = str_split($encodedText[$i]);
				echo "<tr>";
				for ($j = 0; $j < $maxLength; $j++) {
					if (isset($currentChars[$j]) && $currentChars[$j] != "") {
						echo "<td style='background:#CCC'>$currentChars[$j]</td>";
					}
					else {
						echo "<td></td>";
					}
				}
				echo "</tr>";
			}
			echo "</table>";
		?>
		
    </body>
</html>