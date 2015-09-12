<!DOCTYPE html>
<html>
    <head>
        <title>Santa</title>
        <meta charset="utf-8" />
    </head>
    <body>
<form method="GET">
    <label for="list">
        Username list:
        <br/>
        <textarea rows="10" cols="40" name="list" id="list">
Angel
Ivancho
Aha
Toni
Pesho
Gosho
        </textarea>
    </label>
    <br/>
    <br/>
    <label for="length">
        Minimum length:
        <br/>
        <input type="text" name="length" id="length" value="5"/>
    </label>
    <br/>
    <br/>
    <label for="show">
        Show all usernames?
        <input type="checkbox" name="show" id="show"/>
    </label>
    <br/>
    <br/>
    <input type="submit"/>
</form>

		<?php
			$list = explode("\n", $_GET['list']);
			$minLength = (int)$_GET['length'];
			if (isset($_GET['show'])) {
				echo "<ul>";
				foreach ($list as $username) {
					$username = trim($username);
					if (strlen($username) >= $minLength) {
						$username = htmlspecialchars($username);
						echo "<li>$username</li>";
					}
					else {
						echo '<li style="color: red;">'.$username.'</li>';
					}
				}
				echo "</ul>";
			}
			else {
				echo "<ul>";
				foreach ($list as $username) {
					$username = trim($username);
					if (strlen($username) >= $minLength) {
						$username = htmlspecialchars($username);
						echo "<li>$username</li>";
					}
				}
				echo "</ul>";
			}
		?>
    </body>
</html>