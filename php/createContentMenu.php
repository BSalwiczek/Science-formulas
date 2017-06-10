<?php

function createContentMenu($retToDB,$position,$wherePost)
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

	//require_once($retToDB.'db_connect.php');

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
		$titlelang = 'title'.$lang;
		
		$sql="SELECT * FROM allformulas WHERE position='$position' ORDER BY sequent ASC";
		
		if($result = @$connect->query($sql))
		{
			$numberOfFormulas = $result->num_rows;
			if($numberOfFormulas > 0)
			{
			echo '<span style="float:left;margin-left: 15px;margin-top: 1px;margin-right: 15px;font-size: 0.55em;">';setLangText('Sortowanie:','Sorting:');echo '</span>
			<div class="row">
				<div class="sortButton col-xs-2 col-sm-1" id="sortNorm">';setLangText("Domyślnie","Default");echo'</div>
				<div class="sortButton col-xs-2 col-sm-1" id="sortAlph">A-Z</div>
				<div class="sortButton col-xs-2 col-sm-1" id="sortVotes">';setLangText("Głosy","Votes");echo'</div>
			</div>
				<div style="clear:both"></div>

			';
			echo "<div id='allFormulas' class='row'>";

			require_once("LoadFormulasMenu.php");
			createFormulas("sequent",$lang,$position,$retToDB);
			echo "<script>
			$('#allFormulas').css({opacity: 0, visibility: 'visible'}).animate({opacity: 1}, 'slow');
			var whichSort = 1;
				$(document).on('click', '#sortNorm',function(e){
					if(whichSort != 1)
					{
						$.post('php/LoadFormulasMenu.php',{
							sort: 'sequent',
							lang: '".$lang."',
							position: '".$position."',
							retToDB: '../'
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
							position: '".$position."',
							retToDB: '../'
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
							position: '".$position."',
							retToDB: '../'
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
				
			</script>";
			}
			echo "</div>";
			
		}else
		{
			exit();
		}
		
		
		$connect->close();
	}
}
	
?>
