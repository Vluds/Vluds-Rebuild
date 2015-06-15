$(document).ready(function()
{
	$('header').stop().fadeIn(1000);
});

$(document).on('mouseenter', '.button', function()
{
	$(this).stop().animate({backgroundColor: "rgb(75, 214, 150)"}, 400);
	$('p', this).stop().animate({color: "rgba(255, 255, 255, 1)"}, 200);

}).on('mouseleave', '.button', function() 
{
	$(this).stop().animate({backgroundColor: "rgb(245, 245, 245)"}, 400);
	$('p', this).stop().animate({color: "rgb(75, 214, 150)"}, 200);
}).on('click', '.button', function() 
{
	$(this).stop().animate({backgroundColor: "rgb(245, 245, 245)"}, 100);
	$('p', this).stop().animate({color: "rgb(75, 214, 150)"}, 200);
});

$(document).on('mouseenter', '.check.unactivated', function()
{
	$('.check-action', this).stop().animate({borderSpacing: 5, backgroundColor: "rgb(75, 214, 150)"}, {
		duration: 200,
		step: function(now) {
			$(this).css('box-shadow','0px 0px 0px '+now+'px rgb(255, 255, 255) inset');
		}
	}, 0);
	$('p', this).stop().animate({color: "rgb(75, 214, 150)"}, 200);

}).on('mouseleave', '.check.unactivated', function() 
{
	$('.check-action', this).stop().animate({borderSpacing: 0, backgroundColor: "transparent"}, {
		duration: 200,
		step: function(now) {
			$(this).css('box-shadow','0px 0px 0px '+now+'px rgb(255, 255, 255) inset'); 
		}
	}, 0);
	$('p', this).stop().animate({color: "rgba(30, 30, 30, 0.7)"}, 200);
}).on('click', '.check', function() 
{
	if($(this).hasClass("unactivated"))
	{
		$(this).removeClass('unactivated');
		$(this).addClass('activated');

		$('.check-action', this).stop().animate({borderSpacing: 3, backgroundColor: "rgb(75, 214, 150)"}, {
			duration: 300,
			step: function(now) {
				$(this).css('box-shadow','0px 0px 0px '+now+'px rgb(255, 255, 255) inset'); 
			}
		}, 0);
	}
	else
	{
		$(this).removeClass('activated');
		$(this).addClass('unactivated');

		$('.check-action', this).stop().animate({borderSpacing: 0, backgroundColor: "transparent"}, {
			duration: 200,
			step: function(now) {
				$(this).css('box-shadow','0px 0px 0px '+now+'px rgb(255, 255, 255) inset'); 
			}
		}, 0);
	}
});

$(document).on('mouseenter', '#navbar li', function()
{
	$(this).stop().animate({backgroundColor: "rgba(0, 0, 0, 0.5)"}, 200);

}).on('mouseleave', '#navbar li', function() 
{
	$(this).stop().animate({backgroundColor: "transparent"}, 200);

}).on('click', '#navbar li', function() 
{
	$(this).stop().animate({backgroundColor: "rgba(255, 255, 255, 0.1)"}, 400).animate({backgroundColor: "rgba(0, 0, 0, 0.5)"}, 50);
});

$(document).on('mouseenter', '.mini-avatar', function()
{
	$('.avatar', this).stop().animate({opacity: "0.2"}, 200);
	$('.link-hover', this).stop().fadeIn(300);

}).on('mouseleave', '.mini-avatar', function() 
{
	$('.avatar', this).stop().animate({opacity: "1"}, 300);
	$('.link-hover', this).stop().fadeOut(200);
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
	$(this).stop().animate({backgroundColor: "rgb(75, 214, 150)"}, 400).css({backgroundImage: "url('img/cross_hover.png')"}, 200);

}).on('mouseleave', '#background-container #close-background', function() 
{
	$(this).stop().animate({backgroundColor: "transparent"}, 400).css({backgroundImage: "url('img/cross.png')"}, 200);
}).on('click', '#background-container #close-background', function() 
{
	$(this).stop().animate({backgroundColor: "transparent"}, 100).css({backgroundImage: "url('img/cross.png')"}, 200);
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

var navBarOpen = false;