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
	else if(event.state.page == "profil")
	{
		loadProfil(event.state.username);
	}
	else if(event.state.page == "publication")
	{
		loadPublicationPage(event.state.id);
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