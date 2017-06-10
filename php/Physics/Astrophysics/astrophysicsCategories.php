<?php
	require_once("../../../setLang.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText('Astrofizyka','Astrophysics');?></title>
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
		createNav('../../../',2);
	?>
	<div class="fluid-container">
	  <a href="/"><div class="imgwrapper"><img class="img-responsive" id="logoImg" src="img/logo.png"></div></a>
	</div>
	<div class="fluid-container">
	<div id="content">

	<ul class="breadcrumb">
	  <li><a href="/"> <span class="glyphicon glyphicon-home"></span></a></li>
	  <li><a  href="<?php setLangText('fizyka','physics') ?>" ><?php setLangText('Fizyka','Physics')?></a></li>
	  <li class="active"><?php setLangText('Astrofizyka','Astrophysics')?></li>
	</ul>

<div class="row">
	<a href="<?php setLangText('fizyka-astrofizyka-czarne-dziury','physics-astrophysics-black-holes') ?>"><div class="col-sm-4 col-xs-12" ><div class="SCI1 subCategoryItem" >
		<?php setLangText('<span style="font-size: 0.9em" >Czarne dziury</span>','Black holes');?>
	</div></div></a>
	
	<a href="<?php setLangText('fizyka-astrofizyka-gwiazdy','physics-astrophysics-stars') ?>"><div class="col-sm-4 col-xs-12" ><div class="SCI2 subCategoryItem">
		<?php setLangText('Gwiazdy','Stars');?>
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
