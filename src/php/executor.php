<?php
	session_start();

	require("class/bdd.php");
	require("class/Engine.php");
	require("class/User.php");

	$dataArray = array();

	if(isset($_POST['action']) AND !empty($_POST['action']))
	{
		$newStaticBdd = new BDD();

		$action = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['action']));

		if($action == "isUserLogged")
		{
			$dataArray['result'] = User::isLogged();
		}

		if($action == "loadHeader")
		{
			$returnModel = array();
			$returnModel = Engine::loadHeader();
			$dataArray['error'] = $returnModel['error'];

			if($returnModel['result'] == true)	
			{
				$dataArray['reply'] = $returnModel['reply'];
				$dataArray['result'] = $returnModel['result'];
			}
			else
			{
				$dataArray['result'] = false;
			}
		}

		if($action == "loadNavBar")
		{
			$returnModel = array();
			$returnModel = Engine::loadNavBar();
			$dataArray['error'] = $returnModel['error'];

			if($returnModel['result'] == true)	
			{
				$dataArray['reply'] = $returnModel['reply'];
				$dataArray['result'] = $returnModel['result'];
			}
			else
			{
				$dataArray['result'] = false;
			}
		}

		if($action == "loadModel")
		{
			if(isset($_POST['modelName']))
			{
				$modelName = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['modelName']));

				$returnModel = array();
				$returnModel = Engine::loadModel($modelName);
				$dataArray['error'] = $returnModel['error'];

				if($returnModel['result'] == true)	
				{
					$dataArray['reply'] = $returnModel['reply'];
					$dataArray['modelName'] = $returnModel['modelName'];
					$dataArray['result'] = $returnModel['result'];
				}
				else
				{
					$dataArray['result'] = false;
				}
			}
			else
			{
				$dataArray['result'] = false;
			}
		}

		if($action == "regUser")
		{
			if(isset($_POST['emailInput']) AND isset($_POST['usernameInput']) AND isset($_POST['passwordInput']))
			{
				$email = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['emailInput']));
				$username = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['usernameInput']));
				$password = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['passwordInput']));

				$returnFunction = array();
				$returnFunction = User::regUser($username, $password, $email);
				$dataArray['error'] = $returnFunction['error'];

				if($returnFunction['result'] == true)	
				{
					$dataArray['reply'] = $returnFunction['reply'];
					$dataArray['result'] = $returnFunction['result'];
				}
				else
				{
					$dataArray['result'] = false;
				}
			}
			else
			{
				$dataArray['result'] = false;
			}
		}

		if($action == "logUser")
		{
			if(isset($_POST['usernameInput']) AND isset($_POST['passwordInput']))
			{
				$username = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['usernameInput']));
				$password = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['passwordInput']));

				$returnFunction = array();
				$returnFunction = User::logUser($username, $password);
				$dataArray['error'] = $returnFunction['error'];

				if($returnFunction['result'] == true)
				{
					$dataArray['reply'] = $returnFunction['reply'];
					$dataArray['result'] = $returnFunction['result'];
				}
				else
				{
					$dataArray['result'] = false;
				}
			}
			else
			{
				$dataArray['result'] = false;
			}
		}

		if($action == "logOut")
		{
			if(User::logOut())
			{
				$dataArray['result'] = 1;
			}
			else
			{
				$dataArray['result'] = 0;
			}
		}

		////////setTime///////
		if($action == "setTime")
		{
			if(User::setTime())
			{
				$dataArray['result'] = 1;
			}
			else
			{
				$dataArray['result'] = 0;
			}
		}

		if($action == "checkToken") 
		{
			$returnToken = User::checkToken();
			if($returnToken == 1)
			{
				$dataArray['result'] = 1;
			}
			else if ($returnToken == -1)
			{
				$dataArray['result'] = -1;
			}
			else
			{
				$dataArray['result'] = 0;
			}
		}

		if($action == "checkActivationKey")
		{
			if(isset($_POST['username']) AND isset($_POST['activationKey']))
			{
				$username = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['username']));
				$activationKey = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['activationKey']));

				$returnCheck = array();
				$returnCheck = User::checkActivationKey($username, $activationKey);
				$dataArray['error'] = $returnCheck['error'];

				if($returnCheck['result'] == true)
				{
					$dataArray['reply'] = $returnCheck['reply'];
					$dataArray['result'] = $returnCheck['result'];
				}
				else
				{
					$dataArray['result'] = false;
				}
			}
			else
			{
				$dataArray['result'] = false;
			}
		}

		if($action == "messageBox")
		{
			if(isset($_POST['title']) AND isset($_POST['message']))
			{
				$title = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['title']));
				$message = $newStaticBdd->real_escape_string(htmlspecialchars($_POST['message']));

				$returnBox = array();
				$returnBox = User::checkActivationKey($title, $message);
				$dataArray['error'] = $returnBox['error'];

				if($returnBox['result'] == true)
				{
					$dataArray['reply'] = $returnBox['reply'];
					$dataArray['result'] = $returnBox['result'];
				}
				else
				{
					$dataArray['result'] = false;
				}
			}
			else
			{
				$dataArray['result'] = false;
			}
		}

		if($action == "uploadAvatar") 
		{
			if(isset($_FILES['avatarFile']) and !empty($_FILES['avatarFile']))
			{
				$avatarFile = $_FILES['avatarFile'];

				$returnAvatar = array();
				$returnAvatar = User::uploadAvatar($avatarFile);
				$dataArray['error'] = $returnAvatar['error'];
				$dataArray['reply'] = $returnAvatar['reply'];
				$dataArray['result'] = $returnAvatar['result'];
			}
			else
			{
				$dataArray['error'] = "Executor.php: File not set !";
				$dataArray['result'] = false;
			}
		}
	}
	else
	{
		$dataArray['result'] = "Executor.php: POST NOT SET";
	}

	echo json_encode($dataArray);
?>