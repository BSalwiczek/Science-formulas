<?php
	require_once("../../../setLang.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText('Algebra','Algebra');?></title>
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
	  <li class="active"><?php setLangText('Algebra','Algebra')?></li>
	</ul>

	<div class="row">
		<div class="categoryHeaderD col-sm-12" ><h4 class="categoryHeader"><?php setLangText('Prawa działań','Laws of operations') ?></h4></div>
	</div>
	<div class="row">
		<a href="<?php setLangText('matematyka-algebra-podstawy','math-algebra-basics') ?>"><div class="col-sm-4 col-xs-12" >
			<div class="SCI1 subCategoryItem"><?php setLangText('Podstawy','Basics');?> </div>
		</div></a>

		<a href="<?php setLangText('matematyka-algebra-potegi','math-algebra-exponentiation') ?>"><div class="col-sm-4 col-xs-12" >
			<div class="SCI1 subCategoryItem"><?php setLangText('Potęgi','<span style="font-size: 0.85em">Exponentiation');?></div>
		</div></a>

		<a href="<?php setLangText('matematyka-algebra-pierwiastki','math-algebra-roots') ?>"><div class="col-sm-4 col-xs-12" >
			<div class="SCI1 subCategoryItem"><?php setLangText('Pierwiastki','Roots');?></div>
		</div></a>

		<a href="<?php setLangText('matematyka-algebra-wzory-skroconego-mnozenia','math-algebra-short-multiplication-formulas') ?>"><div class="col-sm-4 col-xs-12" >
			<div style="font-size: 0.78em"><div class="SCI1 subCategoryItem" style="padding-top:20px"><?php setLangText('<div style="margin-top: 25px">Wzory skróconego mnożenia</div>','Short multiplication formulas');?></div></div>
		</div></a>

		<a href="<?php setLangText('matematyka-algebra-logarytmy','math-algebra-logarithm') ?>"><div class="col-sm-4 col-xs-12" >
			<div class="SCI1 subCategoryItem"><?php setLangText('Logarytmy','Logarithm');?>
		</div></div></a>

		<a href="<?php setLangText('matematyka-algebra-wartosc-bezwzgledna','math-algebra-absolute-value') ?>"><div class="col-sm-4 col-xs-12" >
			<div class="SCI1 subCategoryItem" style="padding-top: 50px"><span style="font-size:0.9em"><?php setLangText('<div style="margin-top: -10px">Wartość bezwzględna</div>','Absolute value');?></span></div>
		</div></a>

		<a href="<?php setLangText('matematyka-algebra-rozwiazania-rownan-algebraicznych','math-algebra-algebraic-equations-solutions') ?>"><div class="col-sm-4 col-xs-12" >
			<div style="font-size: 0.8em"><div class="SCI1 subCategoryItem" style="padding-top: 20px"><?php setLangText('Rozwiązania równań algebraicznych','Algebraic equations solutions');?></div></div>
		</div></a>
	</div>
	
	


	
	<div style="clear:both"></div>
	</div>
	</div>
	<?php
		include("../../footer.php");
	?>
	
</body>
</html>
