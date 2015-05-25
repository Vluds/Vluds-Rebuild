$('#flux-container').ready(function()
{
	$('#text-container').css({marginTop: "0"});
	$('.account').css({opacity: 1, bottom: "0"});
	$('#flux-container').fadeIn(600).css("display", "inline-block");
});

$(document).on('mouseenter', '.avatar', function() {
	$('img', this).shake(500);
});