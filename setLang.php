
<?php
	$url = $_SERVER['REQUEST_URI'];
	if(!isset($_COOKIE['Language']))
	{
		setcookie('Language',substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2),time() + (86400*30),"/");
		header('Location: '.$url);
	}
	
	if (isset($_GET['en'])) 
	{
		setcookie('Language','en',time() + (86400*30),"/");
		$url = preg_replace('/\?en=true/', ' ', $url);
		header('Location: '.$url);
	}else if(isset($_GET['pl']))
	{
		setcookie('Language','pl',time() + (86400*30),"/");
		$url = preg_replace('/\?pl=true/', ' ', $url);
		header('Location: '.$url);
	}

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

	if(isset($_SESSION['lim']))
		unset($_SESSION['lim']);

	function setLangText($plText,$enText)
	{
		switch($_COOKIE['Language'])
		{
			case 'pl':
				echo $plText;
				break;
			default:
				echo $enText;
				break;
		}
	}
	function returnLangText($plText,$enText)
	{
		switch($_COOKIE['Language'])
		{
			case 'pl':
				return $plText;
				break;
			default:
				return $enText;
				break;
		}
	}

?>
