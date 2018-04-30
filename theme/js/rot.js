$(document).ready(function() {
	$(".rotlink").click(function(e) {
		e.preventDefault();
		var rotstring = $(".rottext").val();
		if (rotstring != '') {
			$(".alpha").removeClass("active");
			$(".row").removeClass("d-none");
			$(this).parent("li").addClass("active");
			var rotnumber = $(this).attr('id').replace('rot', '');
			$(".rotresult").html(rot(rotstring, parseInt(rotnumber)));
			$(".rotdl").val(rot(rotstring, parseInt(rotnumber)));
		}
	});

	var $first = $('.alpha:first', '.pagination');
	var $last = $('.alpha:last', '.pagination');

	/* Next prev highlighting of list elments
	 * Idea taked from: https://stackoverflow.com/a/17707287/3172872
	 */
	$("#next").click(function (e) {
		e.preventDefault();
		var $next;
		var $selected = $(".active");
		// get the selected item
		// If next li is empty , get the first
		$next = $selected.next('.alpha').length ? $selected.next('.alpha') : $first;
		$selected.removeClass("active");
		$next.addClass('active');
		$selected.next('.alpha').length ? $selected.next().children().click() : $first.children().click();
	});

	$("#prev").click(function (e) {
		e.preventDefault();
		var $prev,
			$selected = $(".active");
		// get the selected item
		// If prev li is empty , get the last
		$prev = $selected.prev('.alpha').length ? $selected.prev('.alpha') : $last;
		$selected.removeClass("active");
		$prev.addClass('active');
		$selected.prev().children().click()
		$selected.prev('.alpha').length ? $selected.prev().children().click() : $last.children().click();
	});
});

/* function rot13(s) {
	return s.replace( /[A-Za-z]/g , function(c) {
		return String.fromCharCode( c.charCodeAt(0) + ( c.toUpperCase() <= "M" ? 13 : -13 ) );
	} );
}

var text = "Hello HackerRank";
var altered = text.rot13();

console.log(altered); */


/*! http://mths.be/rot v0.1.0 by @mathias | MIT license */
;(function(root) {

	// Detect free variables `exports`
	var freeExports = typeof exports == 'object' && exports;

	// Detect free variable `module`
	var freeModule = typeof module == 'object' && module &&
		module.exports == freeExports && module;

	// Detect free variable `global`, from Node.js or Browserified code,
	// and use it as `root`
	var freeGlobal = typeof global == 'object' && global;
	if (freeGlobal.global === freeGlobal || freeGlobal.window === freeGlobal) {
		root = freeGlobal;
	}

	/*--------------------------------------------------------------------------*/

	var lowercase = 'abcdefghijklmnopqrstuvwxyz';
	var uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	var regexLowercase = /[a-z]/;
	var regexUppercase = /[A-Z]/;

	var rot = function(string, n) {
		if (n == null) {
			// use ROT-13 by default
			n = 13;
		}
		n = Number(n);
		string = String(string);
		if (n == 0) {
			return string;
		}
		if (n < 0) { // decode instead of encode
			n += 26;
		}
		var length = string.length; // note: no need to account for astral symbols
		var index = -1;
		var result = '';
		var character;
		var currentPosition;
		var shiftedPosition;
		while (++index < length) {
			character = string.charAt(index);
			if (regexLowercase.test(character)) {
				currentPosition = lowercase.indexOf(character);
				shiftedPosition = (currentPosition + n) % 26;
				result += lowercase.charAt(shiftedPosition);
			} else if (regexUppercase.test(character)) {
				currentPosition = uppercase.indexOf(character);
				shiftedPosition = (currentPosition + n) % 26;
				result += uppercase.charAt(shiftedPosition);
			} else {
				result += character;
			}
		}
		return result;
	};

	rot.version = '0.1.0';

	// Some AMD build optimizers, like r.js, check for specific condition patterns
	// like the following:
	if (
		typeof define == 'function' &&
		typeof define.amd == 'object' &&
		define.amd
	) {
		define(function() {
			return rot;
		});
	}	else if (freeExports && !freeExports.nodeType) {
		if (freeModule) { // in Node.js or RingoJS v0.8.0+
			freeModule.exports = rot;
		} else { // in Narwhal or RingoJS v0.7.0-
			freeExports.rot = rot;
		}
	} else { // in Rhino or a web browser
		root.rot = rot;
	}

}(this));
