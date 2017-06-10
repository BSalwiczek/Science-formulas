<?php
	if(isset($_POST['valueToSearch'])&&!empty($_POST['valueToSearch']))
	{
		require_once('db_connect.php');
		session_start();
		
		$searchThis = $_POST['valueToSearch'];
		
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
		
		$sql="";

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
		


		$title1 = 'title'.$lang;

		$sql="SELECT * FROM allformulas WHERE $title1 LIKE '%$searchThis%' LIMIT 5";
	
		
		if($result = $connect->query($sql))
		{	
			$numberOfFormulas = $result->num_rows;
			if($numberOfFormulas > 0)
			{
				for($i = 1;$i<$numberOfFormulas+1;$i++)
				{
					$row=$result->fetch_assoc();
					$tit = $row['title'.$lang];
					$toPost = $row['formula_id'];

					echo $tit.',';				
				}
			}
				
		}else
			exit();
		
		$connect->close();
	}
?>