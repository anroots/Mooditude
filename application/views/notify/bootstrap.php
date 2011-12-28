<?php defined('SYSPATH') or die('No direct script access.');

foreach ($msgs as $msg_type => $msgs_of_type):
	$class = 'info';
	if (in_array($msg_type, array('success', 'warning', 'error'))) {
		$class = $msg_type;
	}    ?>
<div class="alert-message fade in <?=$class ?>">

	<? if (count($msgs_of_type) > 0) {
	echo implode("<br />\n", $msgs_of_type);
} else {
	echo $msgs_of_type;
}
	?>
</div>
<?
endforeach;
?>