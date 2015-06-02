$('#flux-container').ready(function()
{
	$('.account').css({opacity: 1, bottom: "0"});

	$('#flux-container').fadeIn(600).css("display", "inline-block").queue(function(){
		fluxAccount();

		$(this).dequeue();
	});

	$('.message-container').slideDown(600);
});


function movement()
{
	var move = Math.floor(Math.random() * (10 - 1)) + 1;
	console.log(move);

	var scale = move * 0.1;
	console.log(scale);

	var range = 10 + scale;
	console.log(range);

	var accounts = $('#flux-container .area#type_1').children('.mini-avatar');

	var enumAccountDiv = $('#flux-container .area#type_1').children('.mini-avatar').size();
	console.log(enumAccountDiv);

	var i = 0;
	while(i < enumAccountDiv)
	{
		$(accounts[i]).animate({borderSpacing: 360}, {
			duration: 1000,
			step: function(now) {
				$(this).css('-webkit-transform','rotate('+now+'deg) translate(10em) rotate(-'+now+'deg)'); 
				$(this).css('-moz-transform','rotate('+now+'deg) translate(10em) rotate(-'+now+'deg)');
				$(this).css('transform','rotate('+now+'deg) translate(10em) rotate(-'+now+'deg)');
			}
		}, 0);

		i++;
	}
}