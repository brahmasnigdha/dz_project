<?php
  
  include 'dbh.inc.php';
  //start session
  session_start();

  if(isset($_POST['add']))
  {

  	$new_role_name = mysqli_escape_string($conn, $_POST['add_new_role_name']);

  	$sql_select = "SELECT * FROM role_table WHERE roleName = '$new_role_name'";
  	$result = mysqli_query($conn, $sql_select);
  	$result_check = mysqli_num_rows($result);

  	if($result_check > 0){
  		header("Location: ../addNewRole.php?role=exist");
  		exit();
  	}
  	else
  	{
  		if($result_check < 1)
  		{
  			$sql_insert =  "INSERT INTO role_table (roleName) VALUES('$new_role_name')";
  			mysqli_query($conn, $sql_insert);

  			header("Location: ../addNewRole.php?role=added_successfully");
  			exit();
  		}
  		
  	}
  }

if(isset($_POST['add_new_role_search']))
{
   $search_role = mysqli_escape_string($conn, $_POST['search_add_new_role']);

   if(empty($search_role))
   {
      header("Location: ../addNewRole.php?role_search=empty");
      exit();
   }
   else
   {
      $sql_search_select = "SELECT * FROM role_table WHERE roleName = '$search_role' OR roleId = '$search_role'";
      $result = mysqli_query($conn, $sql_search_select);
      $result_check = mysqli_num_rows($result);

      if($result_check < 1)
      {
         
         header("Location: ../addNewRole.php?role_search=does_not_exist");
         exit();

      }
      else
      {
        if($result_check > 0)
        {
          $_SESSION['search_info'] = $search_role;
          header("Location: ../addNewRole.php?role_search=found");
          exit();
        }
        else
        {
           
           header("Location: ../addNewRole.php?role_search=does_not_exist");
           exit();
        }
      }
   }
}

if(isset($_POST['update']))
{
   $update_id = mysqli_escape_string($conn, $_POST['add_new_role_id']);
   $update_role = mysqli_escape_string($conn, $_POST['add_new_role_name']);

   $sql_select = "SELECT roleName FROM role_table WHERE roleId = '$update_id'";
   $result = mysqli_query($conn, $sql_select);
   $result_check = mysqli_num_rows($result);

   if($result_check > 0)
   {
      while($row = mysqli_fetch_assoc($result))
      {
         if($row['roleName']===$update_role)        
         {
            header("Location: ../addNewRole.php?no_update_require");
            exit();
         }
         else
         {
            $sql_update = "UPDATE role_table SET roleName = '$update_role' WHERE roleId = '$update_id'";
            mysqli_query($conn, $sql_update);
            header("Location: ../addNewRole.php?update_successful");
            exit();
         }
      }
   }
}

if(isset($_POST['delete']))
{
   $delete_id = mysqli_escape_string($conn, $_POST['add_new_role_id']);
   $delete_role = mysqli_escape_string($conn, $_POST['add_new_role_name']);

   $sql_delete = "DELETE FROM role_table WHERE roleId = '$delete_id'";
   mysqli_query($conn, $sql_delete);

   header("Location: ../addNewRole.php?delete_successful");
   exit();
}