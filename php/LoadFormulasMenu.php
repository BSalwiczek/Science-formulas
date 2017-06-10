<?php
if(isset($_POST['sort']) && isset($_POST['lang']) && isset($_POST['position']) && isset($_POST['retToDB']))
{
	if(isset($_POST['updateLim'])){
		createFormulas($_POST['sort'],$_POST['lang'],$_POST['position'],$_POST['retToDB'],true,$_POST['updateLim']);
	}
	else
		createFormulas($_POST['sort'],$_POST['lang'],$_POST['position'],$_POST['retToDB']);
}

function createFormulas($sort,$lang,$position,$retToDB,$mode=false,$updateLim=false)
{ 
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

	if(isset($_SESSION['lim']))
		$lim = $_SESSION['lim'];
	else
		$lim = 100;

	require_once($retToDB.'db_connect.php');

	$host = "sql313.epizy.com";
	$db_user = "epiz_20212192";
	$db_password = "MyE9zkpG";
	$db_name = "epiz_20212192_formulas";
	
	$connect = new mysqli($host,$db_user,$db_password,$db_name);
	$connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	$connect->query("SET CHARSET utf8");
	
	if($connect->connect_errno != 0)
	{
		echo "Error".$connect->connect_errno;
	}else
	{
		if($sort === "votes")
			$sql="SELECT * FROM allformulas WHERE position='$position' ORDER BY $sort DESC";
		else
			$sql="SELECT * FROM allformulas WHERE position='$position' ORDER BY $sort ASC";

		if(isset($_POST['mode']) || $mode===true)
		{
			if($sort === "votes")
				$sql=$position."ORDER BY ".$sort." DESC";
			else
				$sql=$position."ORDER BY ".$sort." ASC";
		}

		if($result = @$connect->query($sql))
		{
			$start = 1;
			$numberOfFormulas = $result->num_rows;
			if($updateLim==true)
			{
				$start = $lim;
				if($numberOfFormulas-$lim >= 10)
					$lim += 10;
				 else if($numberOfFormulas-$lim > 0)
				 	$lim += $numberOfFormulas-$lim;

				 if($lim > $numberOfFormulas)
				 	$lim = $numberOfFormulas;

				$sql .= " LIMIT ".$start.','.$lim;

				if(!($result = @$connect->query($sql)))
					echo "ERROR";
			}
			if($lim > $numberOfFormulas)
				$lim = $numberOfFormulas;

			if(!isset($_SESSION['lim']))
				$lim = $numberOfFormulas;

			$_SESSION['lim'] = $lim;

			for($i = $start;$i<$lim+1;$i++)
			{
				$row=$result->fetch_assoc();
				$tit = $row['title'.$lang];
				$lin = $row['TeX'];
				$toPost = $row['formula_id'];
				
				$url = str_replace(" ", "-", $tit);
				$url = str_replace("(", "-", $url);
				$url = str_replace(")", "", $url);
				$url = str_replace("'", "-", $url);

				include_once("transformToASCII.php");
				$url=_transliterate_to_ascii($url);

				$url = strtolower($url);
				
				if(substr($lin, 0,3)==='(S)')
						$lin = substr($lin, 3);

				$whPost = "formula_".$toPost."_".$url;

				echo '<script type="text/javascript" async
					  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
					</script>';
				echo '<script type="text/x-mathjax-config"> MathJax.Hub.Config({ showProcessingMessages: false, messageStyle: "none"}); </script>';
				
				echo '<script>$(".formulaInMenu").css("visibility","hidden");
				$(".formulaInMenu").load(\'@Url.Action("ActionResultMethod", "ControllerName",{controller parameters})\', function () {
				  MathJax.Hub.Queue(
				    ["Typeset",MathJax.Hub,".formulaInMenu"],
				    function () {
				      $(".formulaInMenu").css("visibility","visible");
				    }
				  );
				});</script>';	

				echo "<a href='$whPost'>";
				echo	"<div class='inTableOfContents col-sm-12'>";
				echo		"<h2 class='ContentMenuTitle'>$tit</h2>";
				echo		"<span class='formulaInMenu' id='formula'>\[$lin\]";
				echo 		"</span><div style='clear:both'></div>";
				echo	"</div>";
				echo "</a>";
				
			}
			
			
			
		}
	}
}
?>
