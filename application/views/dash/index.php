<p>
	<?=__('How were you feeling, on average, during the day?')?>
</p>
<div id="star"></div>

<div class="clearfix"></div>

<p class="txt-center">
	<a data-keyboard="true" class="btn" data-controls-modal="modal-chart"
	   data-backdrop="true"><?=__('View Mood Chart')?></a>
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
		<?=__(':count mood updates since :since, with the average rating being :average points.', array(
		':count' => $statistics['count'],
		':since' => Date::localized_date($statistics['since']),
		':average' => $statistics['average']
	))?>
	</div>
</div>
