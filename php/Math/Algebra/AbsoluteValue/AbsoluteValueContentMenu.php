<?php
	require_once("../../../../setLang.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText('Wartość bezwzględna','Absolute value') ?></title>
	<meta name ="description" content = "Find every science formula !"/>
	<meta name ="keywords" content = "math, science, formula"/>
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge, chrome=1"/>
	<meta name="author" content="BS"/>
	
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="img/iconBar.ico" />


	<script type="text/javascript" src ="js/footerPos.js"></script>
	<script type="text/javascript" src="http://latex.codecogs.com/editor3.js"></script>
	<script type="text/javascript" src="js/stickyNav.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/stickyNav.js" ></script>
</head>
<body>
<?php
	require_once("../../../navigation.php");
	createNav('../../../../',1);
?>
	<div id="logo"><a href="../science-formulas"><div id="toMainPage"></div></a></div>
	<div id="content" class="content2">
		<div id="tree">
			<a href="../science-formulas"><img src="img/home_icon.png"/></a> > <a href="<?php setLangText('matematyka','math') ?>"><?php setLangText('Matematyka','Math') ?></a> > <a href="<?php setLangText('matematyka-algebra','math-algebra') ?>"><?php setLangText('Algebra','Algebra') ?></a> > <a href=""><?php setLangText('Wartość bezwzględna','Absolute value') ?></a>
		</div>
<?php		
	require_once("../../../createContentMenu.php");
	createContentMenu('../../../../','Math/Algebra/AbsoluteValue','AbsoluteValue');
?>		
		
		
		<div style="clear:both"></div>
	</div>
	<?php
		include("../../../footer.php");
	?>
	
</body>
</html>
