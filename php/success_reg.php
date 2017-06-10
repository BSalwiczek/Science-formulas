<?php
session_start();
require_once('../setLang.php');
	if(!isset($_SESSION['success_reg']))
	{
		if(isset($_SESSION['siteAfterLogin']))
			header("Location: ".$_SESSION['siteAfterLogin']);
		else
			header("Location: index.php");
	}
unset($_SESSION['success_reg']);
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText('Sukces !','Success !')?></title>
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
	<div id="loginConteiner" style="width: 500px;margin-top: 150px;text-align:center">
		<span style = "font-size: 25px;margin:0"><?php setLangText('Dziękujemy za rejestrację !','Thank you for registration !')?></span><br/>
		<span style="color: #53bf6b;margin:0"><a href="<?php 
								if(isset($_SESSION['siteAfterLogin']))
									echo $_SESSION['siteAfterLogin'];
								else
									echo '../science-formulas';
								?>"><?php setLangText('Powrót','Go back')?></a></span>
	</div>
</body>
</html>