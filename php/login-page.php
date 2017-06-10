<?php
	session_start();
	
	if(isset($_SESSION['login']))
	{
		header('Location: index.php');
	}

	require_once("../setLang.php");

	if(isset($_POST['login']))
	{
		$valided = true;
		if(empty($_POST['login']))
		{
			$valided = false;
			switch($_COOKIE['Language'])
			{
				case 'pl':
					$_SESSION['e_login'] = 'Podaj login';
					break;
				default:
					$_SESSION['e_login'] = 'Enter login';
			}
		}else if(empty($_POST['password']))
		{
			$valided = false;
			switch($_COOKIE['Language'])
			{
				case 'pl':
					$_SESSION['e_password'] = 'Podaj hasło';
					break;
				default:
					$_SESSION['e_password'] = 'Enter password';
			}
			
		}else
		{
			try
			{
				require_once('../db_connect.php');
				$connect = new mysqli($host,$db_user,$db_password,$db_name);
				if($connect->connect_errno != 0)
				{
					throw new Exception(mysqli_connect_errno());
				}else
				{
					$login = $_POST['login'];
					$password = $_POST['password'];

					$login = htmlentities($login, ENT_QUOTES, "UTF-8");

					if ($result = $connect->query(
						sprintf("SELECT * FROM users WHERE login='%s'",
						mysqli_real_escape_string($connect,$login))))
					{
						
						$NumOfUsers = $result->num_rows;
						if($NumOfUsers > 0)
						{
							$line = $result->fetch_assoc();
							if(password_verify($password,$line['password']))
							{
								$_SESSION['login'] = $line['login'];
								if(isset($_SESSION['siteAfterLogin']))
									header('Location: '.$_SESSION['siteAfterLogin']);
								else
									header('Location: index.php');
							}
							else
							{
								switch($_COOKIE['Language'])
								{
									case 'pl':
										$_SESSION['e_password'] = 'Nieprawidłowy login lub hasło';
										break;
									default:
										$_SESSION['e_password'] = 'incorrect login or password';
								}
							}
						}else
						{
							switch($_COOKIE['Language'])
							{
								case 'pl':
									$_SESSION['e_password'] = 'Nieprawidłowy login lub hasło';
									break;
								default:
									$_SESSION['e_password'] = 'incorrect login or password';
							}
						}

					}else
						throw new Exception($connect->error);

				

					$connect->close();
				}
			}catch (Exception $e)
			{
				setLangText('<span style="color:red;">Błąd serwera !</span>','<span style="color:red;">Serwer error !</span>');
			}


		}

		if(!empty($_POST['login']))
			$_SESSION['fr_login'] = $_POST['login'];
		if(!empty($_POST['password']))
			$_SESSION['fr_password'] = $_POST['password'];
	}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText('Logowanie','Login');?></title>
	<meta name ="description" content = "Find every science formula !"/>
	<meta name ="keywords" content = "math, science, formula"/>
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge, chrome=1"/>
	<meta name="author" content="BS"/>
	
	<link rel="shortcut icon" href="img/iconBar.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link rel="stylesheet" href="css/login-page.css" type="text/css"/>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="loginConteiner">
		<h3><?php setLangText('<span style="font-size: 60px;">Logowanie</span>','Sign in');?></h3>
		<form action="login-page.php" method="post">
			<input type="text" name="login" placeholder="login" value=<?php 
			if(isset($_SESSION['fr_login']))
			{
				echo $_SESSION['fr_login'];
				unset($_SESSION['fr_login']);
			} ?> >
			<?php
				if(isset($_SESSION['e_login']))
				{
					echo '<div class="error">'.$_SESSION['e_login'].'</div>';
					unset($_SESSION['e_login']);
				}
			?>
			<input type="password" name="password" placeholder=<?php echo setLangText('hasło','password');?> value=<?php 
			if(isset($_SESSION['fr_password']))
			{
				echo $_SESSION['fr_password'];
				unset($_SESSION['fr_password']);
			} ?> >
			<?php
				if(isset($_SESSION['e_password']))
				{
					echo '<div class="error">'.$_SESSION['e_password'].'</div>';
					unset($_SESSION['e_password']);
				}
			?>
			<input type="submit" value=<?php setLangText('Zaloguj','Login');?> />
		</form>
		<?php setLangText('<span>Nie masz jeszcze konta? &nbsp;<a href="register">Zarejestruj się !</a></span>
					<span style="color: #53bf6b;margin-left: 100px"><a href="/">Wróć na stronę główną</a></span>',
			'<span>Don\'t have account? &nbsp;<a href="register">Click to register now !</a></span>
					<span style="color: #53bf6b;margin-left: 100px"><a href="/">Go back to home page</a></span>');?>	
	</div>
</body>
</html>
