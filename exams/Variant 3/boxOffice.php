<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
           <form method="GET">
        <div>
            <label for="list">
                Input
                <br/>
                <textarea name="list" id="list" rows="18" cols="100">
The Hobbit: The Battle of the Five Armies (adventure)- Ian McKellen, Martin Freeman, Richard Armitage, Cate Blanchett / 300
Night at the Museum: Secret of the Tomb (comedy)- Ben Stiller, Robin Williams, Owen Wilson, Dick Van Dyke / 200
Annie (comedy)- Quvenzhane Wallis, Cameron Diaz, Jamie Foxx, Rose Byrne / 160
Night at the Museum: Secret of the Tomb (comedy)- Ben Stiller, Robin Williams, Owen Wilson, Dick Van Dyke / 180
Exodus: Gods and Kings (action)- Christian Bale, Joel Edgerton, Ben Kingsley, Sigourney Weaver / 250</textarea>
            </label>
        </div>
        <div>
            <label for="minSeats">
                Minimum Seats:
                <br/>
                <input type="text" name="minSeats" id="minSeats" value="160"/>
            </label>
        </div>
        <div>
            <label for="maxSeats">
                Maximum Seats:
                <br/>
                <input type="text" name="maxSeats" id="maxSeats" value="300"/>
            </label>
        </div>
        <div>
            <label for="filter">
                Genre:
                <br/>
                <input type="text" name="filter" id="filter" value="comedy"/>
            </label>
        </div>
        <div>
            <label for="order">
                Order:
                <br/>
                <input type="text" name="order" id="order" value="ascending"/>
            </label>
        </div>
        <input type="submit"/>
    </form>
	
		<?php
			$text = $_GET['list'];
			//var_dump($text);
			$matchMovie = '/(.*?)\(/';
			preg_match_all($matchMovie, $text, $matchedMovies);
			$movies = [];
			foreach ($matchedMovies[1] as $movie) {
				$movie = trim($movie);
				array_push($movies, $movie);
			}
			$matchGenre = '/\((.*?)\)/';
			$matchedGenres = [];
			preg_match_all($matchGenre, $text, $matchedGenres);
			$genres = $matchedGenres[1];
			$matchActors = '/\- (.*?) \//';
			preg_match_all($matchActors, $text, $matchedActors);
			$actors = $matchedActors[1];
			$matchSeats = '/\/ (.*)/';
			preg_match_all($matchSeats, $text, $matchedSeats);
			$seats = [];
			foreach ($matchedSeats[1] as $seat) {
				$seat = trim($seat);
				array_push($seats, $seat);
			}
			$minSeats = $_GET['minSeats'];
			$maxSeats = $_GET['maxSeats'];
			$selectedGenre = $_GET['filter'];
			$order = $_GET['order'];
			

			$matchedResults = [];
			for ($i = 0; $i < count($movies); $i++) {
				$currentMovie = $movies[$i];
				$currentGenre = $genres[$i];
				$currentSeats = (int)$seats[$i];
				$currentActors = $actors[$i];
				$tempArr = [];
				if (($currentGenre === $selectedGenre || $selectedGenre === "all") && $currentSeats >= (int)$minSeats && $currentSeats <= (int)$maxSeats) {
					array_push($tempArr, $currentMovie);
					array_push($tempArr, $currentActors);
					array_push($tempArr, $currentSeats);
					array_push($matchedResults, $tempArr);
				}
			}
			if ($order === "ascending") {
				usort($matchedResults, 'sortAscending');	
			}
			if ($order === "descending") {
				usort($matchedResults, 'sortDescending');
			}
			foreach($matchedResults as $element) {
				echo '<div class="screening">';
				echo "<h2>$element[0]</h2>";
				echo "<ul>";
				$allStars = explode(", ", $element[1]);
				for ($i = 0; $i < count($allStars); $i++) {
					echo '<li class="star">'.trim($allStars[$i]).'</li>';
				}
				echo "</ul>";
				echo '<span class="seatsFilled">'.$element[2].' seats filled</span>';
				echo "</div>";
			}
			
			
			
			function sortAscending($first, $second) {
				$compare = strcmp($first[0], $second[0]);
				if($compare == 0) {
					if($first[2] > $second[2]) {
						return 1;
					} else {
						return -1;
					}
				}
				return $compare;
			}
			function sortDescending($first, $second) {
				$compare = strcmp($first[0], $second[0]);
				if ($compare === 0) {
					if($first[2] > $second[2]) {
						return 1;
					} else {
						return -1;
					}
				}
				$compare *= -1;
				return $comparel;
			}
		?>
		
    </body>
</html>