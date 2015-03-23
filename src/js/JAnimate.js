$(document).ready(function()
{
	$('header').stop().fadeIn(1000).queue(function(){
		$('section').stop().fadeIn(1000);
		$('.account').stop().animate({marginBottom: "0"}, 400).dequeue();
	});
});

$(document).on('mouseenter', '.button', function()
{
	$(this).stop().animate({backgroundColor: "rgba(37, 199, 125, 1)"}, 400);
	$('p', this).stop().animate({color: "rgba(255, 255, 255, 1)"}, 200);

}).on('mouseleave', '.button', function() 
{
	$(this).stop().animate({backgroundColor: "transparent"}, 400);
	$('p', this).stop().animate({color: "rgba(37, 199, 125, 1)"}, 200);
});