$('#home-container').ready(function()
{
	$('#home-container').fadeIn(400).css("display", "inline-block");
	$('#text-container').stop().animate({marginTop: "0"}, 400);
	$('.account').stop().animate({opacity: 1, bottom: "0"}, 400);
});

/*var countAvatarJump = 0;

$(document).on('mouseenter', '.avatar', function()
{
	if(countAvatarJump <= 10)
	{
		$(this).parent().stop().animate({paddingBottom: "20px"}, 100).queue(function(){
			$(this).stop().animate({paddingBottom: "0px"}, 200).dequeue();
		});

		countAvatarJump++;
	}
	else
	{
		$('#egg_jump').fadeIn(200);
	}
});*/