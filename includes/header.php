<nav>
	<ul id="left-container">
		<li id="logo" onClick="loadModel('home')"><h1>vluds</h1></li>
	</ul>

	<ul id="right-container">
<?php
	if(User::isLogged())
	{
?>
		<li id="username"><h3><?php echo User::getUsername();?></h3></li>
		<li id="navbar-button" onClick="navBarAction()"></li>
<?php
	}
?>
	</ul>
</nav>