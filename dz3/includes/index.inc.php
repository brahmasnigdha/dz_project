<?php

	//start session
	session_start();

	if(isset($_POST['Login']))
	{
		include 'dbh.inc.php';

		$username = mysqli_escape_string($conn, $_POST['username']);
		$password = mysqli_escape_string($conn, $_POST['password']);
		
		$sql_select_username = "SELECT userName FROM login_table WHERE userName = '$username'";
		$result_check1 = mysqli_query($conn, $sql_select_username);
		$result1 = mysqli_num_rows($result_check1);

		if($result1 < 1)
		{
			header("Location: ../index.php?login=wrong_username");
			exit();
		}
		else
		{
			$sql_select_password = "SELECT userPassword FROM login_table WHERE userPassword = '$password'";
			$result_check2 = mysqli_query($conn, $sql_select_password);
			$result2 = mysqli_num_rows($result_check2);
			if($result2 < 1)
			{
				header("Location: ../index.php?login=wrong_password");
				exit();
			}
			else
			{
				header("Location: ../home.php?success");
				exit();
			}
			
		}
		
	}
	else
	{
		header("Location: ../index.php?error");
		exit();
	}