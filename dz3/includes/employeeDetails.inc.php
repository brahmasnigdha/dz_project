<?php

 //start session
 session_start();

 if(isset($_POST['add_employee_button']))
 {
    include 'dbh.inc.php';

    $fname = mysqli_escape_string($conn, $_POST['employee_details_fname']);
    $mname = mysqli_escape_string($conn, $_POST['employee_details_mname']);
    $lname = mysqli_escape_string($conn, $_POST['employee_details_lname']);
    $dob = mysqli_escape_string($conn, $_POST['employee_details_dob']);
    $blood_group = mysqli_escape_string($conn, $_POST['employee_details_blood_group']);
    $address = mysqli_escape_string($conn, $_POST['employee_details_address']);
    $city = mysqli_escape_string($conn, $_POST['employee_details_city']);
    $state = mysqli_escape_string($conn, $_POST['employee_details_state']);
    $phone = mysqli_escape_string($conn, $_POST['employee_details_phone']);
    $email = mysqli_escape_string($conn, $_POST['employee_details_email']);
    $employee_type = mysqli_escape_string($conn, $_POST['employee_type']);
    $department = mysqli_escape_string($conn, $_POST['employee_details_department']);
    $joining_date = mysqli_escape_string($conn, $_POST['employee_details_joining_date']);
    $basic_salary = mysqli_escape_string($conn, $_POST['employee_details_basic_salary']);

    if(empty($fname) || empty($mname) || empty($lname) || empty($dob) || empty($blood_group) || empty($address) || empty($city) || empty($state) || empty($phone) || empty($email) || empty($employee_type) || empty($department) || empty($joining_date) || empty($basic_salary))
    {
        header("Location: ../employeeDetails.php?empty_input=not_allowed");
        exit();
    }

    else
    {
        if()
    }
 }