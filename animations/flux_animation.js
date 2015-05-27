$('#flux-container').ready(function()
{
	$('#text-container').css({marginTop: "0"});
	$('.account').css({opacity: 1, bottom: "0"});
	$('#flux-container').fadeIn(600).css("display", "inline-block").queue(function(){
		fluxAccount();
	});
});


function movement()
{
	var move = Math.floor(Math.random() * (10 - 1)) + 1;
	console.log(move);

	var scale = move * 0.1;
	console.log(scale);

	var range = 10 + scale;
	console.log(range);

	var accounts = $('#flux-container .area#1').children('.mini-avatar');

	var enumAccountDiv = $('#flux-container .area#1').children('.mini-avatar').size();
	console.log(enumAccountDiv);

	var i = 0;
	while(i < enumAccountDiv)
	{
		$(accounts[i]).animate({  borderSpacing: range }, {
		    step: function(now,fx) {
		      $(this).css('-webkit-transform','translate('+now+'em)'); 
		      $(this).css('-moz-transform','translate('+now+'em)');
		      $(this).css('transform','translate('+now+'em)');
		    },
		    duration:'slow'
		},'linear');

		i++;
	}
}