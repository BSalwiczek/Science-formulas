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

	$newCont = $_POST['newContent'];

	require_once("../db_connect.php");
	require_once("../setLang.php");

	$newCont = str_replace("&lt;br/&gt;","<br/>", $newCont);
	
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

		$sql="UPDATE comments SET content = '$newCont' WHERE comm_id = '$contID'";
	
		if(!($result = @$connect->query($sql)))
		{
			echo 'Database error';
		}
	
	
		$connect->close();
	}
}else
	header('Location: ../../science-formulas');
?>