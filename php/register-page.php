<?php
	session_start();

	if(isset($_SESSION['login']))
	{
		header('Location: index.php');
	}

	if(!isset($_COOKIE['Language']))
	{
		require_once("../setLang.php");
	}

	$lang = $_COOKIE['Language'];

	$valided = true;

	if(isset($_POST['email']))
	{
		if(isset($_POST['login'])&&!empty($_POST['login']))
		{
			$login = $_POST['login'];

			if(strlen($login)<4 || strlen($login)>10)
			{
				switch($lang)
				{
					default:
						$_SESSION['e_login'] = 'Your login must have between 4 and 10 characters';
						break;
					case 'pl':
						$_SESSION['e_login'] = 'Twój login musi zawierać od 4 do 10 znaków';
						break;
				}
				$valided = false;
			}
			if(ctype_alnum($login)==false)
			{
				switch($lang)
				{
					default:
						$_SESSION['e_login'] = 'Your login can contain only letters and numbers';
						break;
					case 'pl':
						$_SESSION['e_login'] = 'Twój login może zawierać tylko litery i cyfry';
						break;
				}
				$valided = false;
			}
		}else
		{
			switch($lang)
			{
				default:
					$_SESSION['e_login'] = 'Enter login';
					break;
				case 'pl':
					$_SESSION['e_login'] = 'Podaj login';
					break;
			}
			$valided = false;
		}

		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$valided=false;
			switch($lang)
			{
				default:
					$_SESSION['e_email'] = 'Enter correct e-mail';
					break;
				case 'pl':
					$_SESSION['e_email'] = 'Podaj poprawny adres e-mail';
					break;
			}
		}

		if(!empty($_POST['password1']))
		{
			$pass1 = $_POST['password1'];
			$pass2 = $_POST['password2'];

			if(strlen($pass1)<6 || strlen($pass1)>20)
			{
				$valided=false;
				switch($lang)
				{
					default:
						$_SESSION['e_pass1'] = 'Password must have between 6 and 20 characters';
						break;
					case 'pl':
						$_SESSION['e_pass1'] = 'Hasło musi posiadać od 6 do 20 znaków';
						break;
				}
			}
			if($pass1 != $pass2)
			{
				$valided=false;
				switch($lang)
				{
					default:
						$_SESSION['e_pass2'] = 'Passwords are not the same';
						break;
					case 'pl':
						$_SESSION['e_pass2'] = 'Hasła nie są takie same';
						break;
				}
			}

			$pass_hash = password_hash($pass1,PASSWORD_DEFAULT);
		}else
		{
			$valided = false;
				switch($lang)
				{
					default:
						$_SESSION['e_pass1'] = 'Enter password';
						break;
					case 'pl':
						$_SESSION['e_pass1'] = 'Podaj hasło';
						break;
				}
		}

		$_SESSION['fr_login'] = $_POST['login'];
		$_SESSION['fr_email'] = $_POST['email'];

		require_once("../db_connect.php");
		mysqli_report(MYSQLI_REPORT_STRICT);

		try
		{
			$connect = @new mysqli($host, $db_user, $db_password, $db_name);
			if($connect->connect_errno != 0)
			{
				throw new Exception(mysqli_connect_errno());
			}else
			{
				//check for email (if is in use)
				$result = $connect->query("SELECT id FROM users WHERE email='$email'");
				
				if (!$result) throw new Exception($connect->error);

				$how_many = $result->num_rows;
				if($how_many>0)
				{
					$valided = false;
					switch($lang)
					{
						default:
							$_SESSION['e_email'] = 'This e-mail is already in use';
							break;
						case 'pl':
							$_SESSION['e_email'] = 'Ten e-mail jest już w użyciu';
							break;
					}
				}

				$login = $_POST['login'];

				//check for login (if is in use)
				$result = $connect->query("SELECT id FROM users WHERE login='$login'");
				
				if (!$result) throw new Exception($connect->error);

				$how_many = $result->num_rows;
				if($how_many>0)
				{
					$valided = false;
					switch($lang)
					{
						default:
							$_SESSION['e_login'] = 'This login is already in use';
							break;
						case 'pl':
							$_SESSION['e_login'] = 'Ten login jest już w użyciu';
							break;
					}
				}

				if($valided == true)
				{
					if ($connect->query("INSERT INTO users VALUES (NULL, '$login', '$pass_hash', '$email','')"))
					{
						$_SESSION['login'] = $login;
						$_SESSION['success_reg'] = true;
						header("Location: registration-success");
					}
					else
					{
						throw new Exception($connect->error);
					}
				}


				$connect->close();
			}
		}catch(Exception $e)
		{
			switch($lang)
			{
				default:
					echo '<span style="color:red;">Serwer error !</span>';
					break;
				case 'pl':
					echo '<span style="color:red;">Błąd serwera !</span>';
					break;
			}
		}
	}


