<?php
	require_once("../setLang.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
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

// if(isset($_GET['cont']))
// 	$contentID = $_GET['cont'];
// else if(isset($_SESSION['cont']))
// {
// 	$contentID = $_SESSION['cont'];
// }else
// {
// 	header('Location: ../science-formulas');
// }
//
// $contentID = substr($contentID, 1);
// require("../db_connect.php");
//
// $connect = @new mysqli($host,$db_user,$db_password,$db_name);
// $connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
// $connect->query("SET CHARSET utf8");
// $lighted = 0;
// if($connect->connect_errno != 0)
// {
// 	echo "Error".$connect->connect_errno;
// }else
// {
//
// 	$sql="SELECT * FROM allformulas WHERE formula_id = $contentID";
//
// 	if($result = @$connect->query($sql))
// 	{
// 		$numberOfFormulas = $result->num_rows;
// 		if($numberOfFormulas > 0)
// 		{
// 			$row=$result->fetch_assoc();
// 			$pos = $row['position'];
// 			if(strpos($pos, 'Math') !== false)
// 				$lighted = 1;
// 			else if(strpos($pos, 'Physics') !== false)
// 				$lighted = 2;
// 			else if(strpos($pos, 'Chemistry') !== false)
// 				$lighted = 3;
//
// 		}
// 	}else
// 		echo 'db error';
//
// 	$connect->close();
// }

	require_once("navigation.php");
	createNav('../',$lighted);
?>
	<div class="fluid-container">
	  <a href="/"><div class="imgwrapper"><img class="img-responsive" id="logoImg" src="img/logo.png"></div></a>
	</div>
	<div id="content" class="content2">

	<?php

		require_once("createContent.php");
		createContent("../");
	?>

	</div>
	<div id="comments" class="fluid-container">
	<?php
		require_once("createComments.php");
		createComments("../");
	?>
	</div>
	<?php
		include("footer.php");
	?>

</body>
</html>
