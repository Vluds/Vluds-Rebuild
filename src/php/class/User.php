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
			return true;
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

	public static function getId()
	{
		if(self::isLogged())
		{
			$newStaticBdd = new BDD();
			$IdToken = $newStaticBdd->select("id", "users", "WHERE token LIKE '".self::getToken()."'");
			$getIdToken = $newStaticBdd->fetch_array($IdToken);

			return $getIdToken['id'];
		}
	}

	public static function getAvatar()
	{
		if(self::isLogged())
		{
			$newStaticBdd = new BDD();
			$IdToken = $newStaticBdd->select("avatar", "users", "WHERE token LIKE '".self::getToken()."'");
			$getIdToken = $newStaticBdd->fetch_array($IdToken);

			return $getIdToken['avatar'];
		}
	}

	public static function getUsername()
	{
		if(self::isLogged())
		{
			$newStaticBdd = new BDD();
			$UsernameToken = $newStaticBdd->select("username", "users", "WHERE token LIKE '".self::getToken()."'");
			$getUsernameToken = $newStaticBdd->fetch_array($UsernameToken);

			return $getUsernameToken['username'];
		}
	}

	public static function getFullName()
	{
		if(self::isLogged())
		{
			$newStaticBdd = new BDD();
			$FullName = $newStaticBdd->select("fullname", "users", "WHERE token LIKE '".self::getToken()."'");
			$getFullName = $newStaticBdd->fetch_array($FullName);

			return $getFullName['fullname'];
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

				$activationKey = self::randomSalt(25);

				$regUser = $newStaticBdd->insert("users", "username, password, salt, email, ip, activationKey", "'".$username."', '".$passwordHash."', '".$salt."', '".$email."', '".$ip."', '".$activationKey."'");

				$UserId = $newStaticBdd->select("id", "users", "WHERE password LIKE '".$passwordHash."'");
				$getUserId = $newStaticBdd->fetch_array($UserId);

				mkdir("users/".$getUserId['id']."/avatar", 0700, true);
				mkdir("users/".$getUserId['id']."/banner", 0700, true);

				self::logUser($username, $password);
				Engine::sendConfirmationMail($username, $email, $activationKey);

				$dataArray['result'] = true;
				$dataArray['error'] = null;
				$dataArray['reply'] = "Bravo, vous êtes enfin inscrit !<br/>Courez vite vérifier vos mails afin de valider votre compte !";
			}
			else
			{
				$dataArray['result'] = false;
				$dataArray['error'] = "Le nom d'utilisateur est déjà utilisé ...";
				$dataArray['reply'] = null;
			}
		}
		else
		{
			$dataArray['result'] = false;
			$dataArray['error'] = "L'e-mail est déjà enregisté ...";
			$dataArray['reply'] = null;
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
					$dataArray['reply'] = "Yeah, tu es connecté !";
				}
				else
				{
					$dataArray['result'] = false;
					$dataArray['error'] = "Désolé mais vous devez d'abord valider votre compte, pour cela rendez-vous sur votre boîte mail.<br/>Dépechez-vous, on vous attend !";
					$dataArray['reply'] = null;
				}
			}
			else
			{
				$dataArray['result'] = false;
				$dataArray['error'] = "Le mot de passe n'est pas correct ...";
				$dataArray['reply'] = null;
			}
		}
		else
		{
			$dataArray['result'] = false;
			$dataArray['error'] = "Le nom d'utilisateur n'est pas enregistré ...";
			$dataArray['reply'] = null;
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

	public static function checkActivationKey($username, $activationKey)
	{
		$newStaticBdd = new BDD();

		$UserInfo = $newStaticBdd->select("id, username, activated, activationKey", "users", "WHERE username LIKE '".$username."'");
		$isReg = $newStaticBdd->num_rows($UserInfo);

		if($isReg == 1)
		{
			$getUserInfo = $newStaticBdd->fetch_array($UserInfo);

			if($activationKey == $getUserInfo["activationKey"])
			{
				if($getUserInfo['activated'] == 0)
				{
					$newStaticBdd->update("users", "activated = '1'", "WHERE username = '".$username."' AND activationKey = '".$activationKey."'");

					$dataArray["result"] = true;
					$dataArray['error'] = null;
					$dataArray['reply'] = "Super, ton compte à été validé !<br/>Connecte-toi vite !";
				}
				else
				{
					$dataArray['result'] = false;
					$dataArray['error'] = "Hum, le compte semble déjà être validé ...<br/>Plus besoin de cliquer sur ce lien !";
					$dataArray['reply'] = null;
				}
			}
			else
			{
				$dataArray['result'] = false;
				$dataArray['error'] = "Ah ... désolé mais la clée d'activation est éronnée !";
				$dataArray['reply'] = null;
			}
		}
		else
		{
			$dataArray['result'] = false;
			$dataArray['error'] = "Le nom d'utilisateur utilisé pour la vérification du compte n'existe pas ...";
			$dataArray['reply'] = null;
		}

		return $dataArray;
	}
}

?>