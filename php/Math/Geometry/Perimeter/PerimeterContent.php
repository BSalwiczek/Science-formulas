<?php
session_start();
	if(isset($_GET['userSearch'])&&!empty($_GET['userSearch']))
	{
		$_SESSION['userSearch'] = $_GET['userSearch'];
		
	}
	require_once("../../../../setLang.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<meta name ="description" content = "Find every science formula !"/>
	<meta name ="keywords" content = "math, science, formula"/>
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge, chrome=1"/>
	<meta name="author" content="BS"/>
	<link rel="shortcut icon" href="../../../../img/iconBar.ico" />

	
	<link rel="stylesheet" href="../../../../css/style.css" type="text/css"/>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src ="../../../../js/footerPos.js"></script>
	<script type="text/javascript" src="http://latex.codecogs.com/editor3.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="../../../../js/stickyNav.js" ></script>
</head>
<body>
<?php
	require_once("../../../navigation.php");
	createNav('../../../../',1);
?>
	<div id="logo"><a href="../../../../index.php"><div id="toMainPage"></div></a></div>
	<div id="content" class="content2">

	<?php

		require_once("../../../createContent.php");
		createContent("../../../../");
	?>
		
	</div>

	<div id="comments">
	<?php
		require_once("../../../createComments.php");
		createComments("../../../../");
	?>
	</div>

	<?php
		include("../../../footer.php");
	?>
	
</body>
</html>