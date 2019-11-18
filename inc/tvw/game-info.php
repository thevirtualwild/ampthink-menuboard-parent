<?php
function add_game_info() {
	?>
	<script>
	(function($) {
		var myVar = setInterval(getClockData, 200);
		var data_url = "http://12thmanlive.com/data/clock.json"; //was "http://thevirtualwild.com/d/tamu_gameinfo_test.json";
		function getClockData() {
			$.getJSON(data_url, function(data){
				var gameClock = data.gameClock;
				var homeName = data.homeName;
				var homeScore = data.homeScore;
				var guestName = data.guestName;
				var guestScore = data.guestScore;
				var quarter = 'Q' + data.quarter;
				var homePossession = data.homePossession;
				var playClock = data.playClock;
				var homeTimeOuts = data.homeTimeOuts;
				$('#timer #time').text(gameClock);
				$('#scoreboard #home-team .team-name').text(homeName);
				$('#scoreboard #home-team .team-score').text(homeScore);
				$('#scoreboard #away-team .team-name').text(guestName);
				$('#scoreboard #away-team .team-score').text(guestScore);
				$('#timer #quarter').text(quarter);
				if (gameClock != '00:00') {
					if (homePossession) {
						$('#home-team').addClass('winning');
						$('#away-team').removeClass('winning');
					} else {
						$('#home-team').removeClass('winning');
						$('#away-team').addClass('winning');
					}
				} else {
					$('#home-team').removeClass('winning');
					$('#away-team').removeClass('winning');
				}
// 				$('#homePossession').html(homePossession); //currently set as winning
// 				$('#playClock').html(playClock);
// 				$('#homeTimeOuts').html(homeTimeOuts);
			});
		}
	})( jQuery );
	</script>
	<div id="game-info">
		<div id="timer">
			<div id="quarter" class="right"></div>
			<div id="time" class="left"></div>
		</div>
		<div id="scoreboard">
			<div id="home-team" class="score-row">
				<div class="team-name"></div>
				<div class="team-score"></div>
				<div class="triangle-left"></div>
			</div>
			<div id="away-team" class="score-row">
				<div class="team-name"></div>
				<div class="team-score"></div>
				<div class="triangle-left"></div>
			</div>
		</div>
	</div>

	<?php
}

?>
