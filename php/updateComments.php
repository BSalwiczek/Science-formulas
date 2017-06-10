<?php

	if(isset($_SESSION['cont']))
	{
		$contentID = $_SESSION['cont'];
	}else
	{
		header("Location: ../science-formulas");
	}
	$host = "sql313.epizy.com";
	$db_user = "epiz_20212192";
	$db_password = "MyE9zkpG";
	$db_name = "epiz_20212192_formulas";

	require_once("../db_connect.php");
		
	$connect = new mysqli($host,$db_user,$db_password,$db_name);
	$connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	$connect->query("SET CHARSET utf8");
	
	if($connect->connect_errno != 0)
	{
		echo "Error".$connect->connect_errno;
	}else 
	{

		$sql="SELECT * FROM comments WHERE whereFormId='$contentID' ORDER BY date DESC ";
		
		if($result = @$connect->query($sql))
		{
			$numOfCom = $result->num_rows;

			echo '<div style="clear:both"></div>';
			echo '<span style="font-size: 0.6em;">';
			setLangText("Komentarze: <span id='comNum'>".$numOfCom."</span>", "Comments: <span id='comNum'>".$numOfCom."</span>");
			echo '</span>';
			
		echo "<div id='allComments' class='row'>";
			echo "
			<script>
			$(document).on('focus', 'textarea',function(){
					 jQuery.each(jQuery('textarea[data-autoresize]'), function() {
				    var offset = this.offsetHeight - this.clientHeight;
				 
				    var resizeTextarea = function(el) {
				        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
				    };
				    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
				});
			});
			</script>";


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
					<div class='comment col-xs-12' id='com";echo $comID;echo"' >
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

				echo "<script src='js/commOptions.js'></script>";
				echo "<script>$(window).ready(function(){leadComm(";echo $comID;echo",'";setLangText('pl','en'); echo"')})</script>";
			}

		echo "</div>";
			
		}else
		{
			echo 'Database error';
		}
		
		
		$connect->close();
	}

?>
