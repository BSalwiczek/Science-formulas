<?php
session_start();

if(isset($_SESSION['login']))
{
	$login = $_SESSION['login'];
	$id = $_POST['id'];
	try
	{
		require_once('../db_connect.php');

		$connect = new mysqli($host,$db_user,$db_password,$db_name);
		$connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
		$connect->query("SET CHARSET utf8");

		if($connect->connect_errno != 0)
			throw new Exception(mysqli_connect_errno());
		else
		{
			if($result = $connect->query("SELECT * FROM users WHERE login = '$login'"))
			{
				$line = $result->fetch_assoc();

				$changedLine = $line['votedFor'];

				$checkIfVoted = strpos($line['votedFor'],'!'.$id.'?'); 

				if($checkIfVoted === false)
				{

					if($_POST['button'] == 'up')
						$changedLine = $line['votedFor'].'!'.$id.'?'.'U';
					else
						$changedLine = $line['votedFor'].'!'.$id.'?'.'D';
				}



				if(!($connect->query("UPDATE users SET votedFor='$changedLine' WHERE login = '$login' ")))
					throw new Exception($connect->error);


				if($result2 = $connect->query("SELECT * FROM allformulas WHERE formula_id = '$id' "))
				{
					$line2 = $result2->fetch_assoc();
					$votesChange = $line2['votes'];
					if($checkIfVoted === false || strtolower($_SESSION['login']) == 'admin')
					{
						if($_POST['button'] == 'up')
							$votesChange = $line2['votes'] += 1;
						else
							$votesChange = $line2['votes'] -= 1;
					}else
					{
						$char = substr($line['votedFor'],$checkIfVoted+strlen($id)+2,1);
						if($char == 'U')
						{
							if($_POST['button'] == 'down')
							{
								$votesChange = $line2['votes'] -= 1;
								$changedLine = str_replace('!'.$id.'?'.'U','', $changedLine );
								echo 'C';
								//$changedLine = str_replace('!'.$id.'?'.'U', '!'.$id.'?'.'D', $changedLine );
								if(!($connect->query("UPDATE users SET votedFor='$changedLine' WHERE login = '$login' ")))
									throw new Exception($connect->error);
							}
						}
						else if ($char == 'D')
						{
							if($_POST['button'] == 'up')
							{
								$votesChange = $line2['votes'] += 1;
								$changedLine = str_replace('!'.$id.'?'.'D', '', $changedLine );
								echo 'C';
								//$changedLine = str_replace('!'.$id.'?'.'D', '!'.$id.'?'.'U', $changedLine );
								if(!($connect->query("UPDATE users SET votedFor='$changedLine' WHERE login = '$login' ")))
									throw new Exception($connect->error);
							}
						}
					}
					echo $votesChange;


					if(!($connect->query("UPDATE allformulas SET votes='$votesChange' WHERE formula_id = '$id' ")))
						throw new Exception($connect->error);
				}else
					throw new Exception($connect->error);
			}else
				throw new Exception($connect->error);
		}

		$connect->close();
	}catch (Exception $e)
	{
		echo 'Serwer error !';
	}

}else
{
	echo 'Login';
}
?>
