<?php
function createContent($retToDB)
{

	if(isset($_GET['cont']))
		$contentID = $_GET['cont'];
	else if(isset($_SESSION['cont']))
	{
		$contentID = $_SESSION['cont'];
	}else
	{
		header('Location: ../science-formulas');
	}

	$contentID = substr($contentID, 1);

	$_SESSION['cont'] = $contentID;

	switch($_COOKIE['Language'])
	{
		case 'pl':
			$lang = 'PL';
			break;
		default:
			$lang = 'EN';
			break;
	}


	require($retToDB.'db_connect.php');

	$connect = @new mysqli($host,$db_user,$db_password,$db_name);
	$connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	$connect->query("SET CHARSET utf8");

	if($connect->connect_errno != 0)
	{
		echo "Error".$connect->connect_errno;
	}else
	{

		$sql="SELECT * FROM allformulas WHERE formula_id = $contentID";

		if($result = @$connect->query($sql))
		{
			$numberOfFormulas = $result->num_rows;
			if($numberOfFormulas > 0)
			{
				$row=$result->fetch_assoc();
				$tit = $row['title'.$lang];
				$lin = $row['TeX'];
				$img = $row['imageName'];
				$symbols = $row['symbols'.$lang];
				$description = $row['description'.$lang];
				$votes = $row['votes'];

				$lin = str_replace("dpi{120}","dpi{150}",$lin);

				$linktoimg = 'img/'.$img;
				echo '<script type="text/javascript" async
							  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
							</script>';
				echo "<title>$tit</title>";
				echo "<h1 class='formulaTitle'>$tit</h1>";
				echo "<div style='clear:both'></div>";
				echo "<div id='voteconteiner'>";
				echo "<div id='voteUP' class='voteButton'><img src='img/voteUP.png' /></div>";
				if($votes > 0)
					echo "<div id='numOfVotes' style='color: #7bcd6d'>$votes</div>";
				else if($votes < 0)
					echo "<div id='numOfVotes' style='color: #f86a68'>$votes</div>";
				else
					echo "<div id='numOfVotes' >$votes</div>";
				echo "<div id='voteDOWN' class='voteButton'><img src='img/voteDOWN.png' /></div>";
				echo "</div>";
				echo "<div style='clear:both'></div>";
				if($img!=='none' && substr($img,0,1)!=='.')
					echo "<img src= $linktoimg class=\"img-responsive\" style='margin-left: auto;margin-right: auto'/>";
				else if(substr($img,0,1)=='.')
					echo substr($img,1);
				else
					echo '<div style="height: 1em"></div>';
				if(strlen($lin) >= 100 || substr($lin, 0,3)==='(S)')
				{
					if(substr($lin, 0,3)==='(S)')
						$lin = substr($lin, 3);
					echo "<span class='smallLin' clear:both;margin-top: 20px' />\[$lin\]</span>";
				}
				else
					echo "<span class='normLin' clear:both;margin-top: 20px' />\[$lin\]</span>";

				echo '<script>$(".formulaInMenu").css("visibility","hidden");
						$(".formulaInMenu").load(\'@Url.Action("ActionResultMethod", "ControllerName",{controller parameters})\', function () {
						  MathJax.Hub.Queue(
						    ["Typeset",MathJax.Hub,".formulaInMenu"],
						    function () {
						      $(".formulaInMenu").css("visibility","");
						    }
						  );
						});</script>
						<script type="text/x-mathjax-config"> MathJax.Hub.Config({ showProcessingMessages: false, messageStyle: "none"}); </script>';

				echo "<div style='clear:both'></div>";

				echo '
					<script>
						$(document).ready(function(){
							var id = '.$contentID.';
							$("#voteUP").click(function(){
								$.post("php/vote.php",{button: "up", id: id },function(data){
									var data2 = data;
									if(data.indexOf("C") != -1)
									{
										$("#voteconteiner").css("background-color","#efefef");
										data2 = data.substring(1, data.lenght);
									}

									if(data2 == "Login")
										window.location.href = "login";
									else
									{
										$("#voteconteiner").css("background-color","rgba(157,239,143,0.3)");
										if(parseInt(data2) > 0)
											$("#numOfVotes").html("<span style='.'\''.'color: #7bcd6d'.'\''.'>"+data2+"</span>");
										else if(parseInt(data2) < 0)
											$("#numOfVotes").html("<span style='.'\''.'color: #f86a68'.'\''.'>"+data2+"</span>");
										else
										{
											$("#numOfVotes").html("<span style='.'\''.'color: #000'.'\''.'>"+data2+"</span>");
											//$("#voteconteiner").css("background-color","#efefef");
										}
									}
									if(data.indexOf("C") != -1)
									{
										$("#voteconteiner").css("background-color","#efefef");
									}
								});
							})

							$("#voteDOWN").click(function(){
								$.post("php/vote.php",{button: "down", id: id },function(data){
									var data2 = data;
									if(data.indexOf("C") != -1)
									{
										$("#voteconteiner").css("background-color","#efefef");
										data2 = data.substring(1, data.lenght);
									}

									if(data2 == "Login")
										window.location.href = "login";
									else
									{
										$("#voteconteiner").css("background-color","rgba(250,140,138,0.16)");
										if(parseInt(data2) > 0)
											$("#numOfVotes").html("<span style='.'\''.'color: #7bcd6d'.'\''.'>"+data2+"</span>");
										else if(parseInt(data2) < 0)
											$("#numOfVotes").html("<span style='.'\''.'color: #f86a68'.'\''.'>"+data2+"</span>");
										else
										{
											$("#numOfVotes").html("<span style='.'\''.'color: #000'.'\''.'>"+data2+"</span>");
											//$("#voteconteiner").css("background-color","#efefef");
										}
									}
									if(data.indexOf("C") != -1)
									{
										$("#voteconteiner").css("background-color","#efefef");
									}
								});
							})
						})
					</script>
				';

					if(isset($_SESSION['login']))
					{
						$login = $_SESSION['login'];
						if($result2 = $connect->query("SELECT * FROM users WHERE login = '$login'"))
						{
							$line = $result2->fetch_assoc();

							$changedLine = $line['votedFor'];

							$checkIfVoted = strpos($line['votedFor'],'!'.$contentID.'?');
							if($checkIfVoted !== false)
							{
								$char = substr($line['votedFor'],$checkIfVoted+strlen($contentID)+2,1);
								if($char == 'U')
								{
									echo '<script>
										$("document").ready(function(){
											$("#voteconteiner").css("background-color","rgba(157,239,143,0.3)");
										})
										</script>';
								}
								else if($char == 'D')
								{
									echo '<script>
										$("document").ready(function(){
											$("#voteconteiner").css("background-color","rgba(250,140,138,0.16)");
										})
										</script>';
								}

							}else
							{
								echo '<script>
										$("document").ready(function(){
											$("#voteconteiner").css("background-color","#efefef");
										})
										</script>';
							}
						}
					}

					echo"<div class='symbols'>";
					if($lang=="PL")
						echo"	<strong style='font-size: 0.6em'>Symbole:</strong>";
					else
						echo"	<strong style='font-size: 0.6em'>Symbols:</strong>";
					echo"	<p class= 'allSymbols'>$symbols</p>";
					echo"</div>";

				if($description != "")
				{
					echo "<div class='formulaDescription'> ";
					if($lang=="PL")
						echo "	<strong style='font-size: 0.6em'>Opis:</strong>";
					else
						echo "	<strong style='font-size: 0.6em'>Description:</strong>";
					echo "	<p style='font-size:0.5em'>$description</p>";
					echo "</div>";
				}

			}else
			{
				echo "wait, wait we will do this formula soon ! (or never)";
			}

		}else
		{
			exit();
		}


		$connect->close();
	}
}

?>
