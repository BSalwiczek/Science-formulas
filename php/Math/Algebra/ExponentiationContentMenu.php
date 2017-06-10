<?php
	require_once("../../../setLang.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText('Potęgowanie','Exponentiation') ?></title>
	<meta name ="description" content = "Find every science formula !"/>
	<meta name ="keywords" content = "math, science, formula"/>
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge, chrome=1"/>
	<meta name="author" content="BS"/>

	<link rel="shortcut icon" href="img/iconBar.ico">
	
	<script type="text/javascript" src ="js/footerPos.js"></script>
	<script type="text/javascript" src="http://latex.codecogs.com/editor3.js"></script>
	<script type="text/javascript" src="js/stickyNav.js" ></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/stickyNav.js" ></script>

	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
	require_once("../../navigation.php");
	createNav('../../../',1);
?>
	<div class="fluid-container">
	  <a href="/"><div class="imgwrapper"><img class="img-responsive" id="logoImg" src="img/logo.png"></div></a>
	</div>
	<div id="content" class="content2">
	<ul class="breadcrumb" style="text-align:left">
	  <li><a href="/"> <span class="glyphicon glyphicon-home"></span></a></li>
	  <li><a  href="<?php setLangText('matematyka','math')?>" ><?php setLangText('Matematyka','Math')?></a></li>
	  <li><a href="<?php setLangText('matematyka-algebra','math-algebra') ?>"><?php setLangText('Algebra','Algebra')?></a></li>
	  <li class="active"><?php setLangText('Potęgowanie','Exponentiation') ?></li>
	</ul>
<?php		
	require_once("../../createContentMenu.php");
	createContentMenu('../../../','Math/Algebra/Exponentiation','Exponentiation');
?>		
		
		
		<div style="clear:both"></div>
	</div>
	<?php
		include("../../footer.php");
	?>
	
</body>
</html>
