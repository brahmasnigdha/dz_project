<?php

 //start session
 session_start();

 include 'dbh.inc.php';

 if(isset($_POST['employee_search_button_salary_page']))
 {
    $search_option = mysqli_escape_string($conn, $_POST['salary_details_name']);

    $sql_search = "SELECT * FROM employee WHERE empNo = '$search_option' OR fName = '$search_option'";

    $result = mysqli_query($conn, $sql_search);

    $result_check = mysqli_num_rows($result);

    if($result_check < 1)
    {
 		header("Location: ../salaryPage.php?employee=not_found");
 		exit();
    }
    else
    {
    	$_SESSION['search_value'] = $search_option;
    	header("Location: ../salaryPage.php?employee=found");
    	exit();
    }
 }
