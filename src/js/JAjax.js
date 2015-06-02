function loadHeader()
{
	$("header").stop().fadeOut(200).queue(function()
	{
		$(this).html("<p>Chargement ...</p>");

		$.post("src/php/executor.php", { action: "loadHeader"}, function(data)
		{
			if(data.result == true)
			{
				$("header").html(data.reply).fadeIn(200);
			}
			else
			{
				alert(data.error);
				$("header").fadeIn(200);
			}

		}, "json");

		$(this).dequeue();
	});
}

function loadNavBar()
{
	$("#navbar").stop().fadeOut(200).queue(function()
	{
		$(this).html("<p>Chargement ...</p>");

		$.post("src/php/executor.php", { action: "loadNavBar"}, function(data)
		{
			if(data.result == true)
			{
				$("#navbar").html(data.reply);
			}
			else
			{
				alert(data.error);
				$("#navbar");
			}

		}, "json");

		$(this).dequeue();
	});
}

function loadModel(modelName)
{
	$("#ajax-container").stop().fadeOut(200).queue(function()
	{
		$(this).html("<p>Chargement ...</p>");

		$.post("src/php/executor.php", { action: "loadModel", modelName: modelName}, function(data)
		{
			if(data.result == true)
			{
				window.history.pushState({page: data.modelName}, data.modelName, data.modelName);

				if(isFileExist("css/" + data.modelName + "_style.css"))
				{
					$("head").append('<link rel="stylesheet" type="text/css" href="css/' + data.modelName + '_style.css">').queue(function()
					{
						console.log("style loaded");

						$("#ajax-container").html(data.reply).fadeIn(200).queue(function()
						{	
							if(isFileExist("animations/" + data.modelName + "_animation.js"))
							{
								$.ajax({
									type: "GET",
									url: "animations/" + data.modelName + "_animation.js",
									dataType: "script",
									error : function()
									{
									   console.log("animation load: error");
									},
									complete: function()
									{
										console.log("animation loaded");
									}
								});
							}

							$(this).dequeue();
						});
							
						$(this).dequeue();
					});
				}
			}
			else
			{
				alert(data.error);
				$("#ajax-container").fadeIn(200);
			}

		}, "json");

		$(this).dequeue();
	});
}

function regUser()
{
	var emailInput = $('#register-form #email-input').val();
	var usernameInput = $('#register-form #username-input').val();
	var passwordInput = $('#register-form #password-input').val();

	if(emailInput.length > 0)
	{
		$('#register-form #email-input').parent().parent().find('.info-form-input').fadeOut(200);

		var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
 
	    if(reg.test(emailInput))
	    {
	    	if(usernameInput.length > 3)
			{
				$('#register-form #username-input').parent().parent().find('.info-form-input').fadeOut(200);

				if(passwordInput.length > 0)
				{
					$('#register-form #password-input').parent().parent().find('.info-form-input').fadeOut(200);

					$.post("src/php/executor.php", { action: "regUser", emailInput: emailInput, usernameInput: usernameInput, passwordInput: passwordInput}, function(data)
					{
						if(data.result == true)
						{
							$('#register-container #text-container').slideUp(200);
							$('#register-container #register-form').slideUp(200);
							$('#register-container #accounts-container').animate({marginBottom: "20px"}, 200);

							$('#register-container #info-container .error-container').slideUp(200);
							$('#register-container #info-container .message-container p').html(data.reply).parent().slideDown(400);
						}
						else
						{
							$('#register-container #info-container .error-container p').html(data.error).parent().slideDown(400);
						}

					}, "json");
				}
				else
				{
					$('#register-form #password-input').parent().parent().find('.info-form-input p').html("<p>Ce champs est vide !</p>").parent().fadeIn(400);
				}
			}
			else
			{
				$('#register-form #username-input').parent().parent().find('.info-form-input p').html("<p>Le nom d'utilisateur doit comporter au moins 4 caractères !</p>").parent().fadeIn(400);
			}
	    }
	    else
	    {
	    	$('#register-form #email-input').parent().parent().find('.info-form-input p').html("<p>L'adresse e-mail n'est pas valide !</p>").parent().fadeIn(400);
	    }

	}
	else
	{
		$('#register-form #email-input').parent().parent().find('.info-form-input p').html("<p>Ce champs est vide !</p>").parent().fadeIn(400);
	}
}

