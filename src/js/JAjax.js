function loadModel(modelName)
{
	$("#ajax-container").stop().fadeOut(200).queue(function() {
		$(this).html("<h3>Fini !</h3>");

		$.post("src/php/executor.php", { action: "loadModel", modelName: modelName}, function(data)
		{
			if(data.result == true)
			{
				$("#ajax-container").html(data.reply).fadeIn(200);
			}
			else
			{
				alert(data.error);
			}

		}, "json");

		$(this).dequeue();
	});
}