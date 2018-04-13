$(document).ready(function() {

	var $window = $(window)

	// make code pretty
	window.prettyPrint && prettyPrint();

	$('.js-copy').click(function(e) {
		e.preventDefault();
		var el = $(this);
		var text = el.closest('.card').find('.data-to-copy');
		dataToCopy = (typeof text == 'undefined') ? text.val() : text.text();
		copyToClipboard(dataToCopy, el);
	});

	$('#file-headers').on('change', function () {
		if($('.alert-danger').length > 0) {
			$('.alert-danger').slideUp();
		}
		$('.custom-file-label').text(this.value.replace(/.*[\/\\]/, ''));
	});

	$('#kitennbees').on('click', function(e) {e.preventDefault();if(e.ctrlKey) {$('textarea').val('munge munge munge...');}});
	var y=[],z="83,81,82,65,70,70,76,69";$(document).keydown(function(e){y.push(e.keyCode);if(y.toString().indexOf(z)>=0){$('#top').prepend('<div class="alert alert-info" role="alert">Arire sver lbhe Fpehssyr va na rapybfrq fcnpr, n Fdehssyr ba gur bgure unaq...</div>');}});
});