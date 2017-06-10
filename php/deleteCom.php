 <?php
session_start();
if(isset($_POST['comID']))
{
	if(isset($_POST['comID']))
	{
		$contID = $_POST['comID'];
	}else
	{
		header("Location: ../../science-formulas");
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

		$sql="DELETE FROM `formulas`.`comments` WHERE `comments`.`comm_id` = $contID";
		
		if($result = @$connect->query($sql))
		{
			if(isset($_SESSION['cont']))
				$contentID = $_SESSION['cont'];
			else
				header("Location ../../science-formulas");
			$sql="SELECT * FROM comments WHERE whereFormId='$contentID' ORDER BY date DESC ";
		
			if($result = @$connect->query($sql))
			{
				echo $result->num_rows;
			}else
				echo 'Database error';
		}else
		{
			echo 'Database error';
		}
		
		
		$connect->close();
	}
}else
	header('Location: ../../science-formulas');
?>