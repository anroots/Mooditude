$(document).ready(function () {


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