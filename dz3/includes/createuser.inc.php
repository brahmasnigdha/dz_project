<?php
   
    include 'dbh.inc.php';

	//start session
	session_start();

	if(isset($_POST['add']))
	{
		

		$userName = mysqli_escape_string($conn, $_POST['create_user_name']);
		$newPassword = mysqli_escape_string($conn, $_POST['create_user_new_password']);
		$re_typePassword = mysqli_escape_string($conn, $_POST['create_user_confirm_password']);
		$role_Id = mysqli_escape_string($conn, $_POST['create_user_role_name']);

		if(!($newPassword === $re_typePassword))
		{
			header("Location: ../createuser.php?password=do_not_match");
			exit();
		}
		else
		{
			$sql_select = "SELECT userName FROM login_table WHERE userName = '$userName'";

			$result_test = mysqli_query($conn, $sql_select);
			$result_test_check = mysqli_num_rows($result_test);

			if($result_test_check > 1)
			{
				header("Location: ../createuser.php?user=exist");
				exit();
			}
			else
			{
				if($result_test_check < 1)
				{
					$sql_insert = "INSERT INTO login_table (userName, userPassword, roleId) VALUES ('$userName', '$newPassword', '$role_Id')";
					mysqli_query($conn, $sql_insert);
					header("Location: ../createuser.php?new_user=success");
					exit();
				}
				else{
					header("Location: ../createuser.php?new_user=exists");
					exit();
				}
				
			}
		}
	}

	elseif(isset($_POST['create_user_search']))
	{
       $search = mysqli_escape_string($conn, $_POST['search_create_user']);

       if(empty($search))
       {
       	 header("Location: ../createuser.php?search=empty");
       	 exit();
       }
       else
       {
       	 $sql_select = "SELECT * FROM login_table WHERE userName='$search'";
       	 $result = mysqli_query($conn, $sql_select);
       	 $result_check = mysqli_num_rows($result);

       	 if($result_check < 0)
       	 {
       	 	 header("Location: ../createuser.php?search=user_not_found");
       	     exit();
       	 }
       	 else
       	 {
       	 	$_SESSION['search_info'] = $search;
       	 	header("Location: ../createuser.php?search=found");
       	 	exit();
       	 }

       }
	}
	elseif(isset($_POST['update']))
	{
		//old username
		$oldUserName = mysqli_escape_string($conn, $_POST['create_user_name_id']);
		//new username
		$newUserName = mysqli_escape_string($conn, $_POST['create_user_name']);
		//current password
		$currentPassword = mysqli_escape_string($conn, $_POST['create_user_current_password']);
		//new password
		$newPassword = mysqli_escape_string($conn, $_POST['create_user_new_password']);
		//re-typed password
		$re_typePassword = mysqli_escape_string($conn, $_POST['create_user_confirm_password']);
		//new role name
		$role_Id = mysqli_escape_string($conn, $_POST['create_user_role_name']);

		$updated_username="";
		$updated_password="";
		$update_role_Id="";

		if($oldUserName === $newUserName)
		{
			$updated_username = $oldUserName;
		}
		else
		{
			$updated_username = $newUserName;		
		}
		if(empty($currentPassword))
		{
			header("Location: ../createuser.php?currentPassword=empty");
            exit();
		}
		else
		{
			if($currentPassword !== $newPassword)
			{
				
                $updated_password=$newPassword;
			}
			else
			{
				$updated_password=$currentPassword;
			}
		}

		if($re_typePassword !== $newPassword)
		{
			header("Location: ../createuser.php>confirm_password_not_equal_newPassword");
			exit();
		}
		else
		{
			$sql_role_old = "SELECT roleId FROM login_table WHERE userName = '$oldUserName'";
			$result_old_role = mysqli_query($conn, $sql_role_old);
			$result_old_role_check = mysqli_num_rows($result_old_role);

			while($row = mysqli_fetch_assoc($result_old_role))
			{
				if($role_Id === $row['roleId'])
				{
					$update_role_Id = $role_Id;
					$update_sql = "UPDATE login_table SET userName = '$updated_username', userPassword = '$updated_password', roleId = '$update_role_Id' WHERE userName = '$oldUserName'";
					mysqli_query($conn, $update_sql);
					header("Location: ../createuser.php?update_succesful");
					exit();					
				}
				else
				{
					$update_role_Id = $role_Id;
					$update_sql = "UPDATE login_table SET userName = '$updated_username', userPassword = '$updated_password', roleId = '$update_role_Id' WHERE userName = '$oldUserName'";
					mysqli_query($conn, $update_sql);
					header("Location: ../createuser.php?update_successful");
					exit();
				}
			}
		}
		
	}

    if(isset($_POST['delete_button']))
    {
	   $oldUserName = mysqli_escape_string($conn, $_POST['create_user_name_id']);   

	   $current_password = mysqli_escape_string($conn, $_POST['create_user_current_password']);

	   if(empty($current_password))
	   {
           header("Location: ../createuser.php?current_password=empty");
           exit();
       }	
       else
       {
	      $sql_delete = "DELETE FROM login_table WHERE userName = '$oldUserName'";
	      mysqli_query($conn, $sql_delete);
	      
	      header("Location: ../createuser.php?user=deleted");
	      exit();
       }

    }