function logUser()
{
	var usernameInput = $('#login-form #username-input').val();
	var passwordInput = $('#login-form #password-input').val();

	if(usernameInput.length > 0)
	{
		$('#login-form #username-input').parent().parent().find('.info-form-input').fadeOut(200);

		if(passwordInput.length > 0)
		{
			$('#login-form #password-input').parent().parent().find('.info-form-input').fadeOut(200);

			$.post("src/php/executor.php", { action: "logUser", usernameInput: usernameInput, passwordInput: passwordInput}, function(data)
			{
				if(data.result == true)
				{
					$('#login-container #info-container .error-container').slideUp(200);
					$('#login-container #info-container .message-container p').html(data.reply).parent().slideDown(400).delay(500).queue(function()
					{
						loadHeader();
						loadNavBar();
						loadModel('flux');

						$(this).dequeue();
					});
				}
				else
				{
					$('#login-container #info-container .error-container p').html(data.error).parent().slideDown(400);
				}

			}, "json");
		}
		else
		{
			$('#login-form #password-input').parent().parent().find('.info-form-input p').html("<p>Ce champs est vide !</p>").parent().fadeIn(400);
		}
	}
	else
	{
		$('#login-form #username-input').parent().parent().find('.info-form-input p').html("<p>Ce champs est vide !</p>").parent().fadeIn(400);
	}
}

function logOut()
{
	$.post("src/php/executor.php", { action: "logOut"}, function(data)
	{
		if(data.result == true)
		{	
			loadHeader();
			loadModel('home');
			loadNavBar();
			navBarAction();

			messageBox("Attention", "Vous êtes maintenant déconnecté !");
		}
		else
		{
			messageBox("Erreur", "Nous n'avons pas pu vous déconnecter !");
		}

	}, "json");
}

function accountActivation(username, activationKey)
{
	$.when(loadModel('validation')).done(function()
	{
		$.post("src/php/executor.php", { action: "checkActivationKey", username: username, activationKey: activationKey}, function(data)
		{
			if(data.result == true)
			{
				$('#validation-container #info-container .error-container').fadeOut();
				$('#validation-container #info-container .message-container p').html(data.reply).parent().fadeIn(400);
			}
			else
			{
				$('#validation-container #info-container .error-container p').html(data.error).parent().fadeIn(400);
			}
		}, "json");
	});
	
}

function setTime()
{
	$.post("src/php/executor.php", { action: "setTime"}, function(data)
	{
		if(data.result == 1)
		{
			console.log("time set");
		}
		else
		{
			console.log("time not set");
		}

	}, "json");
}

function checkToken()
{
	$.post("src/php/executor.php", { action: "checkToken"}, function(data)
	{
		if(data.result == 1)
		{
			
		}
		else if(data.result == 0)
		{
			logOut();

			console.log("Aie ...", "Vos tokens ne sont plus valide !");
		}
		else if(data.result == -1)
		{
			console.log('Non connecté')
		}

	}, "json");
}

function messageBox(title, message)
{
	$.post("src/php/executor.php", { action: "messageBox"}, function(data)
	{
		if(data.result)
		{
			$('#background-container').append(data.reply);
			showPopUp('messageBox');
		}
		else
		{

		}

	}, "json");
}

function uploadAvatar(files, avatarFile)
{
	var file = files[0];

	if(file.type.match('image.*'))
	{
	 	function ajaxRequest(callback)
	 	{
		 	var formData = new FormData();
		 	formData.append("action", "uploadAvatar");
		 	formData.append("avatarFile", file);

		 	var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function() 
			{
		        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) 
		        {
		            var myArr = JSON.parse(xhr.responseText);
        			callback(myArr);
		        }
			};

			xhr.open('POST', 'src/php/executor.php', true);
			xhr.send(formData);
		}

		function readData(sData) 
		{
			if(sData.result == true && sData.reply != false)
			{
				$('#navbar #navbar-profil .account .avatar').fadeOut(300)
				.queue(function()
				{
					$(this).css({"background-image": "url("+sData.reply+")"});

					$(this).dequeue();
				})
				.fadeIn(300);

				if(history.state.page == "profil")
				{
					$('#profil-container #accounts-container .account .avatar').fadeOut(300)
					.queue(function()
					{
						$(this).css({"background-image": "url("+sData.reply+")"});
						
						$(this).dequeue();
					})
					.fadeIn(500);
				}
				
			   	$('#profil-container .message-container').slideDown(600).delay(5000).slideUp(800);
			    console.log("avatar upload: done");
			} 
			else 
			{
			   	messageBox("Nous n'avons pas pu modifier votre avatar ... Veuillez réesayer avec un autre fichier.");
			   	console.log("avatar upload: error");	    
			}

			console.log("error: " + sData.error);
		}

		ajaxRequest(readData);
	}
	else
	{
		messageBox("Le fichier n'est pas une image !");
	}
}