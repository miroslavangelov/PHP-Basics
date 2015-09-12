<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <form method="get">
            <label for="matrixSize">
                Size of table:
                <br/>
                <input type="number" id="matrixSize" name="size" value="7"/>
            </label>
            <br/>
            <label for="textString">
                Text to encrypt:
                <br/>
                <textarea name="text" id="textString" rows="10" cols="40">
Soovfetonetem  sssadroedw atrneahr dyri  aUhi stv</textarea>
            </label>
            <br/>
            <input type="submit"/>
        </form>
		<?php
			function createSpiral($w, $h) {
			   if ($w <= 0 || $h <= 0) return FALSE;

			   $ar   = Array();
			   $used = Array();

			   // Establish grid
			   for ($j = 0; $j < $h; $j++) {
				  $ar[$j] = Array();
				  for ($i = 0; $i < $w; $i++)
					  $ar[$j][$i]   = '-';
			   }

			   // Establish 'used' grid that's one bigger in each dimension
			   for ($j = -1; $j <= $h; $j++) {
				  $used[$j] = Array();
				  for ($i = -1; $i <= $w; $i++) {
					  if ($i == -1 || $i == $w || $j == -1 || $j == $h)
						 $used[$j][$i] = true;
					  else
						 $used[$j][$i] = false;
				  }
			   }

			   // Fill grid with spiral
			   $n = 0;
			   $i = 0;
			   $j = 0;
			   $direction = 0; // 0 - left, 1 - down, 2 - right, 3 - up
			   while (true) {
				  $ar[$j][$i]   = $n++;
				  $used[$j][$i] = true;

				  // Advance
				  switch ($direction) {
					 case 0:
						$i++; // go right
						if ($used[$j][$i]) { // got to RHS
						   $i--; $j++; // go back left, then down
						   $direction = 1;
						}
						break;
					case 1:
					   $j++; // go down
					   if ($used[$j][$i]) { // got to bottom
						   $j--; $i--; // go back up, then left
						   $direction = 2;
						}
						break;
					 case 2:
						$i--; // go left
						if ($used[$j][$i]) { // got to LHS
						   $i++; $j--; // go back left, then up
						   $direction = 3;
						}
						break;
					 case 3:
						$j--; // go up
						if ($used[$j][$i]) { // got to top
						   $j++; $i++; // go back down, then right
						   $direction = 0;
						}
						break;
				   }

				   // if the new position is in use, we're done!
				   if ($used[$j][$i])
					   return $ar;
			   }
			}
			$size = (int)$_GET['size'];
			$arrSpiral = createSpiral($size, $size);
			$text = $_GET['text'];
			$row = 0;
			for ($i=0;$i < count($arrSpiral); $i++) {
				$col = 0;
				for ($j=0; $j < count($arrSpiral); $j++) {
					$arrSpiral[$row][$col] = $text[$arrSpiral[$row][$col]];
					$col++;
				}
				$row++;
			}

			$evenRow = false;
			$whites = [];
			$blacks = [];
			foreach ($arrSpiral as $element) {
				if ($evenRow) {
					for ($i = 1; $i < count($element); $i ++) {
						array_push($whites, $element[$i]);
						$i++;
					}
					$evenRow = false;
				}
				else {
					for ($i = 0; $i < count($element); $i ++) {
						array_push($whites, $element[$i]);
						$i++;
					}
					$evenRow = true;
				}
			}
			$evenRow = false;
			foreach ($arrSpiral as $element) {
				if ($evenRow) {
					for ($i = 0; $i < count($element); $i ++) {
						array_push($blacks, $element[$i]);
						$i++;

					}
					$evenRow = false;
				}
				else {
					for ($i = 1; $i < count($element); $i ++) {
						array_push($blacks, $element[$i]);
						$i++;
					}
					$evenRow = true;
				}
			}
			$firstWord = implode("", $whites);
			$secondWord = implode("", $blacks);
			$word = $firstWord.$secondWord;
			$regex = '/[\s\.\!\'\,]{1,}/';
			$newWord = preg_replace($regex, "", $word);
			$newWord = strtolower($newWord);
			$reversedWord = strrev($newWord);
			if ($newWord === $reversedWord) {
				echo "<div style='background-color:#4FE000'>$word</div>";
			}
			else {
				echo "<div style='background-color:#E0000F'>$word</div>";
			}
			

		?>
    </body>
</html>