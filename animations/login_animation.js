$('#login-container').ready(function()
{
	$('#login-container').fadeIn(400).css("display", "inline-block");
	$('#text-container').stop().animate({marginTop: "0"}, 400);
	$('.account').stop().animate({opacity: 1, bottom: "0"}, 400);
});