// Load google visualization
google.load("visualization", "1", {packages:["corechart"]});

/**
 * Hide / show rating tooltips
 */
function toggle_tooltips() {
	if (!$('#rate-tooltip').is(':hidden')) {
		$('#star').fadeOut('slow');
		$('#rate-tooltip').fadeOut('slow');
		$('#tnx-tooltip').fadeIn('slow');

	} else {
		$('#star').fadeIn('slow');
		$('#rate-tooltip').fadeIn('slow');
		$('#tnx-tooltip').fadeOut('slow');
	}
}

/**
 * Draw mood graph
 *
 * @since 1.0
 */
function drawChart() {

	var moodRows;

	$.ajax({
		url:base_url + 'mood/graph',
		type:'get',
		async:false,
		success:function (json) { // Fetched all moods
			if (json.status == 200) {
				moodRows = json.response;

				// Convert string date to JS Date objects
				var i;
				for (i = 0; i < moodRows.length; i++) {
					moodRows[i][0] = new Date(moodRows[i][0]);
					console.debug(moodRows[i][0]);
				}
			} else {
				notify('Could not retreive mood data.', 'error');
			}
		}
	});

	var data = new google.visualization.DataTable();

	data.addColumn('date', 'Day');
	data.addColumn('number', 'Happyness');
	data.addColumn('number', 'Unhappyness');

	data.addRows(moodRows);

	var options = {

		height:240,
		pointSize:4,
		title:str('Your happyness and unhappyness over time'),
		tooltip:{
			trigger:'hover'
		},
		curveType:'function',
		vAxis:{
			minValue:1,
			maxValue:10,
			format:'##',
			title:str('Mood')
		},
		hAxis:{
			'title':str('Time')
		},
		legend:{
			position:'bottom'
		}
	};

	var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
	chart.draw(data, options);
}

$(document).ready(function () {

	// Draw chart on modal open
	$('#modal-chart').bind('shown', function () {
		drawChart();
	})

	// Autofill today's mood (if set)
	$.get(base_url + 'mood/today', function (json) {
		if (json.status == 200 && json.response != 0) {
			$('#star').raty('start', json.response);
		}
	});

	// Change score if already rated
	$('#change-score').click(toggle_tooltips);


	// Raty plugin init
	$('#star').raty({
		hintList:[
			str('Suicidal'),
			str('Worst day ever!'),
			str('Depressed'),
			str('Down'),
			str('Been better...'),
			str('Fine...and how are you?'),
			str('Good'),
			str('Happy'),
			str('Wonderful!'),
			str('On top of the world!'),
		],
		path:'assets/js/raty-2.1.0/img/',
		cancelOff:'cancel-off-big.png',
		cancelOn:'cancel-on-big.png',
		half:false,
		number:10,
		size:24,
		starHalf:'star-half-big.png',
		starOff:'star-off-big.png',
		starOn:'star-on-big.png',
		click:function (score, evt) {
			$.get(base_url + 'mood/update/' + score, function (json) {

				if (json.status == 200) {
					toggle_tooltips();
					notify(json.response, 'success', false);
				} else {
					notify(json.response, 'error', false);
				}

			});
		}
	});
});