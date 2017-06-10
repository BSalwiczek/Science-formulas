<?php
	require_once("../../../setLang.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText('Geometria','Geometry');?></title>
	<meta name ="description" content = "Find every science formula !"/>
	<meta name ="keywords" content = "math, science, formula"/>
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge, chrome=1"/>
	<meta name="author" content="BS"/>
	<link rel="shortcut icon" href="img/iconBar.ico" />
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="js/stickyNav.js" ></script>

</head>
<body>
	<?php
		require_once('../../navigation.php');
		createNav('../../../',1);
	?>
	<div class="fluid-container">
	  <a href="/"><div class="imgwrapper"><img class="img-responsive" id="logoImg" src="img/logo.png"></div></a>
	</div>


	<div class="fluid-container">
	<div id="content">

	<ul class="breadcrumb">
	  <li><a href="/"> <span class="glyphicon glyphicon-home"></span></a></li>
	  <li><a  href="<?php setLangText('matematyka','math')?>" ><?php setLangText('Matematyka','Math')?></a></li>
	  <li class="active"><?php setLangText('Geometria','Geometry')?></li>
	</ul>

	<div class="row">
		<div class="categoryHeaderD col-sm-12" ><h4 class="categoryHeader"><?php setLangText('Podstawy','Basic') ?></h4></div>
	</div>

	<div class="row">
		<a href="<?php setLangText('matematyka-geometria-pole-powierzchni','math-geometry-area')?>"><div class="col-sm-4 col-xs-12" ><div class="SCI1 subCategoryItem" >
			<?php setLangText('<span style="position: relative;top: -27px">Pole powierzchni</span>','Area');?>
		</div></div></a>
		
		<a href="<?php setLangText('matematyka-geometria-obwod','math-geometry-perimeter')?>"><div class="col-sm-4 col-xs-12" ><div class="SCI1 subCategoryItem">
			<?php setLangText('Obwód','Perimeter');?>
		</div></div></a>
	</div>

	<div class="row">
		<div class="categoryHeaderD col-sm-12" ><h4 class="categoryHeader"><?php setLangText('Trygonometria','Trygonometry') ?></h4></div>
	</div>
	<div class="row">
		<a href="<?php setLangText('matematyka-geometria-trygonometria','math-geometry-trygonometry')?>"><div class="col-sm-4 col-xs-12" ><div class="SCI2 subCategoryItem">
			<?php setLangText('Funkcje','Functions');?>
		</div></div></a>
		
		<a href="<?php setLangText('matematyka-geometria-redukcja-funkcji-trygonometrycznych','math-geometry-reduction-of-trygonometry-functions')?>"><div class="col-sm-4 col-xs-12" ><div class="SCI2 subCategoryItem">
			<?php setLangText('Redukcja','Reduction');?>
		</div></div></a>
	</div>
	<div style="clear:both"></div>
	</div>
	</div>
	<?php
		include("../../footer.php");
	?>
	
</body>
</html>
