$('#home-container').ready(function()
{
	$('#home-container').fadeIn(400).css("display", "inline-block");
	$('.account').stop().animate({marginBottom: "0"}, 400);
});