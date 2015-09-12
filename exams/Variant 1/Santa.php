<!DOCTYPE html>
<html>
    <head>
        <title>Santa</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <form method="get">
            <label for="childName">Child Name</label><br/>
            <input id="childName" type="text" name="childName" value="Petyrcho"/><br/>
            <label for="wantedPresent">Wanted Present</label><br/>
            <input id="wantedPresent" type="text" name="wantedPresent" value="Big Truck" /> <br/>
            <label for="riddles">Riddles</label><br/>
            <textarea id="riddles" rows="10" cols="80" name="riddles">What do you call bears with no ears?;What is black and white and red all over?;Why do bears have fur coats?</textarea><br/>
            <input type="submit" value="Send" autofocus="autofocus"/>
        </form>
		<?php
			$childName = $_GET['childName'];
			$childName = str_replace(" ", "-", $childName);
			$present = $_GET['wantedPresent'];
			$riddles = explode(";", $_GET['riddles']);
			$index = strlen($childName)%count($riddles);
			if ($index === 0) {
				$currentRiddle = $riddles[count($riddles) - 1];
			}
			else {
				$currentRiddle = $riddles[$index - 1];
			}
			echo htmlspecialchars('$giftOf'.$childName.' = $[wasChildGood] ? '."'".$present."' : '".$currentRiddle."';");
		?>
    </body>
</html>