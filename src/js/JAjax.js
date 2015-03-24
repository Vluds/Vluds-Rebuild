function loadModel(modelName)
{
	$("#ajax-container").stop().fadeOut(200).queue(function() {
		$(this).html("<p>Chargement ...</p>");

		$.post("src/php/executor.php", { action: "loadModel", modelName: modelName}, function(data)
		{
			if(data.result == true)
			{
				window.history.pushState({page: modelName}, modelName);

				$("#ajax-container").html(data.reply).fadeIn(200).queue(function(){
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