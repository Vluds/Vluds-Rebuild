var checkToken = setInterval(checkToken, 10000);

$(document).on('click', function() 
{
	setTime();
});

checkAcceptationCookies();

var statePage;

if(typeof history.pushState == 'undefined')
{
	alert("Votre navigateur n'est pas assez récent !");
}	

window.onpopstate = function(event)
{
	statePage = event.state.page;

	if(event.state.page == "home")
	{
		loadModel('home');
	}
	else if(event.state.page == "register")
	{
		loadModel('register');
	}
	else if(event.state.page == "login")
	{
		loadModel('login');
	}
	else if(event.state.page == "validation")
	{
		loadModel('validation');
	}
	else if(event.state.page == "tagsfinder")
	{
		loadTagsFinder(event.state.tag);
	}
	else if(event.state.page == "manager")
	{
		loadManager(event.state.tag);
	}
}

function checkAcceptationCookies()
{
	var cookieValue = getCookie('AcceptationCookies');

	if(cookieValue != 1)
	{
		showPopUp('cookiesPrivacy');
	}
	else
	{
		closePopUp();
	}
}

function AcceptCookies()
{
	var today = new Date(), expires = new Date();
	expires.setTime(today.getTime() + (365*24*60*60*1000));
	document.cookie = "AcceptationCookies =" + encodeURIComponent(1) + ";expires=" + expires.toGMTString();

	closePopUp();
}

function getCookie(cookieName) 
{
    var oRegex = new RegExp("(?:; )?" + cookieName + "=([^;]*);?");
 
	if (oRegex.test(document.cookie))
    {
		return decodeURIComponent(RegExp["$1"]);
	} 
	else 
	{
		return null;
	}
}

function isFileExist(src)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', src, false);
    http.send();
    return http.status!=404;
}


function animateFluxAccount()
{
	var translationRange = 10;
	var translationDuration = 500;
	var rotationDuration = 1000;

	var accounts = $('#flux-container .area#type_1').children('.mini-avatar');

	var enumAccountDiv = $('#flux-container .area#type_1').children('.mini-avatar').size();
	console.log(enumAccountDiv);

	$(accounts).animate({borderSpacing: translationRange}, {
		duration: translationDuration,
		step: function(now) {
			$(this).css('-webkit-transform','translate('+now+'em)'); 
			$(this).css('-moz-transform','translate('+now+'em)');
			$(this).css('transform','translate('+now+'em)');
		}
	}, 0);

	var degree = 360 / enumAccountDiv;
	console.log(degree);

	var i = 0;
	var d = 0;
	while((i < enumAccountDiv) && (d < 360))
	{
		/*console.log('i: '+i);
		console.log('d: '+d);
		console.log(accounts[i]);*/

		$(accounts[i]).animate({borderSpacing: d}, {
			duration: rotationDuration,
			step: function(now) {
				$(this).css('-webkit-transform','rotate('+now+'deg) translate(10em) rotate(-'+now+'deg)'); 
				$(this).css('-moz-transform','rotate('+now+'deg) translate(10em) rotate(-'+now+'deg)');
				$(this).css('transform','rotate('+now+'deg) translate(10em) rotate(-'+now+'deg)');
			}
		}, 0);

		i++;
		d = d+degree;
	}
}

function recalibrateFluxAccount()
{
	var rotationDuration = 500;

	var accounts = $('#flux-container .area#type_1').children('.mini-avatar');

	var enumAccountDiv = $('#flux-container .area#type_1').children('.mini-avatar').size();
	console.log(enumAccountDiv);

	var degree = 360 / enumAccountDiv;
	console.log(degree);

	var i = 0;
	var d = 0;
	while((i < enumAccountDiv) && (d < 360))
	{
		/*console.log('i: '+i);
		console.log('d: '+d);
		console.log(accounts[i]);*/

		$(accounts[i]).animate({borderSpacing: d}, {
			duration: rotationDuration,
			step: function(now) {
				$(this).css('-webkit-transform','rotate('+now+'deg) translate(10em) rotate(-'+now+'deg)'); 
				$(this).css('-moz-transform','rotate('+now+'deg) translate(10em) rotate(-'+now+'deg)');
				$(this).css('transform','rotate('+now+'deg) translate(10em) rotate(-'+now+'deg)');
			}
		}, 0);

		i++;
		d = d+degree;
	}
}

function joinCenter(div)
{
	var translationRange = 0;
	var translationDuration = 500;

	$(div).animate({borderSpacing: translationRange}, {
		duration: translationDuration,
		step: function(now) {
			$(this).css('-webkit-transform','translate('+now+'em)'); 
			$(this).css('-moz-transform','translate('+now+'em)');
			$(this).css('transform','translate('+now+'em)');
		}
	}, 0);
}

function navBarAction()
{

	if(!navBarOpen)
	{
		openNavBar();
	}
	else
	{
		closeNavBar();
	}
}

function openNavBar()
{
	$('header #username').stop().fadeOut(200);

	$("#navbar").fadeIn(0).stop().animate({
		width: '270px',
	}, 300);

	$("#navbar").children().stop().fadeIn(500);

	$('#ajax-container').stop().animate({
		paddingRight: '270px',
	}, 300);

	navBarOpen = true;

	$("header #navbar-button").fadeOut(200).queue(function()
	{
		$(this).css({
			backgroundImage: "url('img/navbar_button_open.png')"
		})
		.fadeIn(200);

		$(this).dequeue();
	});
}

function closeNavBar()
{
	$('header #username').stop().fadeIn(400);

	$("#navbar").children().stop().fadeOut(100);
			
	$("#navbar").stop().animate({
		width: '0px'
	}, 300).fadeOut(0);


	$('#ajax-container').stop().animate({
		paddingRight: '0',
	}, 300);

	navBarOpen = false;

	$("header #navbar-button").fadeOut(200).queue(function()
	{
		$(this).css({
			backgroundImage: "url('img/navbar_button.png')"
		})
		.fadeIn(200);

		$(this).dequeue();
	});
}

function selectAvatar()
{
	$("#profil-container #options-container #avatar-upload").click();
}

$(document).on('change', '#profil-container #options-container #avatar-upload', function(event) 
{
	var avatarFile = $(this).val();

    uploadAvatar(event.target.files, avatarFile);
});

$(document).on('keydown', '#tutorial-container #user-tags-information #tag-input', function(event) 
{
	var tagName = $(this).val();

	if(event.keyCode == 32)
	{
		addUserTag(tagName);
	}
});

/*$(document).on('keyup', '#register-form input', function()
{
	var inputAttr = $(this).attr("id");

	if(inputAttr == "email-input")
	{
		var inputValue = $(this).val();

		if(inputValue.lenght != 0)
		{
			$(this).parent().parent().find('.info-form-input').fadeIn(400);
		}
		else
		{
			$(this).parent().parent().find('.info-form-input').fadeOut(200);
		}
	}
	else if(inputAttr == "username-input")
	{
		$(this).parent().parent().find('.info-form-input').fadeIn(400);
	}
	else if(inputAttr == "password-input")
	{
		$(this).parent().parent().find('.info-form-input').fadeIn(400);
	}
});*/