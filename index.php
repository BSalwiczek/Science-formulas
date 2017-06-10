<?php
	session_start();
	
	require_once("setLang.php");
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8"/>
	<title><?php setLangText("Science-formulas — znajdź wszystkie wzory w jednym mejscu!","Science-formulas — find every formulas in one place!")?></title>
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
	<script type="text/javascript">
		
		$(document).ready(function(){
			var screenHeight = screen.height;
			var h1 = document.getElementById("nav").clientHeight;
			var h2 = document.getElementById("logo").clientHeight;
			var h3 = document.getElementById("footer").clientHeight;
			var h4 = document.getElementById("content").clientHeight;
			
			var result = String(screenHeight - h1 -h3- h2 - h4 - 30 - 70);

			document.getElementById("empty").style.height = result+"px";
		})
	</script>

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<script type="text/javascript" src="js/footerPos.js"></script>
	<script type="text/javascript">
		
$(document).ready(function()
{
	$('#searchField').keyup(function()
	{
		var valueToSearch = $(this).val();
		
		$.post("search.php",
		{
			valueToSearch: $('#searchField').val()
		},
		function(data)
		{
			var temp = data;
			var count = (temp.match(/,/g) || []).length;
			
			var tableWithTags = new Array(count);
			for(var i = 0;i<count;i++)
			{
				tableWithTags[i] = "";
			}
			
			for(var i = 0;i<count;i++)
			{
				var copyOfX;
				
				for(var x = 0;x<temp.length;x++)
				{
					copyOfX = x;
					if(temp.charAt(x) == ',')
					{
						break;
					}else
					{
						tableWithTags[i] += temp.charAt(x);
					}

				}
				
				temp = temp.slice(copyOfX+1,temp.length);
			}
			
			$( "#searchField" ).autocomplete({
				source: tableWithTags
			});
		});
	});
	$(window).on('resize',function(){
		$("ul#ui-id-1").css("display","none");
	})
});
	
	</script>
	
</head>
<body>

<?php 
	require_once("php/navigation.php");
	createNav("",0);
?>
	<div class="fluid-container">
	  <a href="/"><div class="imgwrapper"><img class="img-responsive" id="logoImg" src="img/logo.png"></div></a>
	</div>
<div class="fluid-container">
	<div id="content" style="padding-bottom: 30px">
	<div style="max-width: 700px; margin: 0 auto;">
	<div class="row" style="margin-top: 20px">
		<div class="col-sm-5">
			<span id="searchForText"><?php
			switch($_COOKIE['Language'])
			{
				case 'pl':
					echo 'Wyszukaj wzór: &nbsp; ';
					break;
				default:
					echo 'Search for formula: ';
					break;
			}
			?></span>
		</div>	
		<div class="col-sm-7">
			<form class="searchForm"  action="search-result" method="GET">
				<input type = "text" style="margin-top: 10px" class="form-control input-normal" id="searchField" name="userSearch" >
				<input type="submit" value="" id="searchButton">
			</form>
		</div>
	</div>
	</div>
		<div style="clear:both"></div>

		<div id="numberOfFormulas">
			<div class="col-sm-10" style="margin-left: auto !important;margin-right: auto !important">
			<?php 

			require_once("db_connect.php");
			$connect = @new mysqli($host,$db_user,$db_password,$db_name);
			$connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
			$connect->query("SET CHARSET utf8");

			$numOfFormulas=0;
			
			if($connect->connect_errno != 0)
			{
				echo "Error".$connect->connect_errno;
			}else
			{	
				$sql = "SELECT * FROM allformulas";
				if($result = $connect->query($sql))
				{
					
					$numOfFormulas = $result->num_rows;
				}
				$connect->close();
			}

			setLangText('Możesz znaleźć u nas już '.$numOfFormulas.' wzorów !','You can find here '.$numOfFormulas.' formulas already!')?>
			</div>
		</div>
		
	</div>
</div>
	<?php
		include("php/footer.php");
		
		if(isset($_SESSION['userSearch']))
			unset($_SESSION['userSearch']);

	?>
	
</body>
</html>
