
$(window).on('load', function() {
    $('#status').fadeOut();
    $('#preloader').delay(500).fadeOut();
});

$(function() {
	new WOW().init();
});

