<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
	<style>
		    th {
                background-color: orange;
                text-align: left;
                padding: 5px;
            }
            td {
                text-align: right;
                padding: 5px;
            }
            table, tr, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
	</style>
</head>
<body>
	<?php
		function buildTable($name, $phone, $age, $address) {
			echo "<table>";
			echo "<tr><th>Name</th><td>".$name."</td></tr>";
			echo "<tr><th>Phone</th><td>".$phone."</td></tr>";
			echo "<tr><th>Age</th><td>".$age."</td></tr>";
			echo "<tr><th>Address</th><td>".$address."</td></tr>";
			echo "</table><br />";
		}
		buildTable("Gosho", "0882-321-423", 24, "Hadji Dimitar");
	?>
</body>
</html>