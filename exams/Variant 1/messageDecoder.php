<!DOCTYPE html>
<html>
    <head>
        <title>Santa</title>
        <meta charset="utf-8" />
    </head>
	<style>


	</style>
    <body>
        <form method="get">
            <label for="jsonTable">
                Text to encrypt:
                <br/>
                <textarea name="jsonTable" id="jsonTable" rows="20" cols="60">[4,["Ping results:",
			"Reply from 95.101.195.91: bytes=32 time=115ms TTL=49",
			"Reply from 95.101.195.91: bytes=32 time=111ms TTL=49",
			"Reply from 95.101.195.91: bytes=32 time=102ms TTL=49",
			"Reply from 95.101.195.91: bytes=32 time=116ms TTL=49",
			"Reply from 95.101.195.91: bytes=32 time=117ms TTL=49",
			"Reply from 95.101.195.91: bytes=32 time=110ms TTL=49",
			"Reply from 95.101.195.91: bytes=32 time=105ms TTL=49"]]</textarea>
            </label>
            <br/>
            <input type="submit"/>
        </form>
		<?php
			$input = $_GET['jsonTable'];
			$regex = '/time=([0-9]{1,10})ms/';
			preg_match_all($regex, $input, $matches);
			$hiddenMessage = "";
			foreach($matches[1] as $match) {
				$encodedLetter = chr((int)$match);
				$hiddenMessage .= $encodedLetter;
			}
			$letters = str_split($hiddenMessage);
			$input = json_decode($input);
			$cols = $input[0];
			$rows = ceil(count($letters) / $cols);
			echo "<table border='1' cellpadding='5'>";
			$count = 0;
			$isIn = false;
			for ($i = 0; $i < $rows; $i++) {
				echo "<tr>";
				if ($isIn === true) {
					$isIn = false;
					$cols--;
					$rows--;
				}
				for ($j = 0; $j < $cols; $j++) {
					if (isset($letters[$count])) {
						if ($letters[$count] === " ") {
							echo "<td></td>";
							$count++;
						}
						else if ($letters[$count] === "*") {
							if ($j === 0) {
								$count++;
								$cols++;
								$isIn = true;
								
							}
							else {
								echo "<td></td>";
								if ($j+1 >= $cols) {
									$count++;
								}
							}
						}
						
						else {
							echo "<td style='background:#CAF'>$letters[$count]</td>";
							$count++;// todo
						}
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
