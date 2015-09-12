<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
	<style>
	</style>
</head>
<body>
	<form method="post">
		<label>Categories: </label>
		<input type="text" name="categories" /><br />
		<label>Tags: </label>
		<input type="text" name="tags" /><br />
		<label>Months: </label>
		<input type="text" name="months" /><br />
		<input type="submit" name="posted" value="Generate"/>
	</form>
	<?php
		if(isset($_POST['posted'])) {
			$categories = explode(", ", $_POST['categories']);
			$tags = explode(", ", $_POST['tags']);
			$months = explode(", ", $_POST['months']);
			echo '<ul>';
			foreach ($categories as $category) {
				echo "<li>$category</li>";
			}
			echo '</ul>';
			echo '<ul>';
			foreach ($tags as $tag) {
				echo "<li>$tag</li>";
			}
			echo '</ul>';
			echo '<ul>';
			foreach ($months as $month) {
				echo "<li>$month</li>";
			}
			echo '</ul>';
		}
	?>
</body>
</html>