<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
<form method="GET">
    <label for="list">
        Dates list:
        <br/>
        <textarea rows="10" cols="40" name="list" id="list">
21-12-2014
2015-01-30
12/22/2014</textarea>
    </label>
    <br/>
    <br/>
    <label for="currDate">
        Current date:
        <br/>
        <input type="text" name="currDate" id="currDate" value="12-01-2015"/>
    </label>
    <br/>
    <br/>
    <input type="submit"/>
</form>
		<?php
		date_default_timezone_set("Europe/Sofia");
		$datesInput = explode("\n", $_GET['list']);
		$dates = [];
		$currDate = date_create($_GET['currDate']);
		foreach ($datesInput as $date) {
			if (date_create($date) != false) {
				$dates[] = date_create($date);
			}
		}
		sort($dates);
		echo "<ul>";
		foreach ($dates as $date) {
			if ($currDate > $date) {
				echo "<li><em>".$date->format('d/m/Y')."</em></li>";
			}
			else {
				echo "<li>".$date->format('d/m/Y')."</li>";
			}
		}
		echo "</ul>";
		?>
    </body>
</html>