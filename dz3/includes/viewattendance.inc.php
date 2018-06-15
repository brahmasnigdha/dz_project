<?php

  session_start();
 
  include 'dbh.inc.php';

  if(isset($_POST['search_attendance']))
  {
     
     $start_date = mysqli_escape_string($conn, $_POST['from_datepicker']);
     $end_date = mysqli_escape_string($conn, $_POST['to_datepicker']);

    

     if(empty($start_date) || empty($end_date))
     {
     	header("Location: ../viewAttendance.php?view_attendance=empty");
     	exit();
     }

     else 
     {
     	//search from the attendance table if there are information between the start date and the end date
     	$sql_search_between = "SELECT * FROM attendance WHERE attendanceDate BETWEEN '$start_date' AND '$end_date'";
     	$result = mysqli_query($conn, $sql_search_between);
     	$result_check = mysqli_num_rows($result);

     	if($result_check > 0)
     	{
     		$_SESSION['start_date'] = $start_date;
     		$_SESSION['end_date'] = $end_date;
     		header("Location: ../viewAttendance.php?view_attendance=found");
     		exit();
     	}
     	else if($result_check < 1)
     	{
           header("Location: ../viewAttendance.php?view_attendance=not_found");
           exit();
     	}
     }

  }