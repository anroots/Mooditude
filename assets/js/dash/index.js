// Load google visualization
google.load("visualization", "1", {packages:["corechart"]});

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
		success:function (json) {
			if (json.status == 200) {
				moodRows = json.response;

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
		pointSize: 2,
		title:str('Your mood'),
		tooltip: {
			trigger: 'hover'
		},
		curveType: 'function',
		vAxis: {
			minValue: 1,
			maxValue: 10,
			format: '##',
			title: str('Mood')
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

	// Raty plugin init
	$('#star').raty({
		hintList:['bad', 'poor', 'regular', 'good', 'gorgeous'],
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
			$.post(base_url + 'mood/update/' + score, function (json) {
				if (json.status == 200) {
					$('#star').fadeOut('slow');
					notify(json.response, 'success', false);
				} else {
					notify(json.response, 'error', false);
				}
			});
		}
	});
});