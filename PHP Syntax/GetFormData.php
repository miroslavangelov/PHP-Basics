<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form method="post">
		Name: <input type="text" name="name" />
		Age: <input type="number" name="age" />
		<input type="radio" name="gender" value="m" id="male" checked /> Male 
        <input type="radio" name="gender" value="f" id="female"/> Female 
		<input type="submit" name="posted" value="Send"/>
	</form>
	<?php
		if (isset($_POST['posted'])) {
			$name = htmlspecialchars($_POST['name']);
			$age = htmlspecialchars($_POST['age']);
			$getGender = $_POST['gender'];
			$gender = '';
			if ($getGender == 'm') {
				$gender = 'male';
			}
			else {
				$gender = 'female';
			}
			if ($name != '' && $age != '') {
				echo 'My name is ' . $name . '. I am ' . $age . ' years old. I am ' . $gender . '.';
			}
		}
	?>
</body>
</html>