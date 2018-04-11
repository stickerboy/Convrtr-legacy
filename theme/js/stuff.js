$(document).ready(function() {

	var $window = $(window)

	// make code pretty
	window.prettyPrint && prettyPrint();

	$('.js-copy').click(function(e) {
		e.preventDefault();
		//var text = $('.data-to-copy').attr('data-copy');
		var el = $(this);
		var text = el.closest('.card').find('.data-to-copy');
		dataToCopy = (typeof text == 'undefined') ? text.val() : text.text();
		copyToClipboard(dataToCopy, el);
	});
});