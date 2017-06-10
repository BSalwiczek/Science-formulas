<?php
	require_once("../../setLang.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText('Fizyka','Physics') ?></title>
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
		createNav('../../',2);
	?>
	<div class="fluid-container">
	  <a href="/"><div class="imgwrapper"><img class="img-responsive" id="logoImg" src="img/logo.png"></div></a>
	</div>

<div class="fluid-container">
	<div id="content">

	<ul class="breadcrumb">
	  <li><a href="/"> <span class="glyphicon glyphicon-home"></span></a></li>
	  <li class="active"><?php setLangText('Fizyka','Physics')?></li> 
	</ul>

		<span style="font-size: 0.7em"><?php
		setLangText('Tutaj możesz znaleźć wzór kierując się dziedzinami fizyki:',
			'Here you can find Your formula through the popular physics branches: ');
		?></span>

		<div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img src="img/classicalMechanics.jpg" style ="float:left;" class="img-responsive categoryImg"></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Mechanika klasyczna','Classical mechanics')?></strong>
			<?php 
				setLangText('zajmuje się najbardziej elementarnym <br/> opisem świata. Oparta jest m.in na prawach ruchu <br/> sformułowanych przez Isaaca Newtona.','is the most elementary branch of physics.
			<br/> It is based on kinematics laws discovered by Isaac Newton.');
			?></p></div>
			</div>
			<div style="clear:both;"></div>
		</div>
		<div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img src="img/thermodynamics.jpg" style ="float:left;" class="img-responsive categoryImg"></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Termodynamika','Thermodynamics')?></strong>
			<?php 
				setLangText('jest działem fizyki zajmującym się ciepłem, <br/> temperaturą i ich związkiem z energią i pracą.',' is the branch of science concerned with <br/>heat and temperature and their relation to energy and work.');
			?></p></div>
			</div>
			<div style="clear:both;"></div>
		</div>
		<div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img src="img/electrodynamics.jpg" style ="float:left;" class="img-responsive categoryImg" ></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Elektrostatyka','Electrostatics')?></strong>
			<?php 
				setLangText('skupia się wokół oddziaływań ładunków <br/> elektrycznych.','centre on phenomena and properties of<br/> electric charges');
			?></p></div>
			</div>
			<div style="clear:both;"></div>
		</div>
		<div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img src="img/magnetism.jpg" style ="float:left;" class="img-responsive categoryImg" ></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Magnetyzm','Magnetism')?></strong>
			<?php 
				setLangText('','');
			?></p></div>
			</div>
			<div style="clear:both;"></div>
		</div>
		<div class="categoryItem" style="background-color:#E9E9E9">
			<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img src="img/quantumMechanics.jpg" style ="float:left;" class="img-responsive categoryImg" ></div>
			<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Mechanika kwantowa','Quantum Mechanics')?></strong>
			<?php 
				setLangText('opisuje przede wszystkim świat mikroskopijny,<br/> dla którego nie sprawdza się mechanika klasyczna,'
					,'describe microscopic world,<br/> where classical mechanics don\' work.');
			?></p></div>
			</div>
			<div style="clear:both;"></div>
		</div>
		<a href="<?php setLangText('fizyka-astrofizyka','physics-astrophysics') ?>">
			<div class="categoryItem" style="background-color:#E9E9E9">
				<div class="row">
			<div class="col-xs-12 col-sm-4" style="text-align:center"><img src="img/astronomy.jpg" style ="float:left;" class="img-responsive categoryImg" ></div>
				<div class="col-xs-12 col-sm-8" style="text-align:center"><p class = "categoryItemDescription"><strong style="color: #707660"><?php setLangText('Astrofizyka','Astrophysics')?></strong>
				<?php 
					setLangText('opisuje prawa rządzące Wszechświatem.'
						,'describe laws ruling the Universe.');
				?></p></div>
			</div>
				<div style="clear:both;"></div>
			</div>
		</a>
	</div>
	<?php
		include("../footer.php");
	?>
	
</body>
</html>
