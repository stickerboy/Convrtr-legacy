var alpha		= " ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
var replace		= " ⱯQƆPƎℲפHIſʞ˥WNOԀQɹS┴∩ΛMX⅄Zɐqɔpǝɟƃɥıɾʞןɯuodbɹsʇnʌʍxʎz";

function encode(message, alpha, replace) {
	var newMessage = "";
	messageArr = message.split('');

	for(i in messageArr) {
		index = alpha.search(messageArr[i]);
		newMessage += (typeof replace[index] == 'undefined') ? ' ' : replace[index];
	}
	return newMessage;
}

function flipText() {
	var flipDirection = $('.check').is(':checked');
	var flipped = (flipDirection == true) ? encode($('.fliptext').val(), replace, alpha) : encode($('.fliptext').val(), alpha, replace);
	$('.row.mt-4').removeClass('d-none');
	$(".flipresult").html(flipped);
	$(".flipdl").val(flipped);
}

$(document)
	.on('click', '.js-flip-text', flipText);