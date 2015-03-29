$(document).ready(function()
{
	$('header').stop().fadeIn(1000);
});

$(document).on('mouseenter', '.button', function()
{
	$(this).stop().animate({backgroundColor: "rgba(37, 199, 125, 1)"}, 400);
	$('p', this).stop().animate({color: "rgba(255, 255, 255, 1)"}, 200);

}).on('mouseleave', '.button', function() 
{
	$(this).stop().animate({backgroundColor: "transparent"}, 400);
	$('p', this).stop().animate({color: "rgba(37, 199, 125, 1)"}, 200);
}).on('click', '.button', function() 
{
	$(this).stop().animate({backgroundColor: "transparent"}, 100);
	$('p', this).stop().animate({color: "rgba(37, 199, 125, 1)"}, 200);
});

function showPopUp(name)
{
	showBackground();
	$('#'+ name +'.popup-box').stop().fadeIn(200);
}

function closePopUp()
{
	$('.popup-box').stop().fadeOut(400);
	closeBackground();
}

$(document).on('mouseenter', '#background-container #close-background', function()
{
	$(this).stop().animate({backgroundColor: "rgba(37, 199, 125, 1)"}, 400).css({backgroundImage: "url('img/cross_hover.png')"}, 200);

}).on('mouseleave', '#background-container #close-background', function() 
{
	$(this).stop().animate({backgroundColor: "transparent"}, 400).css({backgroundImage: "url('img/cross.png')"}, 200);
}).on('click', '#background-container #close-background', function() 
{
	$(this).stop().animate({backgroundColor: "transparent"}, 100).css({backgroundImage: "url('img/cross.png')"}, 200);;
	closeBackground();
});

function showBackground()
{
	$('#background-container').stop().fadeIn(300);
}

function closeBackground()
{
	$('#background-container').stop().fadeOut(500);
}