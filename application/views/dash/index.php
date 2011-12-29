<div class="txt-center" style="height: 120px;">
	<p id="rate-tooltip">
		<?=__('How were you feeling, on average, during the day?')?>
	</p>

	<p class="hidden" id="tnx-tooltip">
		<?=__('Thank you... come again! <span class="light">(or you can :link todays mood.)</span>', array(
		':link' => '<a href="#" id="change-score">' . __('change') . '</a>'))?>
	</p>

	<div style="width: 280px; margin: 0 auto;">
		<div id="star"></div>
	</div>

	<span class="help-block">
		<?=__('Click on a starred rating to save it. Only one rating per day.')?>
	</span>
	<div class="clearfix"></div>
</div>

<p class="txt-center">
	<a data-keyboard="true" class="btn" data-controls-modal="modal-chart" data-backdrop="true">
		<?=__('View Mood Chart')?>
	</a>
</p>


<!-- Mood chart modal -->
<div id="modal-chart" class="modal hide fade">
	<div class="modal-header">
		<a href="#" class="close">&times;</a>

		<h3>
			<?=__('Your mood over time')?>
		</h3>
	</div>
	<div class="modal-body">

		<div id="chart_div"></div>

	</div>
	<div class="modal-footer">
		<?=__(':count mood updates since :since, with the average rating being <strong>:average</strong> points.', array(
		':count' => $statistics['count'],
		':since' => Date::localized_date($statistics['since']),
		':average' => $statistics['average']
	))?>
	</div>
</div>
