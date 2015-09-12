<!DOCTYPE html>
<html>
    <head>
        <title>Santa</title>
        <meta charset="utf-8" />
    </head>
    <body>
	<form method="get">
    <label for="numbersString">
        Numbers string:
        <br/>
        <input type="text" style="width:300px" name="numbersString" id="numbersString" value="Th1s 12# is _43$ just %2^ random5text!!1!"/>
    </label>
    <br/>
    <br/>
    <label for="dateString">
        Date string:
        <br/>
        <textarea rows="6" cols="40" name="dateString" id="dateString">
2014-12-22, this is today! Good luck with the exam. Yesterday was 21/12/2014. Three years ago was Friday 22-12-2011 and it was also working day, but 2011-12-24 was not!</textarea>
    </label>
    <br/>
    <br/>
    <input type="submit"/>
</form>

		<?php
			$regexDates = '/[0-9]{4}-[0-9]{2}-[0-9]{2}/';
			$regexNumbers = '/[^a-zA-Z0-9]([0-9]{1,100})[^a-zA-Z0-9]/';
			$datesText = $_GET['dateString'];
			$numbersText = $_GET['numbersString'];
			preg_match_all($regexDates, $datesText, $datesMatches);
			preg_match_all($regexNumbers, $numbersText, $numbersMatches);
			$sum = 0;
			foreach($numbersMatches[1] as $number) {
				$sum += $number;
			}
			$sum = (int)strrev((string)$sum);
			
			if (count($datesMatches[0]) === 0) {
				echo "<p>No dates</p>";
			}
			else {
				$futureDates = [];
				foreach ($datesMatches[0] as $currentDate) {
					$tempdate = date_create($currentDate, timezone_open("Europe/Sofia"));
					date_add($tempdate, date_interval_create_from_date_string("$sum days"));
					array_push($futureDates, $tempdate);
				}
				echo "<ul>";
				foreach ($futureDates as $date) {
					$newDate = date_format($date, "Y-m-d");
					echo "<li>$newDate</li>";
				}
				echo '</ul>';
			}
		?>
    </body>
</html>