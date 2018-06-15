<?php
include 'dbh.inc.php';
//start session()
session_start();

if(isset($_POST['add']))
{
	
	$dept_name = mysqli_escape_string($conn, $_POST['department_name']);
	$dept_location = mysqli_escape_string($conn, $_POST['department_location']);

    if(preg_match("/[^a-zA-Z ]/", $dept_name) || preg_match("/[^a-zA-Z ]/", $dept_location))
    {
    	header("Location: ../department.php?department=invalid_input");
    	exit();
    }
    else
    {
    	$sql = "SELECT * FROM department WHERE departmentName = '$dept_name' AND departmentLocation = '$dept_location'";
		$result = mysqli_query($conn, $sql);
		$result_check = mysqli_num_rows($result);

		if($result_check > 1)
		{
			header("Location: ../department.php?department=exist");
			exit();
		}
		else
		{
			if($result_check > 1)
			{
				header("Location: ../department.php?department=exist");
				exit();
			}
			else{
				
				$sql = "INSERT INTO department (departmentName, departmentLocation) VALUES ('$dept_name', '$dept_location')";
				mysqli_query($conn, $sql);
				header("Location: ../department.php?department=success");
				exit();
			}
			
		}
    }
}

elseif(isset($_POST['delete_button']))
{
   $delete_id = mysqli_escape_string($conn, $_POST['department_id']);

   if(empty($delete_id))
   {
   	  header("Location: ../department.php?delete=cannot_delete");
      exit();
   }
   else
   {   		
   	   $sql_delete = "DELETE FROM department WHERE departmentNo = '$delete_id'";

        mysqli_query($conn, $sql_delete);

        header("Location: ../department.php?delete=delete_success");
        exit();
   }

  
}

elseif(isset($_POST['department_search']))
{
	include 'dbh.inc.php';

	$search_info = mysqli_escape_string($conn, $_POST['search_department']);

	$sql_select = "SELECT * FROM department WHERE departmentName = '$search_info'";

	$result = mysqli_query($conn, $sql_select);
	$result_check = mysqli_num_rows($result);

	if($result_check < 0)
	{
		header("Location: ../department.php?department=department_not_found");
		exit();
	}
	else
	{
		$_SESSION['search_info'] = $search_info;
		header("Location: ../department.php?department_table=found");
        exit();
	}
}
elseif(isset($_POST['update']))
{
	$update_department_name = mysqli_escape_string($conn, $_POST['department_name']);
	$update_department_location = mysqli_escape_string($conn, $_POST['department_location']);
	$update_id = mysqli_escape_string($conn, $_POST['department_id']);

	$sql_update = "UPDATE department SET departmentName = '$update_department_name', departmentLocation = '$update_department_location' WHERE departmentNo = '$update_id';";
	mysqli_query($conn, $sql_update);

	header("Location: ../department.php?update=success");
	exit();
}

