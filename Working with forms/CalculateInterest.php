<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		echo '<form method="post">Enter amount: <input type="text" name="amount" required /><br />';
		echo '<input type="radio" name="currency" value="usd" checked /> USD';
		echo '<input type="radio" name="currency" value="eur" /> EUR';
		echo '<input type="radio" name="currency" value="bgn" /> BGN<br />';
		echo 'Compound Interest Amount: <input type="text" name="interest" required /><br />';
		echo '<select name="period"><option value="6" selected>6 months</option><option value="12">1 year</option><option value="24">2 year</option><option value="60">5 years</option></select><br />';
		echo '<input type="submit" name="result" value="Calculate" /></form>';
		
		if (isset($_POST['result'])) {
			$amount = $_POST['amount'];
			$interest = $_POST['interest'] / 12;
			$period = $_POST['period'];
			$currency = $_POST['currency'];
			$result = $amount * pow(1 + $interest / 100, $period);
			if ($currency === 'usd') {
				echo '$ ' . round($result, 2);
			}
			if ($currency === 'eur') {
				echo json_decode('"'.'\u20AC'.'"') . " " . round($result, 2);
			}
			if ($currency === "bgn") {
				echo round($result, 2) . ' лв.';
			}
		}
	?>

</body>
</html>