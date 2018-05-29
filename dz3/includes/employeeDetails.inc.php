<?php

 session_start();

 /*target directory for id_proof, resume, cover_letter*/

 $target_dir_id_proof = "../uploads/id_proof/";
 $target_dir_resume = "../uploads/resume/";
 $target_dir_cover_letter = "../uploads/cover_letter";


//target file

  $target_file_id_proof = $target_dir_id_proof . basename($_FILES["id_proof_file"]["name"]);
  $target_file_resume = $target_dir_resume . basename($_FILES["resume_file"]["name"]);
  $target_file_cover_letter = $target_dir_cover_letter . basename($_FILES["cover_letter_file"]["name"]);

 if(isset($_POST['add_employee_button']))
 {
     $check = 
 }


