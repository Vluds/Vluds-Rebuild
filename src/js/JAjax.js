function loadModel(modelName)
{
	$("#ajax-container").stop().fadeOut(200).queue(function() {
		$(this).html("<p>Chargement ...</p>");

		$.post("src/php/executor.php", { action: "loadModel", modelName: modelName}, function(data)
		{
			if(data.result == true)
			{
				window.history.pushState({page: modelName}, modelName, modelName);

				$("#ajax-container").html(data.reply).fadeIn(200).queue(function()
				{
					if(isFileExist("animations/" + modelName + "_animation.js"))
					{
						$.ajax({
							type: "GET",
							url: "animations/" + modelName + "_animation.js",
							dataType: "script",
							error : function(){
						    	console.log("error");
						   	},
						   	complete: function(){
						    	console.log("complete");
						   	}
						});
					}

					return true;
					
					$(this).dequeue();
				});

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

							$('#register-container #info-container #error-container').slideUp(200);
							$('#register-container #info-container #message-container p').html(data.reply).parent().slideDown(400);
						}
						else
						{
							$('#register-container #info-container #error-container p').html(data.error).parent().slideDown(400);
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
					$('#login-container #info-container #error-container').slideUp(200);
					$('#login-container #info-container #message-container p').html(data.reply).parent().slideDown(400);
					loadModel('profil');
				}
				else
				{
					$('#login-container #info-container #error-container p').html(data.error).parent().slideDown(400);
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

function accountActivation(username, activationKey)
{
	$.when(loadModel('validation')).done(function()
	{
		$.post("src/php/executor.php", { action: "checkActivationKey", username: username, activationKey: activationKey}, function(data)
		{
			if(data.result == true)
			{
				$('#validation-container #info-container #error-container').fadeOut();
				$('#validation-container #info-container #message-container p').html(data.reply).parent().fadeIn(400);
			}
			else
			{
				$('#validation-container #info-container #error-container p').html(data.error).parent().fadeIn(400);
			}
		}, "json");
	});
	
}
