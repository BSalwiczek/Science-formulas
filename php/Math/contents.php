<?php
	require_once("../../setLang.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText('Matematyka','Math') ?></title>
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
		require_once('../navigation.php');
		createNav('../../',1);
	?>

	<div class="fluid-container">
	  <a href="/"><div class="imgwrapper"><img class="img-responsive" id="logoImg" src="img/logo.png"></div></a>
	</div>


<div class="fluid-container">
	<div id="content">
		<ul class="breadcrumb">
		  <li><a href="/"> <span class="glyphicon glyphicon-home"></span></a></li>
		  <li class="active"><?php setLangText('Matematyka','Math')?></li> 
		</ul>
	
		<span style="font-size: 0.7em"><?php
		setLangText('Tutaj możesz znaleźć wzór kierując się dziedzinami matematyki:',
			'Here you can find Your formula through the popular math branches: ');
		?></span>
		<a href ="<?php setLangText('matematyka-algebra','math-algebra')?>"><div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img class="img-responsive categoryImg" src="img/algebra.jpg" style ="float:left;"></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660">Algebra</strong> <?php setLangText('zajmuje się symbolami matematycznymi i sposobami ich manipulacji.','is the study of mathematical symbols and the rules for manipulating these symbols.') ?>
			</p></div>
			</div>
			<div style="clear:both;"></div>
		</div></a>
		<a href ="<?php setLangText('matematyka-geometria','math-geometry')?>"><div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img src="img/geometry.jpg" style ="float:left;" class="img-responsive categoryImg" ></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Geometria ','Geometry ') ?></strong><?php setLangText('jest dziedziną matematyki skoncentrowanej na kształtach, wielkościach, pozycjach figur oraz ich własnościach.','is a branch of mathematics concerned with questions of shape, size, relative position of figures, and the properties of space.')?> 
			</p></div>
			</div>
		</div></a>
		<a href ="<?php setLangText('matematyka-logika','math-logic')?>"><div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img src="img/logic.jpg" class="img-responsive categoryImg" style ="float:left;"></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Logika ','Logic ') ?></strong><?php setLangText('zajmuje się sposobami rozumowania i określa zasady,<br/> kiedy dany argument jest prawdziwy.','is a branch of mathematics which determine methods <br />of reasoning, provides rules to find out whether an argument is valid.') ?> 
			</p></div>
			</div>
		</div></a>
		<div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img class="img-responsive categoryImg" src="img/probability.jpg" style ="float:left;"></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Prawdopodobieństwo ','Probability ') ?></strong><?php setLangText('określa prawdopodobieństwo wystąpienia <br />danego zdarzenia.','is the measure of the likelihood that an event will occur.') ?> 
			</p></div>
			</div>
			<div style="clear:both;"></div>
		</div>		
		<div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img class="img-responsive categoryImg" src="img/linear_algebra.png" style ="float:left;"></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Algebra liniowa ','Linear algebra ') ?></strong><?php setLangText('zajmuje się badaniem linii i kształtów w przestrzeni.<br/> Do jej dziedzin należą także przestrzenie wektorowe.','includes the study of lines, planes, and subspaces, <br />but is also concerned with properties common to all vector spaces.')?>
			</p></div>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>

	<?php
		include("../footer.php");
	?>
	
</body>
</html>