?>



<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php
			switch($_COOKIE['Language'])
			{
				default:
					echo 'Register';
					break;
				case 'pl':
					echo 'Rejestracja';
					break;
			}?></title>
	<meta name ="description" content = "Find every science formula !"/>
	<meta name ="keywords" content = "math, science, formula"/>
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge, chrome=1"/>
	<meta name="author" content="Bartosz Salwiczek"/>
	<link rel="shortcut icon" href="img/iconBar.ico" />
	
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link rel="stylesheet" href="css/login-page.css" type="text/css"/>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

	<style>
		input[type=submit]:hover
		{
			border: 2px solid #118acf;
			background-color: #118acf;
			color: #fff;
			cursor: pointer;
			transition: all 0.5s 0s;
		}
		input[type=submit]
		{
			transition: background-color 0.5s 0s;
		}

	</style>
</head>
<body>
	<div id="loginConteiner">
		<h3 style="color: #118acf"><?php
			switch($_COOKIE['Language'])
			{
				default:
					echo 'Register';
					break;
				case 'pl':
					echo 'Rejestracja';
					break;
			}?></h3>
		<form method="post">
			<input type="text" name="login" placeholder="login" value="<?php
				if(isset($_SESSION['fr_login'])&&!empty($_SESSION['fr_login']))
				{
					echo $_SESSION['fr_login'];
					unset($_SESSION['fr_login']);
				}
			?>"/>
			<?php
				if(isset($_SESSION['e_login']))
				{
					echo '<div class="error">'.$_SESSION['e_login'].'</div>';
					unset($_SESSION['e_login']);
				}
			?>
			<input type="text" name="email" placeholder="e-mail" value="<?php
				if(isset($_SESSION['fr_email'])&&!empty($_SESSION['fr_email']))
				{
					echo $_SESSION['fr_email'];
					unset($_SESSION['fr_email']);
				}
			?>" />
			<?php
				if(isset($_SESSION['e_email']))
				{
					echo '<div class="error">'.$_SESSION['e_email'].'</div>';
					unset($_SESSION['e_email']);
				}
			?>
			<input type="password" name="password1" placeholder=<?php
			switch($_COOKIE['Language'])
			{
				default:
					echo 'password';
					break;
				case 'pl':
					echo 'hasło';
					break;
			}?> />
			<?php
				if(isset($_SESSION['e_pass1']))
				{
					echo '<div class="error">'.$_SESSION['e_pass1'].'</div>';
					unset($_SESSION['e_pass1']);
				}
			?>
			<input type="password" name="password2" placeholder=<?php
			switch($_COOKIE['Language'])
			{
				default:
					echo 'repeat&nbsp;password';
					break;
				case 'pl':
					echo 'powtórz&nbsp;hasło';
					break;
			}?> />
			<?php
				if(isset($_SESSION['e_pass2']))
				{
					echo '<div class="error">'.$_SESSION['e_pass2'].'</div>';
					unset($_SESSION['e_pass2']);
				}
			?>
			<input type="submit" value="Register"/>
		</form>
		
		<?php
			switch($_COOKIE['Language'])
			{
				default:
					echo '<span style="margin-left: 56px">Do you have account? &nbsp;<a href="login">Click to log in !</a></span>
					<span style="color: #53bf6b;margin-left: 100px"><a href="/">Go back to home page</a></span>';
					break;
				case 'pl':
					echo '<span style="margin-left: 86px">Masz już konto? &nbsp;<a href="login">Zaloguj się !</a></span>
					<span style="color: #53bf6b;margin-left: 100px"><a href="/">Wróć na stronę główną</a></span>';
					break;
			}
		?>
	</div>
</body>
</html>
