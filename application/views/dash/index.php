<p>
	<?=__(':count mood updates since :since, with the average rating being :average points.', array(
	':count' => $statistics['count'],
	':since' => Date::localized_date($statistics['since']),
	':average' => $statistics['average']
))?>
</p>

<p>
	<?=__('How were you feeling, on average, during the day?')?>
</p>
<div id="star"></div>