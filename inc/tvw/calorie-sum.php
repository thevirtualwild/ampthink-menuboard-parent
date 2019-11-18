<?php
function get_calorie_sum($first_item_calories, $second_item_calories) {
	$calories = '';

	if(count($second_item_calories) == 1) {
		// only one calorie number
		if (count($first_item_calories) == 1) {
			//only one featured calorie number
			//add intval of calories together
			$thiscalories = intval($second_item_calories[0]);
			$featuredcalories = intval($first_item_calories[0]);

			$calories = strval($thiscalories + $featuredcalories);
		} else {
			// two featued calorie numbers
			//add intval of calories together
			$thiscaloriesmin = intval($second_item_calories[0]);
			$thiscaloriesmax = intval($second_item_calories[0]);
			$featuredcaloriesmin = intval($first_item_calories[0]);
			$featuredcaloriesmax = intval($first_item_calories[1]);

			$caloriesmin = $thiscaloriesmin + $featuredcaloriesmin;
			$caloriesmax = $thiscaloriesmax + $featuredcaloriesmax;

			$calories = strval($caloriesmin) . "-" . strval($caloriesmax);
		}
	} else {
		// only one calorie number
		if (count($first_item_calories) == 1) {
			//only one featured calorie number
			//add intval of calories together
			$thiscaloriesmin = intval($second_item_calories[0]);
			$thiscaloriesmax = intval($second_item_calories[1]);
			$featuredcaloriesmin = intval($first_item_calories[0]);
			$featuredcaloriesmax = intval($first_item_calories[0]);

			$caloriesmin = $thiscaloriesmin + $featuredcaloriesmin;
			$caloriesmax = $thiscaloriesmax + $featuredcaloriesmax;

			$calories = strval($caloriesmin) . "-" . strval($caloriesmax);
		} else {
			// two featued calorie numbers
			//add intval of calories together
			$thiscaloriesmin = intval($second_item_calories[0]);
			$thiscaloriesmax = intval($second_item_calories[1]);
			$featuredcaloriesmin = intval($first_item_calories[0]);
			$featuredcaloriesmax = intval($first_item_calories[1]);

			$caloriesmin = $thiscaloriesmin + $featuredcaloriesmin;
			$caloriesmax = $thiscaloriesmax + $featuredcaloriesmax;

			$calories = strval($caloriesmin) . "-" . strval($caloriesmax);
		}
	}

	return $calories;
}

// function get_price_sum($prices) {
// 	$totalprice = 0;
//
// 	for($aprice in $prices){
// 		$totalprice = $totalprice + $aprice;
// 	}
//
// 	return $totalprice;
// }
?>
