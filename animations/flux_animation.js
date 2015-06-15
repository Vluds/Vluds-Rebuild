$('#flux-container').ready(function()
{
	$('.account').css({opacity: 1, bottom: "0"});

	$('#flux-container').fadeIn(600).css("display", "inline-block").queue(function(){
		animateFluxAccount();

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
		var transformValue = $(accounts[i]).css("transform");

		console.log('MATRIX: ' + transformValue);

		var values = transformValue.split('(')[1].split(')')[0].split(',');
		var a = values[0];
		var b = values[1];
		var c = values[2];
		var d = values[3];

		var scale = Math.sqrt(a*a + b*b);

		console.log('Scale: ' + scale);

		var sin = b/scale;

		var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));

		console.log('Rotate: ' + angle + 'deg');

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

function getTransform()
{
	var el = document.getElementById("thing");
	var st = window.getComputedStyle(el, null);
	var tr = st.getPropertyValue("-webkit-transform") ||
	         st.getPropertyValue("-moz-transform") ||
	         st.getPropertyValue("-ms-transform") ||
	         st.getPropertyValue("-o-transform") ||
	         st.getPropertyValue("transform") ||
	         "FAIL";

	// With rotate(30deg)...
	// matrix(0.866025, 0.5, -0.5, 0.866025, 0px, 0px)
	console.log('Matrix: ' + tr);

	// rotation matrix - http://en.wikipedia.org/wiki/Rotation_matrix

	var values = tr.split('(')[1].split(')')[0].split(',');
	var a = values[0];
	var b = values[1];
	var c = values[2];
	var d = values[3];

	var scale = Math.sqrt(a*a + b*b);

	console.log('Scale: ' + scale);

	// arc sin, convert from radians to degrees, round
	var sin = b/scale;
	// next line works for 30deg but not 130deg (returns 50);
	// var angle = Math.round(Math.asin(sin) * (180/Math.PI));
	var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));

	console.log('Rotate: ' + angle + 'deg');
}