<?php

class User
{
	public $newbdd;

	private $id;
	private $username;
	private $password;
	private $token;

	public function __construct()
	{
		$this->newbdd = new BDD();

		$dataArray = array();
	}

	public static function randomSalt($nbChar) 
	{
		$randString = "";
		$chars = "abcdefghijklmnpqrstuvwxy0123456789";
		srand((double)microtime()*1000000);
		for($i=0; $i < $nbChar; $i++) 
		{
			$randString .= $chars[rand()%strlen($chars)];
		}

		return $randString;
	}

	public static function isLogged()
	{
		if(isset($_SESSION["SID_ID"]) AND !empty($_SESSION["SID_ID"]))
		{		
			$newStaticBdd = new BDD();
			$UserInfo = $newStaticBdd->select("token", "users", "WHERE id LIKE '".self::getId()."'");
			$getUserInfo = $newStaticBdd->fetch_array($UserInfo);

			if(self::getToken() == $getUserInfo['token'])
			{
				return true;
			}
			else
			{
				return false;
				self::logOut();
			}
		}
		else
		{
			return false;
		}
	}

	public static function logOut()
	{
		$_COOKIE = array();
		$_SESSION = array();
	}

	public static function getToken()
	{
		if(isset($_COOKIE['token']) AND !empty($_COOKIE['token']))
		{
			return $_COOKIE["token"];
		}
		else
		{
			return "null";
		}
	}

	public static function regUser($username, $password, $email)
	{	
		$newStaticBdd = new BDD();

		if(!empty($_SERVER['HTTP_CLIENT_IP']))
		{
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		$username = preg_replace('#[^A-Za-z0-9]+#', '_', $username);
		$username = trim($username, '_');

		$Email = $newStaticBdd->select("id", "users", "WHERE email LIKE '".$email."'");
		$getEmail = $newStaticBdd->num_rows($Email);

		if($getEmail != 1)
		{	
			$User = $newStaticBdd->select("id", "users", "WHERE username LIKE '".$username."'");
			$getUser = $newStaticBdd->num_rows($User);

			if($getUser != 1)
			{	
				$salt = self::randomSalt(10);

				$passwordHash = hash('sha256', $password).$salt;

				$regUser = $newStaticBdd->insert("users", "username, password, salt, email, ip", "'".$username."', '".$passwordHash."', '".$salt."', '".$email."', '".$ip."'");

				$UserId = $newStaticBdd->select("id", "users", "WHERE password LIKE '".$passwordHash."'");
				$getUserId = $newStaticBdd->fetch_array($UserId);

				mkdir("users/".$getUserId['id']."/avatar", 0700, true);
				mkdir("users/".$getUserId['id']."/banner", 0700, true);

				self::logUser($username, $password);
				Engine::sendConfirmationMail($username, $email);

				$dataArray['result'] = true;
				$dataArray['error'] = null;
			}
			else
			{
				$dataArray['result'] = false;
				$dataArray['error'] = "Le nom d'utilisateur est déjà utilisé ...";
			}
		}
		else
		{
			$dataArray['result'] = false;
			$dataArray['error'] = "L'e-mail est déjà enregisté ...";
		}

		return $dataArray;
	}

	public static function logUser($username, $password)
	{
		$newStaticBdd = new BDD();

		$UserInfo = $newStaticBdd->select("id, activated, password, salt", "users", "WHERE username LIKE '".$username."' OR email LIKE '".$username."'");
		$isReg = $newStaticBdd->num_rows($UserInfo);

		if($isReg == 1)
		{
			$getUserInfo = $newStaticBdd->fetch_array($UserInfo);

			$salt = $getUserInfo['salt'];

			$password = $newStaticBdd->real_escape_string(htmlspecialchars($password));
			$passwordHash = hash('sha256', $password).$salt;

			if($passwordHash == $getUserInfo["password"])
			{
				if($getUserInfo['activated'] == 1)
				{
					$id = $getUserInfo['id'];

					$_SESSION['SID_ID'] = session_id();
					self::setToken($id);

					$dataArray["result"] = true;
					$dataArray['error'] = null;
				}
				else
				{
					$dataArray['result'] = false;
					$dataArray['error'] = "Désolé mais vous devez d'abord valider votre compte, pour cela rendez-vous sur votre boîte mail.<br/>Dépechez-vous, on vous attend !";
				}
			}
			else
			{
				$dataArray['result'] = false;
				$dataArray['error'] = "Le mot de passe n'est pas correct ...";
			}
		}
		else
		{
			$dataArray['result'] = false;
			$dataArray['error'] = "Le nom d'utilisateur n'est pas enregistré ...";
		}

		return $dataArray;
	}

	public static function setToken($userId)
	{
		$newStaticBdd = new BDD();
		$newStaticBdd->real_escape_string(htmlspecialchars($userId));

		$token = md5(uniqid(mt_rand(), true));

		unset($_COOKIE['token']);

		setcookie("token", $token);

		$newStaticBdd->update("users", "token = '".$token."', time = '".time()."'", "WHERE id = '".$userId."'");

		return true;
	}
}

?>