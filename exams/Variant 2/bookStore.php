<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
	 <form method="GET">
        <div>
            <label for="text">
                Input
                <br/>
                <textarea name="text" id="text" rows="18" cols="100">Gambardella, Matthew/XML Developer's Guide/Computer/44.95/2000-10-01/An in-depth look at creating applications with XML.
Ralls, Kim/Midnight Rain/Fantasy/19.15/2000-12-16/A former architect battles corporate zombies, an evil sorceress, and her own childhood to become queen of the world.
Corets, Eva/Maeve Ascendant/Fantasy/6.95/2000-11-17/After the collapse of a nanotechnology society in England, the young survivors lay the foundation for a new society.
Corets, Eva/Oberon's Legacy/Fantasy/5.00/2001-03-10/In post-apocalypse England, the mysterious agent known only as Oberon helps to create a new life for the inhabitants of London. Sequel to Maeve Ascendant.
Randall, Cynthia/Lover Birds/Romance/5.95/2000-09-02/When Carla meets Paul at an ornithology conference, tempers fly as feathers get ruffled.
Thurman, Paula/Splish Splash/Romance/4.95/2000-11-02/A deep sea diver finds true love twenty thousand leagues beneath the sea.</textarea>
            </label>
        </div>
        <div>
            <label for="min-price">
                Min Price:
                <br/>
                <input type="text" name="min-price" id="min-price" value="5.00"/>
            </label>
        </div>
        <div>
            <label for="max-price">
                Max Price:
                <br/>
                <input type="text" name="max-price" id="max-price" value="10.45"/>
            </label>
        </div>
        <div>
            <label for="sort">
                Sort by:
                <br/>
                <select name="sort" id="sort">
                    <option value="genre">genre</option>
                    <option value="author">author</option>
                    <option value="publish-date">publish date</option>
                </select>
            </label>
        </div>
        <div>
            <label for="order">
                Order:
                <br/>
                <select name="order" id="order">
                    <option value="ascending">ascending</option>
                    <option value="descending">descending</option>
                </select>
            </label>
        </div>
        <input type="submit"/>
    </form>
		<?php
			$text = explode("\n", $_GET['text']);
			$books = [];
			foreach ($text as $book) {
				$bookElements = explode("/", $book);
				$bookElements[5] = trim($bookElements[5]);
				array_push($books, $bookElements);
			}
			$minPrice = (double)$_GET['min-price'];
			$maxPrice = (double)$_GET['max-price'];
			$result = [];
			foreach ($books as $book) {
					//$currentAuthor = $book[0];
					//$currentBook = $book[1];
					//$currentGenre = $book[2];
					$currentPrice = (double)$book[3];
					//$currentDate = $book[4];
					//$currentInfo = $book[5];
					if ($currentPrice <= $maxPrice && $currentPrice >= $minPrice) {
						array_push($result, $book);
					}
				
			}
			$selectedSort = $_GET['sort'];
			$selectedOrder = $_GET['order'];
			if ($selectedSort === "genre" && $selectedOrder === "ascending") {
				usort($result, 'sortGenreAsc');
			}
			if ($selectedSort === "genre" && $selectedOrder === "descending") {
				usort($result, 'sortGenreDesc');
			}
			if ($selectedSort === "author" && $selectedOrder === "ascending") {
				usort($result, 'sortAuthorAsc');
			}
			if ($selectedSort === "author" && $selectedOrder === "descending") {
				usort($result, 'sortAuthorDesc');
			}
			if ($selectedSort === "publish-date" && $selectedOrder === "ascending") {
				usort($result, 'sortDateAsc');
			}
			if ($selectedSort === "publish-date" && $selectedOrder === "descending") {
				usort($result, 'sortDateDesc');
			}
			
			foreach ($result as $element) {
				$element[0] = htmlspecialchars($element[0]);
				$element[1] = htmlspecialchars($element[1]);
				$element[2] = htmlspecialchars($element[2]);
				$element[3] = htmlspecialchars($element[3]);
				$element[4] = htmlspecialchars($element[4]);
				$element[5] = htmlspecialchars($element[5]);
				echo "<div>";
				echo "<p>$element[1]</p>";
				echo "<ul>";
				echo "<li>$element[0]</li>";
				echo "<li>$element[2]</li>";
				echo "<li>$element[3]</li>";
				echo "<li>$element[4]</li>";
				echo "<li>$element[5]</li>";
				echo "</ul>";
				echo "</div>";
			}
			
			
			function sortGenreAsc ($first, $second) {
				$compare = strcmp($first[2], $second[2]);
				if($compare == 0) {
					if (date_create_from_format("Y-m-d", $first[4], timezone_open("Europe/Sofia"))
						> date_create_from_format("Y-m-d", $second[4], timezone_open("Europe/Sofia"))) {
						return 1;
					}
					else {
						return -1;
					}
				}
				return $compare;
			}
			function sortGenreDesc ($first, $second) {
				$compare = strcmp($first[2], $second[2]);
				if($compare == 0) {
					if (date_create_from_format("Y-m-d", $first[4], timezone_open("Europe/Sofia"))
						> date_create_from_format("Y-m-d", $second[4], timezone_open("Europe/Sofia"))) {
						return 1;
					}
					else {
						return -1;
					}
				}
				$compare *= -1;
				return $compare;
			}
			function sortAuthorAsc ($first, $second) {
				$compare = strcmp($first[0], $second[0]);
				if($compare == 0) {
					if (date_create_from_format("Y-m-d", $first[4], timezone_open("Europe/Sofia"))
						> date_create_from_format("Y-m-d", $second[4], timezone_open("Europe/Sofia"))) {
						return 1;
					}
					else {
						return -1;
					}
				}
				return $compare;
			}
			function sortAuthorDesc ($first, $second) {
				$compare = strcmp($first[0], $second[0]);
				if($compare == 0) {
					if (date_create_from_format("Y-m-d", $first[4], timezone_open("Europe/Sofia"))
						> date_create_from_format("Y-m-d", $second[4], timezone_open("Europe/Sofia"))) {
						return 1;
					}
					else {
						return -1;
					}
				}
				$compare *= -1;
				return $compare;
			}
			function sortDateAsc ($first, $second) {
					if (date_create_from_format("Y-m-d", $first[4], timezone_open("Europe/Sofia"))
						> date_create_from_format("Y-m-d", $second[4], timezone_open("Europe/Sofia"))) {
						return 1;
					}
					else {
						return -1;
					}
			}
			function sortDateDesc ($first, $second) {
					if (date_create_from_format("Y-m-d", $first[4], timezone_open("Europe/Sofia"))
						> date_create_from_format("Y-m-d", $second[4], timezone_open("Europe/Sofia"))) {
						return -1;
					}
					else {
						return 1;
					}
			}
		?>
		
    </body>
</html>