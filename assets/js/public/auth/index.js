$(document).ready(function () {
	$('#demo').click(function () {
		$('#user').val('test');
		flash_green('#user');
		$('#pass').val('test');
		flash_green('#pass');

		$('#login-form').submit();
	})
});