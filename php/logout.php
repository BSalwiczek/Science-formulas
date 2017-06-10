<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(isset($_SESSION['login']))
		unset($_SESSION['login']);

header('Location: '.$_SESSION['siteAfterLogin']);
?>