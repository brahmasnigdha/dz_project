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

 if(isset($_POST['add_salary_button']))
 {
 	$employeeId = mysqli_escape_string($conn, $_POST['salary_details_employee_ID']);
 	$basic_salary = mysqli_escape_string($conn, $_POST['salary_details_basic_salary']);
 	$date_salary_recieved = mysqli_escape_string($conn, $_POST['salary_details_date_salary_recieved']);
 	$tax_deduction = mysqli_escape_string($conn, $_POST['salary_details_tax_deduction']);
 	$hra = mysqli_escape_string($conn, $_POST['salary_details_hra']);
 	$ta = mysqli_escape_string($conn, $_POST['salary_details_ta']);
 	$da = mysqli_escape_string($conn, $_POST['salary_details_da']);
 	$net_salary = mysqli_escape_string($conn, $_POST['salary_details_net_salary']);

    if(!preg_match("/^([0-9]{1,9})[,]*([0-9]{3,3})*[,]*([0-9]{1,3})*[.]*([0-9]{2,2})*$/", $tax_deduction) || !preg_match("/^([0-9]{1,9})[,]*([0-9]{3,3})*[,]*([0-9]{1,3})*[.]*([0-9]{2,2})*$/", $hra) || !preg_match("/^([0-9]{1,9})[,]*([0-9]{3,3})*[,]*([0-9]{1,3})*[.]*([0-9]{2,2})*$/", $ta) || !preg_match("/^([0-9]{1,9})[,]*([0-9]{3,3})*[,]*([0-9]{1,3})*[.]*([0-9]{2,2})*$/", $da))
    {
    	header("Location: ../salaryPage.php?invalid_format");
    	exit();
    }
    else
    {
    	$month = date('F',strtotime($date_salary_recieved));
        // echo $month;exit;
    	$sql_insert_salary = "INSERT INTO salary ( employeeId, salaryAmount, salaryMonth, taxDeduction, houseRentAllowance, termAllowance, directAllowance, netSalary) VALUES ('$employeeId','$basic_salary','$month','$tax_deduction','$hra','$ta','$da','$net_salary')";

    	mysqli_query($conn, $sql_insert_salary);

    	header("Location: ../salaryPage.php?salary_add=successful");
    	exit();
    }

 }
