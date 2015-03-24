$('#home-container').ready(function()
{
	$('#home-container').fadeIn(400).css("display", "inline-block");
	$('.account').stop().animate({opacity: 1, bottom: "0"}, 400);
});