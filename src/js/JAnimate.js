$(document).on('mouseenter', '.button', function()
{
	$(this).stop().animate({backgroundColor: "transparent"});
	$('p', this).stop().animate({color: "rgba(37, 199, 125, 1)"});

}).on('mouseleave', '.button', function() 
{
	$(this).stop().animate({backgroundColor: "rgba(37, 199, 125, 1)"});
	$('p', this).stop().animate({color: "rgba(255, 255, 255, 1)"});
});