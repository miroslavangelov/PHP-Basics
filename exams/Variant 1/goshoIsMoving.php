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
			<fieldset>
				<legend>Information</legend>
				<label for="luggage">Luggage</label><br/>
				<textarea id="luggage" rows="10" cols="80" name="luggage">furniture;living room;pink couch;40.85kgC|_|furniture;bedroom;night table;5.12kgC|_|boxes;kitchen;plates;10.36kgC|_|boxes;kitchen;cups;10.36kgC|_|boxes;kitchen;tableware;7.6kgC|_|boxes;living room;glasses;3.32kgC|_|boxes;living room;dresses;4.32kgC|_|bags;hall;shoes;5.9kgC|_|</textarea><br/>
			</fieldset>
			<fieldset>
				<legend>Filters</legend>
				<label>Type Of Luggage</label><br/>
				<label>Furniture</label>
				<input type="checkbox" checked name="typeLuggage[]" value="furniture"/>
				<label>Boxes</label>
				<input type="checkbox" checked name="typeLuggage[]" value="boxes"/>
				<label>Bags</label>
				<input type="checkbox" checked name="typeLuggage[]" value="bags"/><br/>

				<label for="room">Room</label><br/>
				<input id="room" type="text" name="room" value="living room"/><br/>

				<label for="minWeight">Min Weight</label><br/>
				<input id="minWeight" type="text" name="minWeight" value="5" /> <br/>
				<label for="maxWeight">Max Weight</label><br/>
				<input id="maxWeight" type="text" name="maxWeight" value="50" /> <br/>
			</fieldset>
			<input type="submit" value="Send" autofocus="autofocus"/>
		</form>
		<?php
			$luggages = explode("kgC|_|", $_GET['luggage']);
			$arrOfLuggages = [];
			$sum = [];
			for ($i = 0; $i < count($luggages) - 1; $i++) {
				$currentLugg = $luggages[$i];
				$splitLugg = explode(";", $currentLugg);
				$arrOfLuggages[$i] = $splitLugg;
				$currentLuggage = $arrOfLuggages[$i];
				$currentType = $currentLuggage[0];
				$currentRoom = $currentLuggage[1];
				$sum[$currentType][$currentRoom] = 0;
			}
			for ($i=0; $i < count($arrOfLuggages); $i++) {
				$currentLuggage = $arrOfLuggages[$i];
				$currentType = $currentLuggage[0];
				$currentRoom = $currentLuggage[1];
				$currentWeight = (double)$currentLuggage[3];
				$sum[$currentType][$currentRoom] += floor($currentWeight);
			}
			//var_dump($sum);
			$typeOfLugg = $_GET['typeLuggage'];
			$room = $_GET['room'];
			$minWeight = (double)$_GET['minWeight'];
			$maxWeight = (double)$_GET['maxWeight'];
			$result = [];
			for ($i=0;$i < count($arrOfLuggages);$i++) {
				$currentLuggage = $arrOfLuggages[$i];
				$currentType = $currentLuggage[0];
				$currentRoom = $currentLuggage[1];
				$currentName = $currentLuggage[2];
				$currentWeight = (double)$currentLuggage[3];
				if (isset($typeOfLugg[0])) {
					if($typeOfLugg[0] === "furniture") {
						if ($currentType === "furniture" && $currentRoom === $room && isset($sum[$currentType][$currentRoom])) {
							if ($sum[$currentType][$currentRoom] >= $minWeight && $sum[$currentType][$currentRoom] <= $maxWeight) {
								if (isset($result[$currentType][$currentRoom])) {
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
								else {
									$result[$currentType][$currentRoom] = [];
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
							}
						}
					}
					if($typeOfLugg[0] === "boxes") {
						if ($currentType === "boxes" && $currentRoom === $room && isset($sum[$currentType][$currentRoom])) {
							if ($sum[$currentType][$currentRoom] >= $minWeight && $sum[$currentType][$currentRoom] <= $maxWeight) {
								if (isset($result[$currentType][$currentRoom])) {
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
								else {
									$result[$currentType][$currentRoom] = [];
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
							}
						}

					}
					if($typeOfLugg[0] === "bags") {
						if ($currentType === "bags" && $currentRoom === $room && isset($sum[$currentType][$currentRoom])) {
							if ($sum[$currentType][$currentRoom] >= $minWeight && $sum[$currentType][$currentRoom] <= $maxWeight) {
								if (isset($result[$currentType][$currentRoom])) {
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
								else {
									$result[$currentType][$currentRoom] = [];
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
							}
						}
					}
				}
				if (isset($typeOfLugg[1])) {
					if($typeOfLugg[1] === "furniture") {
						if ($currentType === "furniture" && $currentRoom === $room && isset($sum[$currentType][$currentRoom])) {
							if ($sum[$currentType][$currentRoom] >= $minWeight && $sum[$currentType][$currentRoom] <= $maxWeight) {
								if (isset($result[$currentType][$currentRoom])) {
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
								else {
									$result[$currentType][$currentRoom] = [];
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
							}
						}
					}
					if($typeOfLugg[1] === "boxes") {
						if ($currentType === "boxes" && $currentRoom === $room && isset($sum[$currentType][$currentRoom])) {
							if ($sum[$currentType][$currentRoom] >= $minWeight && $sum[$currentType][$currentRoom] <= $maxWeight) {
								if (isset($result[$currentType][$currentRoom])) {
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
								else {
									$result[$currentType][$currentRoom] = [];
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
							}
						}
					}
					if($typeOfLugg[1] === "bags") {
						if ($currentType === "bags" && $currentRoom === $room && isset($sum[$currentType][$currentRoom])) {
							if ($sum[$currentType][$currentRoom] >= $minWeight && $sum[$currentType][$currentRoom] <= $maxWeight) {
								if (isset($result[$currentType][$currentRoom])) {
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
								else {
									$result[$currentType][$currentRoom] = [];
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
							}
						}
					}
				}
				if (isset($typeOfLugg[2])) {
					if($typeOfLugg[2] === "furniture") {
						if ($currentType === "furniture" && $currentRoom === $room && isset($sum[$currentType][$currentRoom])) {
							if ($sum[$currentType][$currentRoom] >= $minWeight && $sum[$currentType][$currentRoom] <= $maxWeight) {
								if (isset($result[$currentType][$currentRoom])) {
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
								else {
									$result[$currentType][$currentRoom] = [];
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
							}
						}
					}
					if($typeOfLugg[2] === "boxes") {
						if ($currentType === "boxes" && $currentRoom === $room && isset($sum[$currentType][$currentRoom])) {
							if ($sum[$currentType][$currentRoom] >= $minWeight && $sum[$currentType][$currentRoom] <= $maxWeight) {
								if (isset($result[$currentType][$currentRoom])) {
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
								else {
									$result[$currentType][$currentRoom] = [];
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
							}
						}
					}
					if($typeOfLugg[2] === "bags") {
						if ($currentType === "bags" && $currentRoom === $room && isset($sum[$currentType][$currentRoom])) {
							if ($sum[$currentType][$currentRoom] >= $minWeight && $sum[$currentType][$currentRoom] <= $maxWeight) {
								if (isset($result[$currentType][$currentRoom])) {
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
								else {
									$result[$currentType][$currentRoom] = [];
									array_push($result[$currentType][$currentRoom], $currentName);
									array_push($result[$currentType][$currentRoom], $sum[$currentType][$currentRoom]);
								}
							}
						}
					}
				}
			}
		ksort($result);
		foreach($result as $key=>$value) {
			foreach($value as $el=>$names) {
					sort($result[$key][$el]);
			}
		}
		//var_dump($result);
		echo "<ul>";
			$tempWeight = 0;
			foreach($result as $key=>$value) {
				echo "<li><p>$key</p><ul>";
				
				foreach ($value as $el=>$names) {
					echo "<li><p>$el</p><ul><li><p>";
						for ($i = 0; $i < count($names); $i++) {
							$name = $names[$i];
							if(is_numeric($name)) {
								$tempWeight = floor($name);
									if ($i+1 >= count($names)) {
										echo " - $tempWeight"."kg";
										break;
									}
								continue;
							}
							echo $name;
							if ($i+1 >= count($names) || is_numeric($names[$i+1])) {
								continue;
							}
							else {
								echo ", ";
							}
						}
					echo "</p></li></ul></li></ul>";
				}
				echo "</li>";
			}
			echo "</ul>";
		//	var_dump($result);
		//	$asd = "furniture;living room;pink couch;40.85kgC|_|furniture;bedroom;night table;5.12kgC|_|boxes;kitchen;plates;10.36kgC|_|boxes;kitchen;cups;10.36kgC|_|boxes;kitchen;tableware;7.6kgC|_|boxes;living room;glasses;5.32kgC|_|bags;hall;shoes;5.9kgC|_|bags;hall;umbrellas;5.9kgC|_|bags;hall;dresses;11.9kgC|_|";
		//	
		//	echo "<br />";
		//	echo "<ul><li><p>bags</p><ul><li><p>hall</p><ul><li><p>dresses, shoes, umbrellas - 21kg</p></li></ul></li></ul></li></ul>";
		?>
    </body>
</html>