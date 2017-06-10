<?php
session_start();
	if(isset($_GET['userSearch'])&&!empty($_GET['userSearch']))
	{
		$_SESSION['userSearch']= $_GET['userSearch'];
		
	}else if(!isset($_SESSION['userSearch']))
	{
		header("Location: ../science-formulas");
	}
	require_once("../setLang.php");

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php
	switch($_COOKIE['Language'])
	{
		case 'pl':
			echo 'Wyniki wyszukiwania';
			break;
		default:
			echo 'Search results';
			break;
	}
	?></title>
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

	<!-- <script type="text/javascript">
		
		$(document).ready(function(){
			var screenHeight = screen.height;
			var h1 = document.getElementById("nav").clientHeight;
			var h2 = document.getElementById("logo").clientHeight;
			var h3 = document.getElementById("footer").clientHeight;
			var h4 = document.getElementById("content").clientHeight;
			
			var result = String(screenHeight - h1 -h3- h2 - h4 - 30 - 70);

			document.getElementById("empty").style.height = result+"px";
		})
	</script> -->
	
</head>
<body>
	<?php
		require_once('navigation.php');
		createNav('../',0);
	?>
	<div class="fluid-container">
	  <a href="/"><div class="imgwrapper"><img class="img-responsive" id="logoImg" src="img/logo.png"></div></a>
	</div>
	<div id="content" class="content2">
		<?php

		$user_search = htmlentities($_SESSION['userSearch']);
		
			require_once("../db_connect.php");
			try
			{
				$connect = @new mysqli($host,$db_user,$db_password,$db_name);
				$connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
				$connect->query("SET CHARSET utf8");
				
			if($connect->connect_errno != 0)
				throw new Exception('Error while connecting to database');
			}catch(Exception $e)
			{
				echo $e->getMessage();
				die();
			}

		if(isset($_COOKIE['Language']))
		{
			switch($_COOKIE['Language'])
			{
				case 'pl':
					$lang = 'PL';
					break;
				default:
					$lang = 'EN';
					break;
			}
		}else
			$lang='EN';
			
		$sql = "SELECT * FROM allformulas WHERE titlePL LIKE \"%$user_search%\" OR titleEN LIKE \"%$user_search%\" ";
			
		if($result = $connect->query($sql))
		{	
			$_SESSION['lim'] = 20;

			$numberOfFormulas = $result->num_rows;
			

				echo '<span style="float:left;margin-left: 15px;margin-top: 1px;margin-right: 15px;font-size: 0.55em;">';setLangText('Sortowanie:','Sorting:');echo '</span>
			<div class="row">
				<div class="sortButton col-xs-2 col-sm-1" id="sortNorm">';setLangText("Domyślnie","Default");echo'</div>
				<div class="sortButton col-xs-2 col-sm-1" id="sortAlph">A-Z</div>
				<div class="sortButton col-xs-2 col-sm-1" id="sortVotes">';setLangText("Głosy","Votes");echo'</div>';

				echo "<div class='col-sm-5 col-xs-12'><div class=\"numOfSearchResult\">";
			if($numberOfFormulas > 0)
			{
				switch($_COOKIE['Language'])
				{
					case 'pl':
						echo $numberOfFormulas.' wyników wyszukiwania dla "'.$user_search.'" : ';
						$lang = 'PL';
						break;
					default:
						$lang = 'EN';
						echo $numberOfFormulas.' search results for "'.$user_search.'" : ';
						break;
				}
			echo "</span></div>";


			echo'</div></div>
				<div style="clear:both"></div>

			';





				echo "<div id='allFormulas' class='row'>";
				require_once("LoadFormulasMenu.php");
				createFormulas("sequent",$lang,$sql,"../",true);

			echo "<script>
			$('#allFormulas').css({opacity: 0, visibility: 'visible'}).animate({opacity: 1}, 'slow');
			var whichSort = 1;
				$(document).on('click', '#sortNorm',function(e){
					if(whichSort != 1)
					{
						$.post('php/LoadFormulasMenu.php',{
							sort: 'sequent',
							lang: '".$lang."',
							position: '".$sql."',
							retToDB: '../',
							mode: true
						},function(data){
							$('#allFormulas').css({opacity: 0, visibility: 'visible'}).animate({opacity: 1}, 'slow');
							$('#allFormulas').html(data);
							whichSort = 1;
							changeColor();
						});
					}
				})
				$(document).on('click', '#sortAlph',function(e){
					if(whichSort != 2)
					{
						$.post('php/LoadFormulasMenu.php',{
							sort: 'title".$lang."',
							lang: '".$lang."',
							position: '".$sql."',
							retToDB: '../',
							mode: true
						},function(data){
							$('#allFormulas').css({opacity: 0, visibility: 'visible'}).animate({opacity: 1}, 'slow');
							$('#allFormulas').html(data);
							whichSort = 2;
							changeColor();
						});
					
					}
				})
				$(document).on('click', '#sortVotes',function(e){
					if(whichSort != 3)
					{
						$.post('php/LoadFormulasMenu.php',{
							sort: 'votes',
							lang: '".$lang."',
							position: '".$sql."',
							retToDB: '../',
							mode: true
						},function(data){
							$('#allFormulas').css({opacity: 0, visibility: 'visible'}).animate({opacity: 1}, 'slow');
							$('#allFormulas').html(data);
							whichSort = 3;
							changeColor();
						});
					
					}
				})
				changeColor();
				function changeColor()
				{ 
					switch(whichSort)
					{
						case 1:
							$('#sortNorm').css('background-color','#E9E9E9');
							$('#sortAlph').css('background-color','#EEE');
							$('#sortVotes').css('background-color','#EEE');
						break;
						case 2:
							$('#sortAlph').css('background-color','#E9E9E9');
							$('#sortNorm').css('background-color','#EEE');
							$('#sortVotes').css('background-color','#EEE');
						break;
						case 3:
							$('#sortVotes').css('background-color','#E9E9E9');
							$('#sortNorm').css('background-color','#EEE');
							$('#sortAlph').css('background-color','#EEE');
						break;
					}
				}

				$(document).on('click', '#seeMore',function(e){
					var sorting = '';
					switch(whichSort)
					{
						case 1:
							sorting = 'sequent';
							break;
						case 2:
							sorting = 'title".$lang."';
							break;
						case 3:
							sorting = 'votes';
							break;
					}	
					$.ajax({
						type: 'POST',
						url: 'php/LoadFormulasMenu.php',
						data: {
							sort: sorting,
							lang: '".$lang."',
							position: '".$sql."',
							retToDB: '../',
							mode: true,
							updateLim: true
						},
						success: function(data){
							$('#allFormulas').append(data);
							console.log(data);
							var reply = data.replace(/\s+/, '');
							if($('#allFormulas>a').children().length+1 < ".$numberOfFormulas.")
								$('#allFormulas').after($('#seeMore'));
							else
								$('#seeMore').hide();

						},
						dataType: 'text'

					})
				})				
			</script>";

			echo "</div>";
			if($_SESSION['lim'] < $numberOfFormulas)
			{
				echo "<div id='seeMore'>";
				setLangText('Więcej','More');
				echo "</div>";
			}
			}else
			{
				switch($_COOKIE['Language'])
				{
					case 'pl':
						echo 'Brak wyników wyszukiwania dla "'.$user_search.'"';
						break;
					default:
						echo 'There is no results for "'.$user_search.'"';
						break;
				}
				
			}
				
		}else
			echo 'Error';
		
		$connect->close();
		?>
	</div>
	<?php
		include("footer.php");

	?>
				
</body>
</html>
	