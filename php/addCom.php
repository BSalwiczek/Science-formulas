<?php
session_start();
if(isset($_POST['commentCon']))
{
	if(isset($_POST['contID']))
	{
		$contentID = $_POST['contID'];
	}else
	{
		header("Location: ../science-formulas");
	}

	require_once("../db_connect.php");
	require_once("../setLang.php");

		
	$connect = new mysqli($host,$db_user,$db_password,$db_name);
	$connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	$connect->query("SET CHARSET utf8");
	
	if($connect->connect_errno != 0)
	{
		echo "Error".$connect->connect_errno;
	}else
	{
		if(isset($_SESSION['login']))
			$login = $_SESSION['login'];
		else
			header("Location: ../science-formulas");
		$comCont = $_POST['commentCon'];
		$comCont = htmlentities($comCont);
		$comCont = str_replace("&lt;br/&gt;","<br/>", $comCont);
		date_default_timezone_set('Europe/Warsaw'); // UTC
		$current_date = date('Y-m-d H:i:s');
		$sql="INSERT INTO `formulas`.`comments` (`comm_id`, `who`, `content`, `whereFormId`, `date`) 
		VALUES (NULL, '$login', '$comCont', '$contentID', '$current_date');";
		
		if($result = $connect->query($sql))
		{
			$sql="SELECT * FROM comments WHERE whereFormId='$contentID' ORDER BY date DESC ";
			
			if($result = @$connect->query($sql))
			{
				$numOfCom = $result->num_rows;


				for($i = 0;$i<$numOfCom;$i++)
				{
					$row=$result->fetch_assoc();
					$name = $row['who'];
					$content = $row['content'];
					$date = strtotime($row['date']);
					$now = time();
					$comID = $row['comm_id'];

					$diff = $now - $date;
					if($diff < 5)
						$dateToDisplay = returnLangText("Przed chwilą","A moment ago");
					else if($diff < 60)
						$dateToDisplay = $diff.returnLangText(" sekund temu"," seconds ago");
					else if($diff < 3600)
					{
						if(round($diff/60) == '1')
							$dateToDisplay = returnLangText("Minutę temu","One minute ago");
						else if(round($diff/60) < '5')
							$dateToDisplay = round($diff/60).returnLangText(" minuty temu"," minutes ago");
						else
							$dateToDisplay = round($diff/60).returnLangText(" minut temu"," minutes ago");
					}
					else if($diff < 86400){
						if(round($diff/3600) == '1')
							$dateToDisplay = returnLangText("Godzinę temu","One hour ago");
						else if(round($diff/3600) < '5')
							$dateToDisplay = round($diff/3600).returnLangText(" godziny temu"," hours ago");
						else
							$dateToDisplay = round($diff/3600).returnLangText(" godzin temu"," hours ago");
					}else if($diff < 604800)
					{
						if(round($diff/86400) == '1')
							$dateToDisplay = returnLangText("Wczoraj","Yesterday");
						else
							$dateToDisplay = round($diff/86400).returnLangText(" dni temu"," days ago");

					}else if($diff < 2419200)
					{
						if(round($diff/604800) == '1')
							$dateToDisplay = returnLangText("Tydzień temu","One week ago");
						else
							$dateToDisplay = round($diff/604800).returnLangText(" tygodnie temu"," weeks ago");
					}else if($diff < 29030400)
					{
						if(round($diff/2419200) == '1')
							$dateToDisplay = returnLangText("Miesiąc temu","One month ago");
						else if(round($diff/2419200) < '5')
							$dateToDisplay = round($diff/2419200).returnLangText(" misiące temu"," months ago");
						else
							$dateToDisplay = round($diff/2419200).returnLangText(" miesięcy temu"," months ago");
					}else
					{
						if(round($diff/29030400) == '1')
							$dateToDisplay = returnLangText("Rok temu","One year ago");
						else if(round($diff/29030400) < '5')
							$dateToDisplay = round($diff/29030400).returnLangText(" lata temu"," years ago");
						else
							$dateToDisplay = round($diff/29030400).returnLangText(" lat temu"," years ago");
					}


					echo"
						<div class='comment' id='com";echo $comID;echo"' >
							<div class='who'>
								<span class='name'>";
								if($name==="Admin")
									echo "<strong style='color: #C0B550'>$name</strong>";
								else
									echo"$name";

					echo"</span> 
								<time class='addComTime'>$dateToDisplay</time>
								<div style='clear:both'></div>
							</div>
							<div class='comContent'>$content</div>";
							if(isset($_SESSION['login']))
							{
								echo "<div class='comOptions'>
										<div class='optionAnswer' id='ans";echo $comID;echo"'><img src='img/answer.png' class='optionsButton'/></div>";
								if($name===$_SESSION['login'])
								{
									echo"
										<div class='optionEdit' id='edit";echo $comID;echo"'><img src='img/edit.png' class='optionsButton'/></div>
										<div class='optionDelete' id='dele";echo $comID;echo"'><img src='img/delete.png' class='optionsButton' /></div>";
								}
								echo "</div>";
							}
							
					echo"</div>
					";
					// echo '<script>
					// $(window).ready(function(){

					// 	$("#dele';echo $comID; echo'").click(function(){
					// 		var h = String(parseInt($(this.parentNode.parentNode).css("height"))+30) + "px";
					// 		var w = String(parseInt($(this.parentNode.parentNode).css("width"))+30) + "px";
					// 		var toGoUp = "-" + String(parseInt($(this.parentNode.parentNode).css("height")) - parseInt($(".comOptions").css("height"))+ 34) + "px";
					// 		$(this.parentNode.parentNode).append("<div id=\'deleteBox\' style=\'width: "+w+";height: "+h+";background-color: rgba(255,75,75,0.70); z-index: 5; margin-left: -16px;margin-top: "+toGoUp+";position: absolute; border: 1px solid rgba(255,75,75,0.70);text-align:center; border-radius: 5px\'><div style=\'margin-top: 15px; z-index: 5; color: black; margin-bottom: 5px\'>'; setLangText("Na pewno chcesz usunąć ten komentarz?", "Are you sure to delete this comment?"); echo'</div><div id=\'deleteYes';echo $comID; echo'\' class=\'deleteIt deleteOption\'>'; setLangText("Tak", "Yes"); echo'</div><div id=\'deleteNo';echo $comID; echo'\' class=\'dontDelete deleteOption\'>'; setLangText("Nie", "No"); echo'</div></div>");
					// 	})

					// 	$(document).on(\'click\', "#deleteYes';echo $comID; echo'", function (e) {
					// 	    $.post("php/deleteCom.php",{comID :'.$comID.' },function(data){
					// 	    	//alert('.$comID.');
					// 			$("#com';echo $comID; echo'").fadeOut(500);
					// 			$("#comNum").html(data);
					// 		})
							
					// 	});
					// 	$(document).on(\'click\', "#deleteNo';echo $comID; echo'", function (e) {
					// 	    $("#com';echo $comID;echo' > #deleteBox").remove();
					// 	});
						
					// })
					// </script>';
					/*echo "<script src='js/commOptions.js'>
						$(window).ready(function(){leadComm(";echo $i;echo",'en')})
					</script>";*/
					echo "<script src='js/commOptions.js'></script>";
				echo "<script>$(window).ready(function(){leadComm(";echo $comID;echo",'";setLangText('pl','en'); echo"')})</script>";
				}

			}
			
		}else
		{
			echo 'Database error';
		}
		
		$connect->close();
	};
}else
	header('Location: index.php');
?>
