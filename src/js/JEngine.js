/*Start function*/
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