<?php

  //session start
  session_start();
  include 'dbh.inc.php';
  
  if(isset($_POST['add_employee_button']))
  {
    /*print_r($_FILES);
    echo exit();*/
         
    $fname = mysqli_escape_string($conn, $_POST['employee_details_fname']);
    $mname = mysqli_escape_string($conn, $_POST['employee_details_mname']);
    $lname = mysqli_escape_string($conn, $_POST['employee_details_lname']);
    $dob = mysqli_escape_string($conn, $_POST['employee_details_dob']);
    $blood_group = mysqli_escape_string($conn, $_POST['employee_details_blood_group']);
    $gender = mysqli_escape_string($conn, $_POST['gender']);
    $address = mysqli_escape_string($conn, $_POST['employee_details_address']);
    $city = mysqli_escape_string($conn, $_POST['employee_details_city']);
    $state = mysqli_escape_string($conn, $_POST['employee_details_state']);
    $phone = mysqli_escape_string($conn, $_POST['employee_details_phone']);
    $email = mysqli_escape_string($conn, $_POST['employee_details_email']);
    $employee_type = mysqli_escape_string($conn, $_POST['employee_type']);
    $department = mysqli_escape_string($conn, $_POST['employee_details_department']);
    $joining_date = mysqli_escape_string($conn, $_POST['employee_details_joining_date']);
    $basic_salary = mysqli_escape_string($conn, $_POST['employee_details_basic_salary']);

    /*----------------------ID PROOF UPLOAD----------------------------*/

    $fileName_id_proof = $_FILES['employee_details_id_proof']['name'];
    $fileType_id_proof = $_FILES['employee_details_id_proof']['type'];
    $fileTmpNameid_proof = $_FILES['employee_details_id_proof']['tmp_name'];
    $fileError_id_proof = $_FILES['employee_details_id_proof']['error'];
    $fileSize_id_proof = $_FILES['employee_details_id_proof']['size'];
    $fileExtension_id_proof = explode('.', $fileName_id_proof);

    $fileActualExtension_id_proof = strtolower(end($fileExtension_id_proof));

    $allowed_id_proof = array('jpg','jpeg','png','pdf');

    /*------------------------RESUME UPLOAD---------------------------*/
   
    $fileName_resume = $_FILES['employee_details_resume']['name'];
    $fileType_resume = $_FILES['employee_details_resume']['type'];
    $fileTmpName_resume = $_FILES['employee_details_resume']['tmp_name'];
    $fileError_resume = $_FILES['employee_details_resume']['error'];
    $fileSize_resume = $_FILES['employee_details_resume']['size'];
    $fileExtension_resume = explode('.', $fileName_resume);

    $fileActualExtension_resume = strtolower(end($fileExtension_resume));

    $allowed_resume = array('pdf');

    /*-----------------------COVER LETTER UPLOAD-----------------------*/

    $fileName_cover_letter = $_FILES['employee_details_cover_letter']['name'];
    $fileType_cover_letter = $_FILES['employee_details_cover_letter']['type'];
    $fileTmpName_cover_letter = $_FILES['employee_details_cover_letter']['tmp_name'];
    $fileError_cover_letter = $_FILES['employee_details_cover_letter']['error'];
    $fileSize_cover_letter = $_FILES['employee_details_cover_letter']['size'];
    $fileExtension_cover_letter = explode('.', $fileName_cover_letter);

    $fileActualExtension_cover_letter = strtolower(end($fileExtension_cover_letter));

    $allowed_cover_letter = array('pdf');

    
   /* $year = date('Y',strtotime($dob));
    $month = date('F',strtotime($dob));
     $day = date('j',strtotime($dob));
    echo $day;
    echo $year;
    echo $month;exit;*/
     
   /*
     validating firstname, middle name and last name
   */
   if(!preg_match("/^[a-zA-Z ]*$/",$fname))
    {
       header("Location: ../employeeDetails.php?invalid_input=first_name_error");
       exit();
    }  
    elseif(!preg_match("/^[a-zA-Z ]*$/",$mname))
    {
        header("Location: ../employeeDetails.php?invalid_input=middle_name_error");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/",$lname))
    {
        header("Location: ../employeeDetails.php?invalid_input=last_name_error");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/",$city))
    {
        header("Location: ../employeeDetails.php?invalid_input=city_name_error");
        exit();
    }
    else
    {
        /*
            validate email 
        */
       if(!filter_var($email, FILTER_VALIDATE_EMAIL))
       {
         header("Location: ../employeeDetails.php?email=invalid_format");
         exit();
       }
       else
       {
           /*
               validate phone
           */
            if(!preg_match("/^[0-9]{10}$/", $phone))
            {
                header("Location: ../employeeDetails.php?phone=invalid_format");
                exit();
            }
            else
            {
                if(!preg_match("/^([0-9]{1,9})[,]*([0-9]{3,3})*[,]*([0-9]{1,3})*[.]*([0-9]{2,2})*$/", $basic_salary))
                {
                    header("Location: ../employeeDetails.php?basic_salary=invalid_format");
                    exit();
                }
                else
                {
                   /* $sql_insert = "INSERT INTO employee (fName, mName, lName, dob, bloodGroup, gender, address, city, state, phone, email, employeeType, department, joiningDate,basicSalary) VALUES('$fname','$mname','$lname','$dob','$blood_group','$gender','$address','$city','$state','$phone','$email','$employee_type','$department','$joining_date','$basic_salary')";

                    mysqli_query($conn, $sql_insert);*/
                    /*--------------------------------------------------UPLOAD-----------------------------------------------------------*/
                     if(in_array($fileActualExtension_id_proof, $allowed_id_proof) && in_array($fileActualExtension_resume, $allowed_resume) && in_array($fileActualExtension_cover_letter, $allowed_cover_letter))
                     {
                         if($fileError_id_proof === 0 && $fileError_cover_letter === 0 && $fileError_resume === 0)
                         {
                             if(($fileSize_id_proof < 1000000) && ($fileSize_cover_letter < 1000000) && ($fileSize_resume < 1000000))
                             {
                                $fileNewName_id_proof = uniqid('',true).".".$fileActualExtension_id_proof;
                                $fileDestination_id_proof = "../uploads/id_proof/".$fileNewName_id_proof;
                                $fileNewName_cover_letter = uniqid('',true).".".$fileActualExtension_cover_letter;
                                $fileDestination_cover_letter = "../uploads/cover_letter/".$fileNewName_cover_letter;
                                $fileNewName_resume = uniqid('',true).".".$fileActualExtension_resume;
                                $fileDestination_resume = "../uploads/resume/".$fileNewName_resume;
                                

                                move_uploaded_file($fileTmpNameid_proof, $fileDestination_id_proof);
                                move_uploaded_file($fileTmpName_cover_letter, $fileDestination_cover_letter);
                                move_uploaded_file($fileTmpName_resume, $fileDestination_resume);

                                $sql_insert = "INSERT INTO employee (fName, mName, lName, dob, bloodGroup, gender, address, city, state, phone, email, employeeType, department, joiningDate,basicSalary,id_proof,resume,cover_letter) VALUES('$fname','$mname','$lname','$dob','$blood_group','$gender','$address','$city','$state','$phone','$email','$employee_type','$department','$joining_date','$basic_salary', '$fileDestination_id_proof','$fileDestination_resume','$fileDestination_cover_letter')";

                                mysqli_query($conn, $sql_insert);

                                header("Location: ../employeeDetails.php?employee_add=successful");
                                exit();

                             }
                             else
                             {
                                header("Location: ../employeeDetails.php?upload=size_error");
                                exit();
                             }

                         }
                         else
                         {
                              header("Location: ../employeeDetails.php?upload=error");
                              exit();
                         }
                     }
                     else
                     {
                        header("Location: ../employeeDetails.php?upload=wrong_format");
                        exit();
                     }
                   
                }
            }
       }
    }

    
  

}


