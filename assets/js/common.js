/**
 * i18n function
 *
 * @todo
 * @param input The input string
 * @return string Translated string
 */
function str(input) {
	return input;
}

/**
 * Show a message to the user
 *
 * @param text The message
 * @param type The type of an alert (erros, success...)
 * @param translate Whether to translate the string
 */
function notify(text, type, translate) {
	if (typeof type == undefined) {
		type = 'info';
	}
	if (typeof translate == undefined) {
		translate = true;
	}
	$('#notifications').append('<div data-alert class="alert-message fade in ' + type + '"><a class="close" href="#">×</a><p>' + (translate ? str(text) : text ) + '</p></div>');
}

/**
 *
 * @param context
 */
function flash_green(context) {
	return _flash(context, '#97DB97');
}

/**
 *
 * @param context
 * @param color
 */
function _flash(context, color) {
	original_color = $(context).css('background-color');
	$(context).animate({ backgroundColor: color }, 500).animate({backgroundColor:original_color });
}