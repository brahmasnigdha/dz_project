<?php

//session start
session_start();

include 'dbh.inc.php';

if(isset($_POST['submit_attendance']))
{
	$picked_date = mysqli_escape_string($conn, $_POST['date_value']);
    $attendance = "present";

    if(empty($picked_date))
    {
    	header("Location: ../attendancePage.php?attendance=date_not_picked");
    	exit();
    }

    else
    {
    	$sql_select = "SELECT * FROM employee";

    	$result = mysqli_query($conn, $sql_select);
    	$result_check = mysqli_num_rows($result);

    	if($result_check > 0)
    	{
    		while($row = mysqli_fetch_assoc($result))
    		{
    			$empNo = $row["empNo"];
    			$empName = $row["fName"];
    			$department = $row["department"];

    			if(in_array($row["empNo"], $_POST['checkList']))
    			{
                    $sql_insert = "INSERT INTO attendance (attendanceDate, empID, employeeName, department_name, attendanceStatus) VALUES ('$picked_date','$empNo','$empName','$department','$attendance')";
                    mysqli_query($conn, $sql_insert);
    			}
    			else
    			{
    				$attendance = "absent";
                    $sql_insert = "INSERT INTO attendance (attendanceDate, empID, employeeName, department_name, attendanceStatus) VALUES ('$picked_date','$empNo','$empName','$department','$attendance')";
                     mysqli_query($conn, $sql_insert);
    			}
    		}

    		header("Location: ../attendancePage.php?attendance=insert_success");
    		exit();
    	}
    	else if($result_check < 1)
    	{
            header("Location: ../attendancePage.php?attendance=no_data_in_database");
            exit();
    	}
    }			
}
